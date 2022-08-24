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

        return view('Store.index');
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
        $store = new Store();

        $store->fill($request->all())->save();
        // validaion実行

    // [確認]ボタンなら確認フォーム表示へ

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
