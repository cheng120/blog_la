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
/*
 * loginstart
 */
Route::get('user/login', "Login\LoginController@loginView");

/*
 * 链接留痕
 */
Route::get('go/url', "Test\TestController@saveUrl")->name("save_url");
Route::post('go/dourl', "Test\TestController@doSaveUrl")->name("saveUri");
Route::get('go/dourl', "Test\TestController@UrlList")->name("urlList");



