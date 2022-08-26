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
        $search_area = $request->input('area');
        $search_genres = $request->input('genres');
        $Search_store = 0;

        // //エリア検索
        // if($search_area>0){
        //     $Search_answer = Store::where('area_id','like',"%$search_area%");
        // }

        // //ジャンル検索
        // if($search_genres>0){
        //     $Search_answer = Store::where('genre_id','like',"%$search_genres%");
        // }

        // //該当するデータを取得
        // if(Str::length($search)>0){
        //     $Search_answer = Store::where('name','like',"%$search%");
        //     // $searchStoreName = DB::select('select name from stores where name like ?', [$search]);
        // }

        if(!empty($search_area) || !empty($search_genres) || Str::length($search)>0){
            $Search_store = Store::where('genre_id',"$search_genres")->orWhere('area_id',"$search_area")->orWhere('name','like',"%$search%")
            ->get();
        }

        // $Search_store = $Search_answer->get();

        return view('HomeForm.index',compact('genres', 'area', 'user', 'search', 'Search_store'));

        // return view('Search_store',compact('search','Search_store'));
    }
}
