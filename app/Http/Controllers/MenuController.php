<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Store;

class MenuController extends Controller
{
    public function create($id)
    {
        $stores =  Store::find($id);
        $menus = Menu::where('store_id', $id)->get();
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

            return redirect('/menu/create/$request->store_id')->withInput();
        }

        if ($request->has('send')) {

        $menus = new Menu();
        $menus->fill($request->all())->save();


        return redirect(route('Store.index'));
        }


    }
    //メニュー一覧
    public function list($id)
    {
        //各店舗のメニュー一覧
        $menus = Menu::where('store_id', $id)->get();
        return view('Menu.list',compact('menus'));

    }

    //編集
    public function edit($id)
    {
        $edit =  Menu::find($id);
        $stores = Store::find($edit->store_id);
        return view('Menu.edit', compact('edit', 'stores'));
    }

    //更新
    public function update(Request $request)
    {
        $menu =  Menu::find($request->id);
        $menu->fill($request->all())->save();
        return redirect('/store');
    }

    public function destroy(Request $request)
    {
        if ($request->has('delete')) {
        Menu::find($request->id)->delete();
        }
    return redirect('/store');
    }
}
