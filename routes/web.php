<?php
Auth::routes();
Route::get('/', 'FrontendController@index');
Route::group(['prefix'=>'feposts'], function() {
  Route::get('category/{category}', 'FrontendController@category')->name('feposts.category');
  Route::get('tag/{tag}', 'FrontendController@tag')->name('feposts.tag');
  Route::get('user/{user}', 'FrontendController@user')->name('feposts.user');
  Route::post('search', 'FrontendController@search')->name('feposts.search');
  Route::post('subscribe', 'FrontendController@subscribe')->name('feposts.subscribe');
});
Route::resource('feposts', 'FrontendController')->only(['index', 'show']);
Route::group(['prefix'=>'admin'], function() {
  Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('posts/trashed', 'PostController@trashedIndex')->name('posts.trashed');
    Route::post('posts/{id}/restore', 'PostController@restorePost')->name('posts.restore');
    Route::delete('posts/{id}/permDelete', 'PostController@permDelete')->name('posts.permDelete');
    Route::post('users/{user}/admin', 'UserController@adminToggle')
      ->middleware('admin')->name('users.adminToggle');
    Route::get('profile/{user}', 'ProfileController@editProfile')->name('profile.editProfile');
    Route::put('profile/{user}', 'ProfileController@saveProfile')->name('profile.saveProfile');
    Route::resource('posts', 'PostController')->except(['show']);
    Route::resource('categories', 'CategoryController')->except(['create', 'show']);
    Route::resource('tags', 'TagController')->except(['create', 'show']);
    Route::resource('users', 'UserController')->except(['show', 'edit', 'update']);
    Route::get('settings/edit', 'SettingController@edit')->name('settings.edit');
    Route::put('settings/{settings}/update', 'SettingController@update')->name('settings.update');
  });
});
