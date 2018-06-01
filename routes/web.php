<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function(){
    return view('admin.index');
});

Route::get('/admin/plans/{id}/add','PlansController@addPlan');

Route::get('/admin/plans/{id}/addSet','PlansController@addSet');
Route::patch('/admin/plans/{id}/updateSet','PlansController@updateSet');

Route::group(['middleware' => 'admin'], function(){
   
    Route::resource('admin/users','AdminUsersController');
    Route::resource('admin/plans','PlansController');
    Route::resource('admin/workouts','WorkoutsController');
    Route::resource('admin/exercises','ExercisesController');

});

Route::get('admin/plans/create/{id}', 'PlansController@getExercises');
Route::post('admin/plans/create/{id}', 'PlansController@getExercises');
Route::post('admin/plans/create', 'PlansController@create');

Route::get('admin/plans/myplans/{id}', 'PlansController@myPlans');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('admin/users/profile/{id}','AdminUsersController@profile');