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

use App\Models\Article;
use Illuminate\Support\Facades\Route;

// 引导用户到qq的登录授权页面
Route::get('auth/qq', 'Auth\AuthController@qq');
// 用户授权后qq回调的页面
Route::get('auth/callback', 'Auth\AuthController@callback');
Route::resource('notifications', 'Auth\NotificationsController', ['only' => ['index']]);
Route::get('getNoti','Auth\NotificationsController@getNoti');
Route::view('notifications','notifications.index');
Route::get('read/{id}', 'Auth\NotificationsController@read');
Route::view('addProfile', 'home.addProfile');
Route::post('addPassword', 'Auth\AuthController@addPassword');
//前台路由部分
Route::group(['namespace' => 'Home'], function () {
    //展示页面（需要登录权限）
    Route::group(['prefix' => 'index', 'middleware' => 'auth'], function () {
        //用户所有文章
        Route::get('listArticles', 'UsersController@listArticles')->name('listArticles');
        Route::get('getTypeArticles','UsersController@getArticle')->name('getTypeArticles');
        //评论管理
        Route::get('myComments', 'CommController@myComments')->name('myComments');
        Route::get('commDelete/{id}', 'CommController@delete')->name('commDelete');
        //专栏管理
        Route::get('myItems', 'ItemsController@myItems')->name('myItems');
        //用户资料修改
        Route::get('updateProfile', 'UsersController@updateProfile')->name('updateProfile');
        Route::post('updateUser', 'UsersController@updateUser')->name('updateUser');
        Route::post('uploadIcon', 'UsersController@uploadIcon')->name('uploadIcon');
        Route::post('checkUsername','UsersController@checkUsername');
        Route::post('checkEmail','UsersController@checkEmail');
        Route::post('checkPhone','UsersController@checkPhone');
        //基础设置
        Route::get('settings', 'SettingsController@index')->name('settings');
        Route::post('editor', 'SettingsController@editor')->name('editor');
        //用户头像上传
        Route::get('uploadImg', 'UsersController@uploadImg')->name('uploadImg');
        //关注与取消关注
        Route::post('focus', 'FocusController@focus')->name('focus');
        Route::post('d_focus', 'FocusController@d_focus')->name('d_focus');
        Route::get('myFocusUser', 'FocusController@myFocusUser')->name('myFocusUser');
        Route::get('myFocus', 'FocusController@myFocus')->name('myFocus');
        //收藏文章
        Route::post('coll', 'CollectionController@coll')->name('coll');
        Route::post('dColl', 'CollectionController@dColl')->name('dColl');
        Route::get('myColl', 'CollectionController@index')->name('myColl');
        //发送邮件
        Route::any('email', 'EmailController@sendEmail')->name('email');
    });
    //文章处理页面（需要登录权限）
    Route::group(['prefix' => 'article', 'middleware' => 'auth'], function () {
        //前台写文章展示
        Route::get('write', 'ArticlesController@write')->name('write');
        //上传封面
        Route::post('uploadCovers', 'ArticlesController@uploadCovers')->name('uploadCovers');
        //上传文章处理
        Route::post('store', 'ArticlesController@store')->name('store');
        //文章删除
        Route::get('delete/{id}', 'ArticlesController@delete')->name('delete');
        //修改文章
        Route::get('editorShow', 'ArticlesController@editorShow')->name('editorShow');
        Route::post('editor', 'ArticlesController@editor')->name('editor');
        //评论文章
        Route::post('comment', 'CommController@comment')->name('comment');
        //点赞
        Route::post('like', 'FocusController@like')->name('like');
        Route::post('commLike', 'FocusController@commLike')->name('commLike');
    });
    //全文搜索
    Route::get('search', 'SearchController@search');
    //登录部分
    Route::view('login', 'home.login')->name('login');
    //获取手机验证码
    Route::post('send', 'CodeController@getCode');
    Route::post('checkPhone', 'CodeController@checkPhone')->name('checkPhone');
    Route::post('checkEmail', 'CodeController@checkEmail')->name('checkEmail');
    Route::any('sendCodeEmail', 'CodeController@sendCodeEmail')->name('sendCodeEmail');
    //登录处理页面
    Route::post('check', 'LoginController@attemptLogin')->name('check');
    //注册处理部分
    Route::post('checkUser', 'RegisterController@checkUser')->name('checkUser');
    Route::post('checkUsername', 'RegisterController@checkUsername')->name('checkUsername');
    Route::post('signUp', 'RegisterController@signUp')->name('signUp');
    //发送激活邮箱
    Route::post('sendActivationMail', 'RegisterController@sendVerifyEmail');
    Route::get('checkVerifyEmail', 'RegisterController@checkVerifyEmail');
    //忘记密码
    Route::view('forgetPassword', 'home.forgetPassword');
    Route::post('editorPassword', 'ForgotController@editorPassword');
    //用户注销
    Route::get('logout', 'LoginController@logout')->name('logout');
    //所有文章展示
    Route::get('allArticle', 'IndexController@allArticle')->name('allArticle');
    Route::get('getArticle', 'IndexController@getArticle')->name('getArticle');
    //关于我们、帮助
    Route::get('about', 'SettingsController@about');
    Route::view('help', 'home.index.help');
    //联系我们
    Route::view('contact', 'home.user.contact')->name('contact');
    //文章展示
    Route::get('article', 'IndexController@article')->name('article');
    Route::get('getComments','CommController@getComments')->name('getComments');
    //用户资料展示
    Route::get('user/{username}', 'IndexController@user')->name('user');
    Route::get('getUserArticle','IndexController@getUserArticle')->name('getUserArticle');
    //首页路由
    Route::get('/', 'IndexController@index');

});

