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

/**
 * Forum Routes
 */
Route::get('forum/login', 'ForumController@login_show')->name('forum.login');

Route::post('forum/login', 'ForumController@login')->name('forum.auth.login');

Route::post('forum/logout', 'ForumController@logout')->name('forum.auth.logout');

Route::get('forum', 'ForumController@index')->name('forum.index');
Route::get('forum/{slug}/topic', 'ForumController@showTopic')->name('forum.show');
Route::get('forum/search', 'ForumController@findTopic')->name('forum.findTopic');
Route::get('forum/categories', 'ForumController@categories')->name('forum.categories');
Route::get('forum/{slug}/categories', 'ForumController@categories_show')->name('forum.categories.show');
Route::get('forum/{user}/profile', 'ForumController@profile_show')->name('forum.profile.show');

Route::get('forum/404', 'ForumController@error404')->name('forum.404');

Route::group(
    ['middleware' => ['auth']],
    function () {
        Route::get('forum/create', 'ForumController@create')->name('forum.create');
        Route::post('forum/create', 'ForumController@storeTopic')->name('forum.storeTopic');
        Route::post('forum/comment', 'ForumController@storeComment')->name('forum.storeComment');
        Route::get('forum/{slug}/topic/like', 'ForumController@likeTopic')->name('forum.likeTopic');
        Route::get('forum/{comment_id}/topic/comment', 'ForumController@likeComment')->name('forum.likeComment');
    }
);

/**
 * Tutors Routes
 */
Route::post('tutors', 'Api\TutorController@store')->name('tutors.store');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    // override voyager 
    Route::post('questions/store', ['uses' => 'VoyagerQuestionController@store', 'as' => 'voyager.questions.store']);
	Route::put('questions/store/{id}', ['uses' => 'VoyagerQuestionController@update', 'as' => 'voyager.questions.update']);
});
