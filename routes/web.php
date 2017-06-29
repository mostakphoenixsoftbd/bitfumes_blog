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
