<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use App\Models\User;
use App\Models\Store;
use App\Models\Area;
use App\Models\Holiday;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;
use date;
// use App\Http\Requests\StoreRequest;

class ReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    const days = [
        '日曜日' => 0,
        '月曜日' => 1,
        '火曜日' => 2,
        '水曜日' => 3,
        '木曜日' => 4,
        '金曜日' => 5,
        '土曜日' => 6,
    ];

    public function index()
    {
        $user = Auth::user();
        // $reserves = Reserve::where('user_id', $user->id)->get();
        $reserves = $user->reserves;
        // $stores = Store::all();
        $stores[] = null;
        $menu = null;
        if($reserves){
            foreach ($reserves as $key => $reserve) {
                $store = Store::find($reserve->store_id);
                $stores[] = $store;
                $menu = Menu::find($reserve->menu_id)->first();
            }
        }
        return view('Reserve.index',compact('reserves', 'stores', 'menu'));
    }

    public function getFavoriteUsers(Request $request) {
        $store = Store::find($request->id);
        $favoriteUsers = $store->favoriteUsers;
        
        return view('Reserve.favoriteUser', compact('favoriteUsers',));
    }

    public function isFavoritedby() {
        $isFavorited = $store->isFavoritedBy(Auth::user());
    }

    public function getFavoriteStores() {
        // $user = Auth::user();
        // $favoriteStores = $user->favoriteStores;
        // return view('Reserve.favoriteUser', compact('favoriteStores'));
    }

    public function getReserveList(Request $request) {
        $store = Store::where('user_id', '=', $request->id)->first();
        $reserveList = $store->getReserveList;
        return view('Reserve.reserveList', compact('reserveList', 'store'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $today = date('Y-m-d');
        $user = Auth::user();
        $store = Store::find($request->store_id);
        $menus = $store->getMenuList;
        return view('Reserve.createReserve', compact('user', 'store', 'menus', 'today'));
    }

    public function reserveConfirm(Request $request) {
        // dd($request);
        $dateTime = new Datetime($request->date.$request->time);
        $todate = new Datetime();
        $user = User::find($request->user_id);
        $store = Store::find($request->store_id);
        $store_id = $request->store_id;
        $menus = $store->getMenuList;
        if ($dateTime < $todate) {
            $today = date('Y-m-d');
            // return redirect(route('reserve.create'))->with($flashMessage, $store_id);
            return view('Reserve.createReserve', compact('store_id', 'today', 'store', 'menus', 'user'));
        }
        $numberOfDay = $dateTime->format('w');
        $user = User::find($request->user_id);
        $store = Store::find($request->store_id);
        if ($request->time < $store->open_time || $request->time > $store->close_time) {
            $today = date('Y-m-d');
            return view('Reserve.createReserve', compact('store_id', 'today', 'store', 'menus', 'user'));
        }
        $holiday = Holiday::where('store_id', '=', $request->store_id)->first();
        $holidays = $holiday->getHolidays();
        $key = "";
        foreach ($this::days as $key => $value) {
            if ($value == $numberOfDay) {
                $key = $key;
                break;
            }
        }
        if ($holidays[$key] == 2) {
            echo ('休日です');
        } else {
            $reserve_limit = DB::table('stores')->select('reserve_limit')->where('id', $request->store_id)->get();
            // $current_reserve_limit = DB::table('store')->select('current_reserve_limit')->get();
            // $isAvailable = 
            return view('Reserve.confirm', compact('user', 'store', 'reserve_limit', 'request'));       
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = Store::find($request->store_id);
        $reserve = new Reserve;
        $numberOfSeats = $reserve->getCurrentReserveNumber($request->store_id, $request->reserve_date);
        if(($store->reserve_limit - $numberOfSeats) > 0) {
            $reserve->fill($request->all())->save();
            $request->session()->regenerateToken();
            return view('Reserve/complete', compact('numberOfSeats'));
        } else {
            echo ('sorry');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reserve  $reserve
     * @return \Illuminate\Http\Response
     */
    public function show(Reserve $reserve)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reserve  $reserve
     * @return \Illuminate\Http\Response
     */
    public function edit(Reserve $reserve)
    {
        $store = Store::where('id', $reserve->store_id)->first();
        $menus = Menu::where('store_id', $store->id)->get();
        $reserve_date = $reserve->reserve_date;
        $reserve_time = $reserve->reserve_time;
        return view('Reserve.edit', compact('reserve', 'reserve_date', 'reserve_time', 'store', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reserve  $reserve
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reserve = Reserve::find($id);
        if(Auth::user()->id != $reserve->user_id){
            $messageKey = 'errorMessage';
            $flashMessage = '投稿に失敗しました。';
            return redirect(route('reserve.index'))->with($messageKey, $flashMessage);
        } else {
            $reserve->reserve_date = $request->reserve_date;
            $reserve->reserve_time = $request->reserve_time;
            $reserve->store_id = $request->store_id;
            $reserve->menu_id = $request->menu_id;
            $reserve->save();
            $messageKey = 'successMessage';
            $flashMessage = '更新に成功しました！';
            return redirect(route('reserve.index'))->with($messageKey, $flashMessage);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reserve  $reserve
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserve = Reserve::find($id);
        $reserve->delete();
        return redirect()->route('reserve.index');
    }
}
