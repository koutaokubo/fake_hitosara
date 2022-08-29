<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use App\Models\User;
use App\Models\Store;
use App\Models\Area;
use App\Models\Holiday;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;
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
        $reserves = Reserve::where('user_id', $user->id)->get();
        // $stores = Store::all();
        $stores = [];
        foreach ($reserves as $key => $reserve) {
            $store = Store::find($reserve->store_id);
            $stores[] = $store;
        }
        return view('Reserve.index',compact('reserves', 'user', 'stores'));
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
        $store = Store::find($request->id);
        $reserveList = $store->getReserveList;

        return view('Reserve.reserveList', compact('reserveList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = Auth::user();
        $store = Store::find($request->store_id);
        $menus = $store->getMenuList;
        return view('Reserve.createReserve', compact('user', 'store', 'menus'));
    }

    public function reserveConfirm(Request $request) {
        $dateTime = new Datetime($request->date.$request->time);
        $numberOfDay = $dateTime->format('w');
        $user = User::find($request->user_id);
        $store = Store::find($request->store_id);
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
            return view('Reserve/finish', compact('numberOfSeats'));
        } else {
            echo('sorry');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reserve  $reserve
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reserve $reserve)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reserve  $reserve
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reserve $reserve)
    {
        //
    }
}
