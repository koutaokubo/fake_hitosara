<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Store;



class SearchController extends Controller
{
    public function index(Request $request)
    {
        //検索キーワードを取得
        $search = $request->input('search');

        //該当するデータを取得
        if(Str::length($search)>0){
            $search_stores = Store::where('name','like',"%$search%")
            ->get();
        }else{
            $search_stores = Store::all();
        }
        return view('ReserveForm.index',compact('search','search_stores'));
    }
}