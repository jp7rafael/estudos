<?php

$factory('App\Article', [
     'user_id' => 1,
     'title' => 'New article',
     'body' => 'My content'
]);

$factory('App\User', [
    'name' => $faker->username,
    'email'=> $faker->email,
    'password' => $faker->password
]);