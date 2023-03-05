<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\LogonController;
use App\Http\Controllers\Auth\GetoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeindexController;
use App\Http\Controllers\GetpostsController;

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
Route::get('/homeindex',[HomeindexController::class, 'index'])->name('homeindex');

Route::get('/dashboard',[DashboardController::class, 'index'])
->name('dashboard');
/*
Route::get('/dashboard',[DashboardController::class, 'index'])
->name('dashboard')
->middleware('auth'); // cant access dashboard if you are not logged in through the routes. or do it inside the controller with a constructor
*/

Route::post('/getout',[GetoutController::class, 'getOut'])->name('getout');

Route::get('/registration',[RegistrationController::class, 'index'])->name('registration');
/*
Route::get('/registration',[RegistrationController::class, 'index'])
->name('registration')
->middleware('guest'); // only guests can see this page. Not signed in users via routes or do it inside the controller with a constructor
*/

Route::post('/registration',[RegistrationController::class, 'store']); //name will be inherited from the top one

Route::get('/logon',[LogonController::class, 'index'])->name('logon');
Route::post('/logon',[LogonController::class, 'getIn']);


Route::get('/posts',[GetpostsController::class, 'index'])->name('getposts');
/*
Route::get('/posts', function () {
    return view('posts.home');
});
*/

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
