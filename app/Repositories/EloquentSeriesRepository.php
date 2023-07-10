<?php




namespace App\Repositories;
use App\Models\Serie;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SeriesFormRequest;
use App\Repositories\SeriesRepository;
class EloquentSeriesRepository implements SeriesRepository
{

public function add(SeriesFormRequest $request):Serie
{

    return DB::transaction(function () use($request,){
        
        $series = Serie::create([
            'nome'=> $request->nome,
            'cover'=> $request->coverPath, 

        ]);
            
        for ($i = 1; $i <= $request->numero_temporadas; $i++) {
            $season =  $series->Temporadas()->create([
                'numero' => $i,
            ]);

            for ($j = 1; $j <= $request->numero_eps; $j++) {
                $season->Episodes()->create([
                    'numero' => $j,
                ]);
            }
        }

        return $series;
    },5);

}


}

