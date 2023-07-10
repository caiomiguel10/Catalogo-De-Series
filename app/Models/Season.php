<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;
    protected $fillable = ['numero','series_id'];

    public function Series()
    {   
        return $this->belongsTo(Serie::class);
    }
    public function Episodes()
    {
        return $this->hasMany(Episode::class,'season_id');
    }
    public function numberOfWatchedEpisodes(){
        return $this->Episodes->filter(fn($episode) => $episode->watched)->count();
    }

}
