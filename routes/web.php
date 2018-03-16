<?php

// User Routes

Route::group(['namespace' => 'User'], function(){

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('post/{post}', 'PostController@post')->name('post');

    Route::get('tag/{tag}', 'HomeController@tag')->name('tag');

    Route::get('category/{category}', 'HomeController@category')->name('category');

});

// Admin Routes

Route::group(['namespace' => 'Admin'], function(){

    Route::get('admin/home', 'HomeController@index')->name('admin.home');

    // Users Routes

    Route::resource('admin/user', 'UserController');

    // Post Routes

    Route::resource('admin/post', 'PostController');

    // Tag Routes

    Route::resource('admin/tag', 'TagController');

    // Category Routes

    Route::resource('admin/category', 'CategoryController');

    // Admin Auth Routes

    Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');

    Route::post('admin-login', 'Auth\LoginController@login');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
