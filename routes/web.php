<?php

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

/* 

1ª forma - nova v8+ (não consegui usar com namespace)

//importa o controller
use App\Http\Controllers\Site\HomeController;

//chama a classe na rota
Route::get('/home', [HomeController::class, 'index']);

*/

/* 2ª forma método v<8 (funciona com namespace)*/
// o namespace carrega os controllers da pata App\Http\Controllers\Site\ sem necessidade de importação
Route::namespace('Site')->group(function () {
    // Route::get('/home', 'HomeController'); // invokable controller example
    // Route::get('/', 'HomeController@index'); // normal controller example
    
    Route::get('/', 'HomeController');

    Route::get('/produtos', 'CategoryController@index');
    Route::get('/produtos/{slug}', 'CategoryController@show');

    Route::get('/blog', 'BlogController');
    
    Route::get('/sobre', 'AboutController');

    Route::get('/contact', 'ContactController@index');
    Route::post('/contact', 'ContactController@contactForm');


});
