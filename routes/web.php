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

Route::get('/about', function () {
    return view('about');
});

//auth
Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//admin

Route::get('admin', function(){
    return view('admin.index');
});

Route::group(['middleware' => 'admin'], function(){
    Route::resource('admin/exercises','ExercisesController');
    Route::resource('admin','AdminUsersController');
    Route::resource('admin/users','AdminUsersController');
});

Route::resource('users','UsersController');

// API
Route::get('admin/exercises/getExercises/{id}','ExercisesController@getExercises');

//workouts
Route::resource('workouts','WorkoutsController');
Route::get('workouts/{id}/add','WorkoutsController@addWorkout');
Route::get('workouts/{id}/addSet','WorkoutsController@addSet');
Route::get('workouts/{id}/addWorkout','WorkoutsController@addWorkout');
Route::get('workouts/{id}/addExercise','WorkoutsController@addExercise');
Route::get('workouts/create/{id}', 'WorkoutsController@getExercises');
Route::get('workouts/myworkouts/{id}', 'WorkoutsController@myWorkouts');

Route::get('workouts/{id}/change', 'WorkoutsController@change');
Route::get('workouts/logs/{id}', 'WorkoutsController@logs');

Route::post('workouts/create', 'WorkoutsController@create');
Route::post('workouts/create/{id}', 'WorkoutsController@getExercises');
Route::post('workouts/{id}/updateSet','WorkoutsController@updateSet');
Route::post('workouts/{id}/storeExercise','WorkoutsController@storeExercises');

//home
Route::get('home', 'HomeController@index')->name('home');

//user?
Route::get('agenda','HomeController@agenda');
Route::post('addWeight','HomeController@addWeight');

//friendship
Route::get('/test', function(){
    return Auth::user()->test();
});

Route::get('requests','HomeController@requests');
Route::get('showFriends', 'HomeController@showFriends');
Route::get('addFriend/{id}', 'HomeController@sendRequest');
Route::get('accept/{id}','HomeController@accept');