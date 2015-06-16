<?php


Route::get('about', ['middleware', 'PagesController@about']);
Route::get('contact', 'PagesController@contact');
Route::get('/', 'ArticlesController@index');

Route::resource('articles', 'ArticlesController');
Route::get('/articles/{articles}/send', 'ArticlesEmailController@create');
Route::post('/articles/{articles}/send', 'ArticlesEmailController@send');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
  ]);

