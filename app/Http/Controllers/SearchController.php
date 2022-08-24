<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Store;

<<<<<<< HEAD
use Illuminate\Support\Str;
=======

>>>>>>> c01fb2cf7bfdc879c0798454b8fd3665838ce254

class SearchController extends Controller
{
    public function index(Request $request)
    {
        //検索キーワードを取得
        $search = $request->input('search');

        //該当するデータを取得
        if(Str::length($search)>0){
            $Search_store = Store::where('name','like',"%$search%")
            ->get();
        }else{
            $Search_store = Store::all();
        }
        return view('Search_store',compact('search','Search_store'));
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> c01fb2cf7bfdc879c0798454b8fd3665838ce254
