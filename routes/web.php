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

Route::get('/services', 'PagesController@home');

Route::get('/contact', 'ContactController@home');
Route::post('/contact', 'ContactController@sendmarkdownmail')->name('mail.sendmarkdownmail');
// Route::post('/contact', 'ContactController@sendmail')->name('mail.htmlmailsend');
// Route::post('/contact', 'ContactController@store')->name('mail.rawmailsend');

Route::get('/facadestest', 'PagesController@facadesTest');

Route::get('/', function () {
	$articles = \App\Articles::take(3)->latest()->get();

    return view('welcome', [
    	'articles' => $articles
    ]);
});

Route::get('/about', function () {
    $articles = \App\Articles::take(3)->latest()->get();

    return view('welcome', [
    	'articles' => $articles
    ]);
});

Route::get('/articles', 'ArticlesController@index')->name('articles.index');
Route::post('/articles', 'ArticlesController@store')->name('articles.store');
Route::get('/articles/create', 'ArticlesController@create');
Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');
Route::get('/articles/{article}/edit', 'ArticlesController@edit');
Route::put('/articles/{article}', 'ArticlesController@update');

// Getting Request name
Route::get('/test', function(){
	$name = request('name');

	return view('test', [
		'name' => $name
	]);
});

// route wildcards
Route::get('/posts/{post}', 'PostsController@show');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// mail sending routes with auth middlewear...
Route::get('payments/create', 'PaymentsController@create')->middleware('auth');
Route::post('payments', 'PaymentsController@store')->middleware('auth')->name('payment.store');
Route::get('notification', 'NotificationsController@show')->middleware('auth')->name('notifications.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
