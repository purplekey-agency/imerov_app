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
Route::post('email/resend', 'Auth\VerificationController@resend')->name('resend');

Auth::routes(['verify'=>true]);

Route::get('/dashboard', 'PagesController@showDashboardPage')->name('showDashboard')->middleware('admin');
Route::get('/questionarre','PagesController@showQuestionarePage')->name('showQuestionare')->middleware('admin');
Route::get('/worksheet', 'PagesController@showWorksheetPage')->name('showWorksheet')->middleware('admin');
Route::get('/diet-plan', 'PagesController@showDietPlanPage')->name('showDietPlan')->middleware('admin');
Route::get('/videos', 'PagesController@showVideosPage')->name('showVideos')->middleware('admin');
Route::get('/videos/{parameter}', 'PagesController@showVideoPage')->name('showVideos')->middleware('admin');
Route::get('/selectsub', 'PagesController@selectSubscriptionType')->name('selectsub')->middleware('admin');
Route::post('/selectsubtype', 'PagesController@updateSubscriptionType')->name('updatesub')->middleware('admin');

Route::post('/questionarre/update', 'PagesController@updateQuestionare');


//admin routes

Route::get('/admin/dashboard', 'AdminViewsController@showAdminDashboard');
Route::get('/admin/users', 'AdminViewsController@showUsersPage');
Route::get('/admin/users/{id}', 'AdminViewsController@showUserPage');
Route::get('/admin/users/{id}/questionarre','AdminViewsController@showUserQuestionarePage');
Route::get('/admin/users/{id}/worksheet','AdminViewsController@showUserWorksheetPage');
Route::get('/admin/users/{id}/diet-plan','AdminViewsController@showUserDietPlanPage');
Route::get('/admin/users/{id}/videos','AdminViewsController@showUserVideosPage');
Route::get('/admin/users/{id}/edit-profile','AdminViewsController@showUserEditProfilePage');
Route::get('/admin/messages', 'AdminViewsController@showAdminMessagesPage');
Route::get('/admin/upload', 'AdminViewsController@showAdminUploadPage');
Route::get('/admin/videos', 'AdminViewsController@showAdminVideosPage');
Route::get('/admin/video/{id}', 'AdminViewsController@showSingleVideo');
Route::get('/admin/videos/new', 'AdminViewsController@showAddNewExercisePage');


//admin post routes
Route::post('/admin/search', 'AdminViewsController@searchFunction');

Route::post('/admin/upload/save', 'AdminViewsController@updateSpreadsheet');
Route::post('/admin/upload/worksheet/save', 'AdminViewsController@updateDietPlan');

Route::post('/admin/videos/addnew', 'AdminViewsController@addNewExercise');