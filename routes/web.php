<?php

use App\Http\Livewire\Article\Article;
use App\Http\Livewire\Index\Index;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Login;
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

Route::get('/register' , Register::class);
Route::get('/login' , Login::class);

Route::get('/', Index::class);

Route::get('/article/{id}', Article::class);
