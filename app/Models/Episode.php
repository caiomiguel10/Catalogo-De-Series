<?php

namespace App\Models;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['numero','season_id'];
    protected $casts = ['watched' => 'boolean'];     
    public function Season()
    {
        return $this->belongsTo(Season::class);
    }


    public function scopeWatched(Builder $query){
        $query->where('watched',true);
    }
    
}
