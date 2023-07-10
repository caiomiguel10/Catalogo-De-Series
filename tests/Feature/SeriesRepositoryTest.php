<?php

namespace Tests\Feature;

use App\Http\Requests\SeriesFormRequest;


use App\Repositories\SeriesRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SeriesRepositoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_when_a_series_is_created_its_seasons_and_episodes_must_also_be_created()
    {
       //planeja o cenario de teste
       $repository = $this->app->make(SeriesRepository::class);
       $request = new SeriesFormRequest();
       $request->nome = 'Nome da série';
       $request->numero_temporadas = 1;
       $request->numero_eps = 1;
       
        $repository->add($request);

       //executa o que a gente quer testar
       $this->assertDatabaseHas('series', ['nome' => 'Nome da série']);
       $this->assertDatabaseHas('seasons', ['numero' => 1]);
       $this->assertDatabaseHas('episodes', ['numero' => 1]);

       //verificar os testes
}
}