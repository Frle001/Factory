<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MealController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    /*$per_page = request('per_page');
    $tags = request('tags');
    $lang = request('lang');
    $page = request('page');
    $with = request('with');
    $diff_time = request('diff_time');

    return view('meals', [
        'per_page'=> $per_page,
        'tags' => $tags,
        'lang' => $lang,
        'page' => $page,
        'with' => $with,
        'diff_time' => $diff_time
    ]);*/
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//posts endpoint

Route::get('/posts', [PostController::class, 'index']);

Route::get('/meals', [MealController::class, 'show']);

