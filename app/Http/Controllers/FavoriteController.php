<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Store;
use App\Models\User;
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

    public function toggleFavorite(Request $request) {
        $user = User::where('id', '=', $request->user_id)->first();
        $isFavorited = DB::table('favorite')->where('user_id', $request->user_id)->where('store_id', $request->store_id)->exists();
        if ($isFavorited == false) {
            $user->favoriteStores()->attach($request->store_id);
        } else {
            $user->favoriteStores()->detach($request->store_id);
        }
        return back()->with($isFavorited);
    }
}
