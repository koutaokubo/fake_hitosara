<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Genre;
use App\Models\Area;
use App\Models\Holiday;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(Request $request)
    {
        $stores = Store::all();
        $genre = Genre::find($request->genre_id);
        $area = Area::find($request->area_id);
        return view('Store.index', compact('stores','genre', 'area','request'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $stores = Store::all();
        $genres = Genre::all();
        $area = Area::all();

        return view('Store.create',compact('stores','genres', 'area'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function confirm(Request $request)
    {
        $genre = Genre::find($request->genre_id);
        $area = Area::find($request->area_id);
        $user_id = Auth::id();

        return view('Store.confirm',compact('genre', 'area','request', 'user_id'));
    }
    public function store(Request $request)
    {
         if ($request->has('back')){

             return redirect('/store/create')->withInput();
         }

         if ($request->has('send')) {

            try {
                DB::beginTransaction();

                $stores = new Store();

                $stores->fill($request->all())->save();

                $store = DB::table('stores')->latest('id')->where('user_id', $request->user_id)->first();

                $setting = Holiday::create([
                    'store_id' => $store->id,
                    'sunday' => $request->sunday,
                    'monday' => $request->monday,
                    'tuesday' => $request->tuesday,
                    'wednesday' => $request->wednesday,
                    'thursday' => $request->thursday,
                    'friday' => $request->friday,
                    'saturday' => $request->saturday,
                ]);

                DB::commit();

                return redirect('/store');
            } catch (Throwable $e) {
                DB::rollback();
            }
        }
    }
      /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $reserve
     * @return \Illuminate\Http\Response
     */

    public function show(Store $store)
    {

    }

    public function storeDetail(Request $request) {
        $store = Store::find($request->store_id);
        $area = Area::find($request->area_id);
        $holiday = Holiday::where('store_id', '=', $request->store_id)->first();
        $holidays = $holiday->getHolidays();
        return view('Store.storeDetail', compact('store', 'area', 'holidays'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */

    public function edit(Store $store,Request $request)
    {
        $genres = Genre::all();
        $area = Area::all();
        // $genres = Genre::find($request->genre_id);
        // $area = Area::find($request->area_id);
        $edit=  Store::find($store->id);
        return view('Store.edit', compact('edit','genres', 'area','store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reserve  $reserve
     * @return \Illuminate\Http\Response
     */
    public function update(Store $store,Request $request)
    {

        $store =  Store::find($store->id);
        $store->fill($request->all())->save();
        return redirect('/store');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $reserve
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        Store::find($store->id)->delete();

        return redirect('/store');
    }
}
