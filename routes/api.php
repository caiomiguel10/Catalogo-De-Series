<?php

use App\Models\Episode;
use App\Models\Serie;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;





use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group( function () {
    
//aqui na rota de api ele define um prefixo api antes das rotas, entao vai ser /api/series


Route::apiResource('/series', \App\Http\Controllers\Api\SeriesApiController::class);

//todas as temporadas de uma serie
Route::get('/series/{series}/seasons', function (Serie $series) {
    return $series->Temporadas;
});

//todos os episodeos de uma serie
Route::get('/series/{series}/episodes', function (Serie $series) {
    return $series->episodes;
});
//rota para marcar o episode que foi visto
Route::patch('/episodes/{episode}', function (Episode $episode, Request $request) {

    $episode->watched = $request->watched;
    $episode->save();

    return response()->json(['message' => 'Episodes Marcado com visto'],202);
});



});





Route::post('/login', function (Request $request) {
    $credentials = $request->only(['email','password']);
    $user = User::whereEmail($credentials['email'])->first();

    // if(Hash::check($credentials['password'],$user->password) === false){
    //     return response()->json(data:'Unauthorized', status:401);
    // }

    if (Auth::attempt ($credentials) === false){
        return response ()->json(data: 'Unauthorized', status:401);
    }

    $user = Auth::user();
    $token =  $user->createToken('token');

    return response()->json($token->plainTextToken);

});