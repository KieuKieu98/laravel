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
// 
// Route::group(['prefix' => '/admin', 'middleware' => ['checkAdmin', 'CheckLogin'], 'namespace' => 'Admin'], function() {
    // Route::get('users', 'AdminUserController@sayHello')->middleware('checkAdmin');
    // 
    // Route::resource('photos', 'UserController');
// });

// Route::group('/client', fuction() {
    
// });
// Route::view('/welcome', 'welcome');
// Route::get('/', function () {
//     return 'Hello World';
// });
// Route::apiResource('/', 'Admin/UserController');

// Route::resource('demo', 'DemoController');

// Route::get('/', 'Admin\AdminUserController');
// Route::get('/admin', 'Admin\AdminUserController');


// Route::resource('admin/posts', 'AdminPostsController');


// Route::resource('admin/users', 'Admin\AdminUserController');
// Route::resource('admin/comments', 'AdminCommentController');

Route::get('/live_search', 'LiveSearch@index');
Route::get('/live_search/action', 'LiveSearch@action')->name('live_search.action');
Route::group(['prefix' => '/admin', 'namespace' => 'Admin'], function() {
    Route::resource('/service', 'ServiceController');
    Route::resource('/category', 'CategoryController');
    Route::resource('/about', 'AboutController');
    Route::resource('/blog', 'BlogController');
    Route::delete('myproductsDeleteAll', 'ServiceController@deleteAll');
});