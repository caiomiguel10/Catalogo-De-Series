<?php

namespace App\Http\Controllers;
use App\Models\Serie;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class SeasonsController extends Controller
{
   public function index(Serie $series)
   {
        $seasons = $series->Temporadas;
        $animais = collect(['gato', 'cachorro', 'passarinho']);
         $serie = Serie::all();
       
        return view('seasons.index')->with('seasons',$seasons)->with('series',$series);
   }
}
