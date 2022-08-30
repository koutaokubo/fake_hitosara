<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Store;

class MenuController extends Controller
{
    public function create()
    {
        $stores = Store::all();
        $menus = Menu::all();


        return view('Menu.create',compact('stores'));
    }
    public function confirm(Request $request)
    {

        $menus = Menu::all();
        $stores = Store::find($request->store_id);

        return view('Menu.confirm',compact('request','stores'));
    }
    public function store(Request $request)
    {
        if ($request->has('back')){

            return redirect('/menu/create')->withInput();
        }

        if ($request->has('send')) {


        $menus = new Menu();
        $menus->fill($request->all())->save();


        return redirect(route('Store.index'));


    }
}
}
