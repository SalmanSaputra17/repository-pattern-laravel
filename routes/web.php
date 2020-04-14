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

Route::get('/', function() {
    // $user = \App\User::first();
    // $roles = \App\Role::all();

    // $user->roles()->attach([
    //     1 => [
    //         'name' => $user->name
    //     ],
    //     2 => [
    //         'name' => $user->name
    //     ]
    // ]);

    // $user->roles()->sync([
    //     1 => [
    //         'name' => $user->name
    //     ],
    //     2 => [
    //         'name' => $user->name
    //     ]
    // ]);

    // $user->roles()->syncWithoutDetaching([
    //     2 => [
    //         'name' => $user->name
    //     ],
    //     3 => [
    //         'name' => $user->name
    //     ]
    // ]);

    // $result = $user->roles;

    // foreach ($result as $key => $value) {
    //     dump("user id : " . $value->pivot->user_id);
    //     dump("role id : " . $value->pivot->role_id);
    //     dump("attach by : " . $value->pivot->name);
    // }

    return view('welcome');
});

Route::get('/customer', 'CustomerController@getAll');
Route::get('/customer/{id}', 'CustomerController@getById');
Route::get('/customer/{id}/update', 'CustomerController@getUpdate');
Route::get('/customer/{id}/delete', 'CustomerController@getDelete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/payment', 'PaymentController@payOrder')->name('payment');
Route::get('/article', 'ArticleController@index')->name('article');
