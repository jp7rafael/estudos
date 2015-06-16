<?php


Route::get('about', ['middleware', 'PagesController@about']);
Route::get('contact', 'PagesController@contact');
Route::get('/', 'ArticlesController@index');

Route::resource('articles', 'ArticlesController');
Route::get('/articles/seed', array('as' => 'articles.seed', 'uses' => 'ArticlesController@seed'));
Route::get('/articles/{articles}/send', array('as' => 'articles.email.create', 'uses' => 'ArticlesEmailController@create'));
Route::post('/articles/{articles}/send', array('as' => 'articles.email.send', 'uses' => 'ArticlesEmailController@send'));


Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
  ]);

