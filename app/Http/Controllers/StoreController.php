<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Genre;
use App\Models\Area;
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
        $stores = Store::all();
        $genre = Genre::find($request->genre_id);
        $area = Area::find($request->area_id);


        return view('Store.confirm',compact('stores','genre', 'area','request'));
    }
    public function store(Request $request)
    {
         if ($request->has('back')){

             return redirect('/store/create')->withInput();
         }

         if ($request->has('send')) {
        $stores = new Store();

        $stores->fill($request->all())->save();

        return redirect('/store');
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
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */

    public function edit(Store $store,Request $request)
    {
        $genres = Genre::find($request->genre_id);
        $area = Area::find($request->area_id);
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
