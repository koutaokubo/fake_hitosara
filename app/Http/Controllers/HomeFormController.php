<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Genre;
use App\Models\Area;
use App\Models\Store;
use Illuminate\Support\Facades\DB;

class HomeFormController extends Controller
{
    public function index(Request $request)
    {
        $genres = Genre::all();
        $area = Area::all();
        $user = Auth::user();
        //検索キーワードを取得
        $search = $request->input('search');

        //該当するデータを取得
        if(Str::length($search)>0){
            $search_stores = Store::where('name','like',"%$search%")
            ->get();
            // $searchStoreName = DB::select('select name from stores where name like ?', [$search]);
        }else{
            $search_stores = Store::all();
            // $searchStoreName = Store::all();
        }
        return view('HomeForm.index',compact('genres', 'area', 'user', 'search', 'search_stores'));

        // return view('Search_store',compact('search','Search_store'));
    }
}
