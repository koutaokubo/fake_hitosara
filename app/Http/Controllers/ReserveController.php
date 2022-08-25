<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use App\Models\User;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use App\Http\Requests\StoreRequest;

class ReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //各モデルごとのデータ取得ができたか確認用
        $reserves = Reserve::all();
        $stores = Store::all();
        $user = Auth::user();
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Reserve.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reserve->fill($request->all())->save();
        return redirect('/');
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
