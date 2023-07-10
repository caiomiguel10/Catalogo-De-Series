<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function index(Season $season){

        $msg = session('mensagem.sucesso');
        
        return view('episodes.index',['episodes'=>$season->Episodes,'msg' => $msg]);
    }

    public function update(Request $request,Season $season){

        
        $watchedEpisodes = $request->episodes;

        $season->Episodes->each(function(Episode $episode) use ($watchedEpisodes){
            $episode->watched = in_array($episode->id,$watchedEpisodes);
        });

        $season->push();


        return to_route('eps.index',$season->id) ->with('mensagem.sucesso', "episodes marcados com sucesso");;;
    }
}
