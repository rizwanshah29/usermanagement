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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/validview/',function (){
    return view('valid');
});

Auth::routes();
Route::group(['middleware' => ['role:admin']], function () {
    //
//Role Routes
    Route::get('admin/role/create','Admin\\RoleController@create');
    Route::post('admin/role/store','Admin\\RoleController@store');
    Route::get('admin/roles', 'Admin\\RoleController@index');
    Route::get('admin/role/{id}','Admin\\RoleController@show');
    Route::get('admin/role/{id}/edit','Admin\\RoleController@edit');
    Route::PATCH('admin/role/{id}','Admin\\RoleController@update');
    Route::get('admin_role_delete','Admin\\RoleController@destroy');

});

// Users Routes
Route::get('admin/users/create','Admin\\UsersController@create');
Route::post('admin/users/store','Admin\\UsersController@store');
Route::get('admin/users', 'Admin\\UsersController@index');
Route::get('admin/users/{id}','Admin\\UsersController@show');
Route::get('admin/users/{id}/edit','Admin\\UsersController@edit');
Route::PATCH('admin/users/{id}','Admin\\UsersController@update');
Route::get('admin_delete','Admin\\UsersController@destroy');



//Permission Routes
Route::get('admin/permission/create','Admin\\PermissionController@create');
Route::post('admin/permission/store','Admin\\PermissionController@store');
Route::get('admin/permissions', 'Admin\\PermissionController@index');
Route::get('admin/permission/{id}','Admin\\PermissionController@show');
Route::get('admin/permission/{id}/edit','Admin\\PermissionController@edit');
Route::PATCH('admin/permission/{id}','Admin\\PermissionController@update');
Route::get('admin_permission_delete','Admin\\PermissionController@destroy');
Route::get('admin/loadpermissions/{id}/role','Admin\\UsersController@loadpermissions');

//Posts Routes

Route::get('admin/posts/create','Admin\\PostsController@create');
Route::post('admin/posts/store','Admin\\PostsController@store');
Route::get('admin/posts', 'Admin\\PostsController@index');
Route::get('admin/posts/{id}','Admin\\PostsController@show');
Route::get('admin/posts/{id}/edit','Admin\\PostsController@edit');
Route::PATCH('admin/posts/{id}','Admin\\PostsController@update');
Route::get('admin_post_delete','Admin\\PostsController@destroy');
Route::get('admin/loadpermissions/{id}/role','Admin\\PostsController@loadpermissions');


//Route::resource('admin/posts', 'Admin\\PostsController');