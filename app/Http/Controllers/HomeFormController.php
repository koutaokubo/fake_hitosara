<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Genre;
use App\Models\Area;

class HomeFormController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        $area = Area::all();
        $user = Auth::user();
        return view('HomeForm.index',compact('genres', 'area', 'user'));
    }
}
