<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Favorite;
class FavoriteController extends Controller
{
    public  function  index(){
            return view('favorite');
    }

    public function getfavorite()
    {

        $listFavorite = auth()->user()->productfavorites()->latest()->paginate(8);
          return response()->json($listFavorite);
    }

    public function delfavorite($product_id){
        auth()->user()->productfavorites()->detach($product_id);
        $listFavorite = auth()->user()->productfavorites()->latest()->paginate(8);
        return response()->json($listFavorite);
    }
}
