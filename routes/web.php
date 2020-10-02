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

//First two pages
Route::get('/','AuthViewsController@showIndexPage')->name('register');
Route::get('/login', 'Auth.LoginController@showLoginPage')->name('login');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();

Route::get('/dashboard', 'PagesController@showDashboardPage')->name('showDashboard');
Route::get('/questionarre','PagesController@showQuestionarePage')->name('showQuestionare');
Route::get('/worksheet', 'PagesController@showWorksheetPage')->name('showWorksheet');
Route::get('/diet-plan', 'PagesController@showDietPlanPage')->name('showDietPlan');
Route::get('/videos', 'PagesController@showVideosPage')->name('showVideos');


//admin routes

Route::get('/admin', 'AdminViewsController@showDashboard');
