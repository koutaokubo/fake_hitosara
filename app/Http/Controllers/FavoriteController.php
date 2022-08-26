<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Store;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    public function like(Request $request){
        if(DB::table('favorite')-> where('user_id', 'Auth::id()' and 'store_id', '$request->store_id()')){
            /*データ削除*/
        }else{
            /*データ関連づけ*/
            $store = Store::create($request->all());
            $store->favoriteUser()->attach(request()->Auth::id());
        }
    }

    public function getFavoriteStores() {
        $user = Auth::user();
        $favoriteStores = $user->favoriteStores;
        return view('Store.favoriteStores', compact('favoriteStores'));
    }
}
