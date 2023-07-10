<?php
use App\Mail\SeriesCreated;
use Illuminate\Http\Request;
use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use App\Http\Middleware\Autenticador;
use App\Models\Serie;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return redirect('/series');
// })->middleware(Autenticador::class);


Route::get('/login',['App\Http\Controllers\LoginController','index'])->name('login');
Route::get('/logout',['App\Http\Controllers\LoginController','destroy'])->name('login.logout');
Route::post('/login',['App\Http\Controllers\LoginController','store'])->name('login.store');

Route::get('/registro',['App\Http\Controllers\LoginController','indexRegistro'])->name('registro.index');
Route::post('/registro',['App\Http\Controllers\LoginController','storeRegistro'])->name('registro.store');




Route::middleware('auth')->group(function (){
    //rotas que usaram o metodo autenticador


Route::resource('/series',SeriesController::class);
Route::get('series/{series}/seasons',[SeasonsController::class,'index'])->name('seasons.index');
Route::get('seasons/{season}/episodes',[EpisodesController::class,'index'])->name('eps.index');
Route::post('seasons/{season}/episodes',[EpisodesController::class,'update']);




});


// route::get('mail',function(){
//     //retorna a classe
//     return new SeriesCreated(
//         'serie teste',
//         1,
//         2,
//         3
//     );
// });



require __DIR__.'/auth.php';


