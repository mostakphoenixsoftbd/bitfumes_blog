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

// pages

Route::get('/', 'PagesController@home');

Route::get('about', 'PagesController@about');

Route::get('blog', 'PagesController@blog');

Route::get('contact', 'PagesController@contact')->name('pages.contact');

// posts

Route::resource('posts', 'PostsController');

// slug

Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@Single'])->where('slug', '[\w\d\-\_]+');

// auth

Auth::routes();

// categories

Route::get('categories', 'CategoriesController@index')->name('categories.index');

Route::post('categories', 'CategoriesController@store')->name('categories.store');

Route::get('categories/{category}', 'CategoriesController@show')->name('categories.show');

Route::get('categories/{category}/edit', 'CategoriesController@edit')->name('categories.edit');

Route::put('categories/{category}', 'CategoriesController@update')->name('categories.update');

Route::delete('categories/{category}', 'CategoriesController@destroy')->name('categories.destroy');

// tags

Route::get('tags', 'TagsController@index')->name('tags.index');

Route::post('tags', 'TagsController@store')->name('tags.store');

Route::get('tags/{tag}', 'TagsController@show')->name('tags.show');

Route::get('tags/{tag}/edit', 'TagsController@edit')->name('tags.edit');

Route::put('tags/{tag}', 'TagsController@update')->name('tags.update');

Route::delete('tags/{tag}', 'TagsController@destroy')->name('tags.destroy');
