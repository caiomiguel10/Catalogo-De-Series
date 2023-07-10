<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;


use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Serie extends Model
{
    use HasFactory;

    protected $fillable = ['nome','cover'];
    protected $appends = ['links'];

    // protected $with = ['Temporadas'];
    //uma serie tem varias temporadas
    public function Temporadas()
    {   //segundo paramentro chave estrangeira na tabela Seasons // e a cahve que vai referenciar esta tabela

        return $this->hasMany(Season::class,'series_id');
    }
    // estou dizendo que essa serie tem muitos episodes atraves do relacionamento com temporadas
    //isso faz com que atraves de series eu consiga acessar todos os episodes
    public function episodes(){
        return $this->hasManyThrough( Episode::class,Season::class,'series_id', 'season_id');
    }


    // protected static function booted()
    // {
    //     self::addGlobalScope('ordered',function (Builder $queryBuilder){
    //         $queryBuilder->orderBy('nome');
    //     });
    // }
    protected function links(): Attribute
    {
        return new Attribute( 
          get: fn () =>  [
         [
            'rel'=>'self',
            'url'=>"api/series/{$this->id}",
          ],
          [
            'rel'=>'Temporadas',
            'url'=>"api/series/{$this->id}/seasons",
          ],
          [
            'rel'=>'episodes',
            'url'=>"api/series/{$this->id}/episodes",
          ]
          ],
         

        );
    }

}
