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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/onboard', function () {
    return view('onboard');
})->name('onboard.index');

Route::post('tutors', 'Api\TutorController@store')->name('tutors.store');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    // override voyager 
    Route::post('questions/store', ['uses' => 'VoyagerQuestionController@store', 'as' => 'voyager.questions.store']);
	Route::put('questions/store/{id}', ['uses' => 'VoyagerQuestionController@update', 'as' => 'voyager.questions.update']);
});
