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
Route::group(['middleware' => ['role:super-admin']], function () {
    //
    //Role Routes
    Route::get('admin/role/create','Admin\\RoleController@create');
    Route::post('admin/role/store','Admin\\RoleController@store');
    Route::get('admin/roles', 'Admin\\RoleController@index');
    Route::get('admin/role/{id}','Admin\\RoleController@show');
    Route::get('admin/role/{id}/edit','Admin\\RoleController@edit');
    Route::PATCH('admin/role/{id}','Admin\\RoleController@update');
    Route::Delete('admin/role/{id}','Admin\\RoleController@destroy');

});
// Users Routes
Route::get('admin/users/create','Admin\\UsersController@create');
Route::post('admin/users/store','Admin\\UsersController@store');
Route::get('admin/users', 'Admin\\UsersController@index');
Route::get('admin/users/{id}','Admin\\UsersController@show');
Route::get('admin/users/{id}/edit','Admin\\UsersController@edit');
Route::PATCH('admin/users/{id}','Admin\\UsersController@update');
Route::Delete('admin/users/{id}','Admin\\UsersController@destroy');





//Permission Routes
Route::get('admin/permission/create','Admin\\PermissionController@create');
Route::post('admin/permission/store','Admin\\PermissionController@store');
Route::get('admin/permissions', 'Admin\\PermissionController@index');
Route::get('admin/permission/{id}','Admin\\PermissionController@show');
Route::get('admin/permission/{id}/edit','Admin\\PermissionController@edit');
Route::PATCH('admin/permission/{id}','Admin\\PermissionController@update');
Route::Delete('admin/permission/{id}','Admin\\PermissionController@destroy');