//后台路由部分
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    //登录页面
    Route::view('/', 'admin.login');
    //登录处理页面
    Route::post('login', 'LoginController@attemptLogin')->name('admin.login');
    //退出登录
    Route::get('logout', 'LoginController@logout');

    //路由部分（需要权限判断）'middleware' => 'auth.admin'
    Route::group(['prefix' => 'index', 'middleware' => 'auth.admin'], function () {
        Route::get('welcome', 'IndexController@welcome')->name('welcome');
        //用户管理
        Route::get('userManager', 'UserController@index')->name('userManager');
        Route::get('user.editor/{id}', 'UserController@editor')->name('user.editor');
        Route::post('user.update', 'UserController@update')->name('user.update');
        Route::get('user.delete/{id}', 'UserController@delete')->name('user.delete');
        //文章管理
        Route::get('articleManager', 'ArticleController@index')->name('articleManager');
        Route::get('article.editor/{id}', 'ArticleController@editor')->name('article.editor');
        Route::post('article.update', 'ArticleController@update')->name('article.update');
        Route::get('article.delete/{id}', 'ArticleController@delete')->name('article.delete');
        //评论管理
        Route::get('commentManager', 'CommentController@index')->name('commentManager');
        Route::get('commentDelete/{id}', 'CommentController@delete')->name('commentDelete');
        //分类管理
        Route::get('typeManager', 'TypeController@index')->name('typeManager');
        Route::view('typeInsert', 'admin.add.type')->name('typeInsert');
        Route::post('type.insert', 'TypeController@insert');
        Route::get('type.editor/{id}', 'TypeController@editor')->name('type.editor');
        Route::post('type.update', 'TypeController@update')->name('type.update');
        Route::get('type.delete/{id}', 'TypeController@delete')->name('type.delete');
        //管理员管理
        Route::get('adminAdd', 'AdminController@addShow')->name('adminAddShow');
        Route::post('add', 'AdminController@add')->name('adminAdd');
        Route::get('adminManager', 'AdminController@index')->name('adminManager');
        Route::get('manager.editor/{id}', 'AdminController@editor')->name('manager.editor');
        Route::post('manager.update', 'AdminController@update')->name('manager.update');
        Route::post('manager.delete/{id}', 'AdminController@delete')->name('manager.delete');
        //日志管理
        Route::get('userLog', 'LogController@userLog')->name('userLog');
        Route::get('adminLog', 'LogController@adminLog')->name('adminLog');
        //权限管理
        Route::get('powerManager', 'RoleController@index')->name('powerManager');
        Route::view('roleInsert', 'admin.add.role')->name('roleInsert');
        Route::post('role.insert', 'RoleController@insert')->name('role.insert');
        Route::get('role.editor/{id}', 'RoleController@editor')->name('role.editor');
        Route::post('role.update', 'RoleController@update')->name('role.update');
        Route::get('role.delete/{id}', 'RoleController@delete')->name('role.delete');
        //权限概览
        Route::get('rolePower', 'IndexController@rolePower')->name('rolePower');
        //用户信息
        Route::get('userHome/{username}', 'IndexController@userHome')->name('userHome');
    });
});


