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


Route::group(['middleware'=>'web'],function() {
    Route::get('user/login', "Login\LoginController@loginView");
    Route::post('user/log', "Login\LoginController@login")->name("logUser");
});

Route::namespace('Admin')->group(function () {
    // 在 "App\Http\Controllers\Admin" 命名空间下的控制器
    Route::get('admin/login_user', "AdminController@adminLogin");
});
/*
 * 链接留痕
 */
Route::get('go/url', "Test\TestController@saveUrl")->name("save_url");
Route::post('go/dourl', "Test\TestController@doSaveUrl")->name("saveUri");
Route::get('go/dourl', "Test\TestController@UrlList")->name("urlList");
Route::get('go/html', "Test\TestController@goHtml")->name("HtmlDetail");
Route::get('go/mp3', "Test\TestController@getMp3")->name("HtmlDetail");

/*
 * web blog
 */
Route::get('blog/index', "Index\IndexController@blogIndex")->name("blog_index");





