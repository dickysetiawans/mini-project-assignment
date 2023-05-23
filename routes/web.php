<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Admin;
use App\Models\Tb_m_project;
use App\Models\tb_m_client;
use App\Models\User;
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


Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/project', [ProjectController::class, 'index'])->middleware('auth');
Route::get('/project/s', [ProjectController::class, 'cari'])->middleware('auth');
Route::get('/project/new', [ProjectController::class, 'create'])->middleware('auth');
Route::post('/project/new', [ProjectController::class, 'store']);
Route::get('/project/edit{id?}', [ProjectController::class, 'edit']);
Route::post('/project/edit{id?}', [ProjectController::class, 'update']);
Route::post('/project/delete{id?}', [ProjectController::class, 'destroy']);
Route::post('/project/new/client', [ProjectController::class, 'create_client'])->middleware('auth');
Route::post('/project/exel', [ProjectController::class, 'exel'])->middleware('auth');
Route::get('/account-unverified', [AccountController::class, 'verif'])->middleware('auth', 'admin');
Route::post('/account-unverified/edit{id?}', [AccountController::class, 'verif_store']);
Route::get('/profile', [AccountController::class, 'profile'])->middleware('auth');
Route::post('/profile/upload', [AccountController::class, 'upload'])->middleware('auth');

Route::get('/', function () {
    if (Auth::check()) 
        $pj = Tb_m_project::get()->count();
        $cl = tb_m_client::get()->count();
        $doing = Tb_m_project::where('project_status', 'Doing')->get()->count();
        $done = Tb_m_project::where('project_status', 'Done')->get()->count();
        return view('home', compact('pj','cl','doing','done',));
        
    return Redirect::route('login');    
})->middleware('auth')->name('home');

Route::get('/logout', [LoginController::class, 'logout']);