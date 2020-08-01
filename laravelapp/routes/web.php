<?php

use App\Http\Middleware\HelloMiddleware;
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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/hello', 'HelloController@index') -> name('hello');
//Route::get('/hello/other', 'HelloController@other');
//Route::get('/hello/{id}', 'HelloController@index') -> where('id', '[0-9]+');

Route::middleware([HelloMiddleware::class]) -> group(function () {
    Route::get('/hello', 'HelloController@index');
    Route::get('/hello/other', 'HelloController@other');
});

Route::namespace('Sample') -> group(function () {
    Route::get('/sample', 'SampleController@index') -> name('sample');
    Route::get('/sample/other', 'SampleController@other');
});
// Route::namespaceを使わないとどうなる？？？ ↓↓↓
// NOTE: sample\で指定する必要がある。（use文を追加すれば別だが・・・）
//Route::get('/sample', 'Sample\SampleController@index');
//Route::get('/sample/other', 'Sample\SampleController@other');

Route::get('/hello/{person}', 'HelloController@index');