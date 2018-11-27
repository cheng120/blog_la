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

Route::redirect('/', '/blog/index', 301);
/*
 * loginstart
 */


Route::group(['middleware'=>'web'],function() {
    Route::get('user/login', "Login\LoginController@loginView");
    Route::get('user/reg', "Login\LoginController@regView");
    Route::post('user/log', "Login\LoginController@login")->name("logUser");
    Route::post('user/reg', "Login\LoginController@regUser")->name("regUser");

});

Route::namespace('Admin')->group(function () {
    // 在 "App\Http\Controllers\Admin" 命名空间下的控制器
    Route::get('admin/login_user', "AdminController@adminLogin");
    Route::post('admin/dologin', "AdminController@dologin")->name("adminlog");
    Route::get('admin/Index', "IndexController@adminIndex")->name("adminIndex");
    Route::get('admin/main', "IndexController@adminMain")->name("adminMain");

});
/*
 * 链接留痕
 */
Route::get('go/url', "Test\TestController@saveUrl")->name("save_url");
Route::post('go/dourl', "Test\TestController@doSaveUrl")->name("saveUri");
Route::get('go/dourl', "Test\TestController@UrlList")->name("urlList");
Route::get('go/html', "Test\TestController@goHtml")->name("HtmlDetail");
Route::get('go/mp3', "Test\TestController@getMp3")->name("HtmlDetail");


Route::get('blog/index', "Index\IndexController@blogIndex")->name("blog_index");

/*
 * web blog
 */
Route::group(['middleware'=>'CheckLogStatus'],function() {
    Route::get('blog/write_art', "Index\IndexController@WriteBlog")->name("write_art");

});





