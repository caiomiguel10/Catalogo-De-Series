<?php

namespace App\Http\Controllers\Api;

use App\Repositories\SeriesRepository;


use App\Models\Season;


use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use Illuminate\Http\Request;

use App\Models\Serie;



class SeriesApiController extends Controller
{ 


  public function __construct(private SeriesRepository $seriesRepository)
  {
  }


  function index(Request $request){


    $query = Serie::query();
    if(!$request->has('nome')){
      $query->where('nome',$request->nome);
     
    }
    
    return $query->paginate(5);

  }

  function store(SeriesFormRequest $request){
    
    return response()->json($this->seriesRepository->add($request),201);
    

  }

  function update(Serie $series, SeriesFormRequest $request){
    


   //e a mesma coisa do fill
 // Series::where(‘id’, $series)->update($request->all());
    // retorno de uma resposta que não contenha a série, já que não fizemos um `SELECT` 


      $series->fill($request->all());
      $series->save();




     return $series;

  }

  function destroy(int $series){
    
   Serie::destroy($series);
   return response()->noContent();
    

  }

  function show(int $series){
    //tras todos os dados da Serie que sao relacionadas com as temporadas e mais os episodeos
    //o whereID e para filtrar pelo id
    // $seriesModel = Serie::with(relations: 'Temporadas.episodes')->whereId($series)->first();

      //tmb pode ser feito dessa forma
    $seriesModel = Serie::with(relations: 'Temporadas.episodes')->find($series);
    
    if($seriesModel === null){
      return response()->json(['message' => 'Series nao encontrada'],404);
    }


   
    return  $seriesModel;


  }

 

  
}
