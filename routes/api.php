<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Score;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function() {

	/**
	 * Authentication routes
	 */
	Route::post('register', 'Api\AuthController@register');
	Route::post('login','Api\AuthController@login');

	/**
	 * Tutors
	 */
	Route::get('tutors', 'Api\TutorController@index')->name('tutors.index');
	
	/**
	 * LeadersBoard
	 */
	Route::get('leadersboard', 'Api\ScoreController@leaderBoard')->name('leaderboard.index');


	Route::get('schools', 'Api\SchoolController@index')->name('schools.index');
	Route::get('subjects', 'Api\SubjectController@index')->name('subjects.index');
	Route::get('category', 'Api\CategoryController@index')->name('category.index');

	Route::post('questions', 'Api\QuestionController@index')->name('questions.index');

	Route::get('students', 'Api\TutorController@studentIndex')->name('students.index');

	Route::get('question/{id}/options','VoyagerQuestionController@getQuestionOptions')->name('questionOptions');

    Route::delete('question/{question_id}/options/{option_id}','VoyagerQuestionController@DeleteOption')->name('QuestionDeleteOption');

	
	Route::group(['middleware' => 'auth:api'], function() {

		Route::post('logout', 'Api\AuthController@logout');

		/**
         * School Route
         */
		Route::resource('schools','Api\SchoolController', ['except' => ['index']]);

		/**
         * School Route
         */
		Route::resource('subjects','Api\SubjectController', ['except' => ['index']]);
		
		/**
         * School Route
         */
		Route::resource('category','Api\CategoryController', ['except' => ['index']]);

		/**
         * Tutors Route
         */
		Route::resource('tutors','Api\TutorController', ['except' => ['index', 'store']]);

		/**
		 * Find tutor by subject
		 */
		Route::post('tutors/{subject}', 'Api\TutorController@findTutorBySubject')->name('tutors.subject');

		/**
         * Activation Route
         */
		Route::resource('activation','Api\ActivationController');

		/**
         * School Route
         */
		Route::resource('scores','Api\ScoreController', ['only' => ['index', 'store']]);
	});
    
});
