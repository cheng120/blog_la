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
Route::post('test/savefile', "Test\TestController@saveFile");


//Route::group(['middleware'=>'web'],function() {
//    Route::get('user/login', "Login\LoginController@loginView");
//    Route::get('user/reg', "Login\LoginController@regView");
//});
//Route::group(['middleware'=>'web'],function() {
//    Route::post('user/log', "Login\LoginController@login")->name("logUser");
//    Route::post('user/reg', "Login\LoginController@regUser")->name("regUser");
//
//});
Route::get('admin/login_user', "Admin\AdminController@adminLogin");
Route::post('admin/dologin', "Admin\AdminController@dologin")->name("adminlog");


Route::namespace('Admin')->middleware(['CheckAdminLoginStatus'])->group(function () {
    // 在 "App\Http\Controllers\Admin" 命名空间下的控制器
    Route::get('admin/Index', "IndexController@adminIndex")->name("adminIndex");
    Route::get('admin/main', "IndexController@adminMain")->name("adminMain");
    //admin_user
    Route::get('admin/admin_user_list', "UserCenterController@adminList");
    Route::post('admin/getAdminList', "UserCenterController@getAdminList");
    Route::get('admin/form_layer', "UserCenterController@form_layer");
    Route::get('admin/showAddAdminUser', "UserCenterController@showAddAdminUser");

    Route::post('admin/addAdminUser', "UserCenterController@addAdminUser");
    //user
    Route::get('admin/getUserList', "UserCenterController@getUserList");
    Route::post('admin/getUsersList', "UserCenterController@getUsersList");
    //img_room
    Route::get('admin/showBannerList', "ImgRoomController@showBannerList");
    Route::get('admin/showEditBannerList', "ImgRoomController@showEditBannerList");
    Route::post('admin/editBanner', "ImgRoomController@editBanner");
});
/*
 * 链接留痕
 */
Route::get('go/url', "Test\TestController@saveUrl")->name("save_url");
Route::post('go/dourl', "Test\TestController@doSaveUrl")->name("saveUri");
Route::get('go/dourl', "Test\TestController@UrlList")->name("urlList");
Route::get('go/html', "Test\TestController@goHtml")->name("HtmlDetail");
Route::get('go/mp3', "Test\TestController@getMp3")->name("HtmlDetail");
Route::post('go/mp3', "Test\TestController@getMp3")->name("HtmlDetail");



Route::domain('www.gocheng.cn')->group(function () {
    Route::get('user/login', "Login\LoginController@loginView");
    Route::get('user/reg', "Login\LoginController@regView");
    Route::get('user/logout', "Login\LoginController@user_logout");

    Route::post('user/log', "Login\LoginController@login")->name("logUser");
    Route::post('user/reg', "Login\LoginController@regUser")->name("regUser");

    Route::get('blog/index', "Index\IndexController@blogIndex")->name("blog_index");
    Route::get('blog/art', "Index\IndexController@articleInfo")->name("blog_art");

    Route::get('blog/write_art', "Index\IndexController@WriteBlog")->name("write_art")->middleware('CheckLogStatus');
    Route::post('blog/write_art_api', "Index\IndexController@writeBlogApi")->name("art_api")->middleware('CheckLogStatus');
    Route::post('blog/write_comment_api', "Index\IndexController@addComment")->name("comment");
    Route::get('blog/user_center', "Index\UserCenterController@showUserInfo")->middleware('CheckLogStatus');
    Route::post('blog/up_avatar', "Index\UserCenterController@uploadAvatar")->middleware('CheckLogStatus');
    Route::post('blog/up_user',"Index\UserCenterController@updataUserInfo")->middleware('CheckLogStatus');
    Route::get('general/toolCase',"Index\ToolCaseController@index");
    Route::get('general/time',"Index\ToolCaseController@toolForTime");


});

//ext
Route::get('live2d/message', "Live2d\IndexController@getLive2dMessage");
