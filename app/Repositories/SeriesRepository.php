<?php




namespace App\Repositories;
use App\Models\Serie;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SeriesFormRequest;
use App\Repositories\EloquentSeriesRepository;

interface SeriesRepository 
{
public function add(SeriesFormRequest $series) :Serie ;


}