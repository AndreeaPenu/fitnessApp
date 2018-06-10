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

Route::get('/admin/workouts/{id}/add','WorkoutsController@addWorkout');

Route::get('/admin/workouts/{id}/addSet','WorkoutsController@addSet');
Route::post('/admin/workouts/{id}/updateSet','WorkoutsController@updateSet');

Route::get('/admin/workouts/{id}/addWorkout','WorkoutsController@addWorkout');
Route::get('/admin/workouts/{id}/addExercise','WorkoutsController@addExercise');

Route::post('/admin/workouts/{id}/storeExercise','WorkoutsController@storeExercises');

Route::group(['middleware' => 'admin'], function(){
   
    Route::resource('admin/users','AdminUsersController');
    Route::resource('admin/workouts','WorkoutsController');
    Route::resource('admin/exercises','ExercisesController');

});

Route::get('admin/workouts/create/{id}', 'WorkoutsController@getExercises');
Route::post('admin/workouts/create/{id}', 'WorkoutsController@getExercises');
Route::post('admin/workouts/create', 'WorkoutsController@create');

Route::get('admin/workouts/myworkouts/{id}', 'WorkoutsController@myWorkouts');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('admin/users/profile/{id}','AdminUsersController@profile');
Route::post('admin/users/addWeight','AdminUsersController@addWeight');

Route::get('agenda','HomeController@agenda');

Route::get('/test', function(){
    return Auth::user()->test();
});

Route::get('/findFriends', 'HomeController@findFriends');

Route::get('/addFriend/{id}', 'HomeController@sendRequest');

Route::get('/requests','HomeController@requests');

Route::get('/accept/{id}','HomeController@accept');

Route::get('/showFriends', 'HomeController@showFriends');