<?php

use Illuminate\Support\Facades\Route;

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

Route::view('test', 'test.example');

Route::middleware(['auth'])->group(function () {
    Route::get('my-builds', 'LoadoutController@myBuilds')->name('builds.my');
    Route::get('favorites', 'LoadoutController@favorites')->name('builds.favorites');
    Route::get('settings/tokens', 'SettingsController@tokens')->name('settings.tokens');

    Route::resource('builds', 'LoadoutController')->except(['index', 'show']);
    Route::resource('builds.favorites', 'Build\FavoriteController')->only('store');

});

Route::resource('builds', 'LoadoutController')->only(['index', 'show']);
Route::view('/privacy-policy', 'privacy-policy.index');
Route::get('/', 'LoadoutController@index');
Auth::routes();



//Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
	'prefix' => config('backpack.base.route_prefix', 'admin'),
	'middleware' => ['role:super-admin'],
	'namespace' => '\Backpack\PermissionManager\app\Http\Controllers'
], function () {
  	Route::crud('permission', 'PermissionCrudController');
    Route::crud('role', 'RoleCrudController');
    Route::crud('user', 'UserCrudController');

});
