<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/
Route::get('/',[LoginController::class,'login'])->name('welcome');


Route::post('/',[LoginController::class,'authenticated'])->name('login');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');

Route::group([ 'middleware' => 'auth'], function () {

    Route::get('/welcome', function () {
        return view('welcome');
    })->name('test');

Route::get('/dashboard', App\Http\Livewire\Portal\Dashboard::class)->name('portal.dashboard');
Route::get('/setup/type_query', App\Http\Livewire\Portal\Setup\TypeQuery\Index::class)->name('portal.setup.type_query');
Route::get('/create/query', App\Http\Livewire\Portal\Querymanagement\Query\Index::class)->name('portal.create.query');
Route::get('/query/admin', App\Http\Livewire\Portal\Querymanagement\QueryAdmin\Index::class)->name('portal.query.admin');
    
});

