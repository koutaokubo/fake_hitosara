<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Genre;
use App\Models\Area;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::all();
        return view('Store.list', compact('stores'));
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
    public function store(Request $request)
    {
        $stores = new Store();

        $stores->fill($request->all())->save();


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

    public function edit($id)
    {
        $stores = Store::find($id);

        return view('Store.edit', compact('stores'));
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
        $stores = Store::find($id);
        $stores->fill($request->all())->save();
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $reserve
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stores_to_delete = Store::find($id);

        $stores_to_delete->delete();

        return redirect('/Store/list');
    }
}
