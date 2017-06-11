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

//wap路由，要放到最前面，否则解析不到
Route::group(['domain' => env('APP_SUBDOMAIN'), 'namespace' => 'Wap'], function () {
	Route::get('/', 'IndexController@index')->name('wap_home');
	Route::get('/tags', 'IndexController@tags');
	Route::get('/search', 'IndexController@search');
	Route::get('/p/{id}', 'IndexController@detail');                            //详情页
	Route::get('/cat{cat}/{page}', 'IndexController@category');                 //分类页，分页
	Route::get('/cat{cat}', 'IndexController@category');                        //分类页
	Route::get('/tag{tag}/{page}', 'IndexController@tag');                      //标签页，分页
	Route::get('/tag{tag}', 'IndexController@tag');                             //标签页
	Route::get('/page/{id}', 'IndexController@singlepage')->name('wap_singlepage'); //单页
	Route::get('/sitemap.xml', 'IndexController@sitemap')->name('wap_sitemap'); //sitemap
	Route::get('/aaa', function () {
		dd('wap');
	});
});


//前台路由
Route::group(['namespace' => 'Home'], function () {
	Route::get('/', 'IndexController@index')->name('home');
	Route::get('/page404', 'IndexController@page404')->name('page404');         //404页面
	Route::get('/tags', 'IndexController@tags')->name('tags');
	Route::get('/search', 'IndexController@search');
	Route::get('/p/{id}', 'IndexController@detail')->name('home_detail');       //详情页
	Route::get('/cat{cat}/{page}', 'IndexController@category');                 //分类页，分页
	Route::get('/cat{cat}', 'IndexController@category')->name('home_category'); //分类页
	Route::get('/tag{tag}/{page}', 'IndexController@tag');                      //标签页，分页
	Route::get('/tag{tag}', 'IndexController@tag')->name('tag');                //标签页
	Route::get('/page/{id}', 'IndexController@page')->name('singlepage');       //单页
	Route::get('/product/{id}', 'IndexController@product')->name('product');    //详情页
	Route::get('/productcat{cat}/{page}', 'IndexController@productcat');        //产品分类页，分页
	Route::get('/productcat{cat}', 'IndexController@productcat')->name('productcat'); //产品分类页
	Route::get('/sitemap.xml', 'IndexController@sitemap')->name('sitemap');     //sitemap
	
	Route::get('/aaa', function () {
		dd('wap');
	});
});


//后台路由
Route::group(['prefix' => 'fladmin', 'namespace' => 'Admin', 'middleware' => ['web']], function () {
	Route::get('/', 'IndexController@index')->name('admin');
	Route::get('/index/upconfig', 'IndexController@upconfig')->name('admin_index_upconfig'); //更新系统参数配置
	Route::get('/index/upcache', 'IndexController@upcache')->name('admin_index_upcache'); //更新缓存
	//文章
	Route::get('/article', 'ArticleController@index')->name('admin_article');
	Route::get('/article/add', 'ArticleController@add')->name('admin_article_add');
	Route::post('/article/doadd', 'ArticleController@doadd')->name('admin_article_doadd');
	Route::get('/article/edit', 'ArticleController@edit')->name('admin_article_edit');
	Route::post('/article/doedit', 'ArticleController@doedit')->name('admin_article_doedit');
	Route::get('/article/del', 'ArticleController@del')->name('admin_article_del');
	Route::get('/article/repetarc', 'ArticleController@repetarc')->name('admin_article_repetarc');
	Route::get('/article/recommendarc', 'ArticleController@recommendarc')->name('admin_article_recommendarc');
	Route::get('/article/articleexists', 'ArticleController@articleexists')->name('admin_article_articleexists');
	//栏目
	Route::get('/category', 'CategoryController@index')->name('admin_category');
	Route::get('/category/add', 'CategoryController@add')->name('admin_category_add');
	Route::post('/category/doadd', 'CategoryController@doadd')->name('admin_category_doadd');
	Route::get('/category/edit', 'CategoryController@edit')->name('admin_category_edit');
	Route::post('/category/doedit', 'CategoryController@doedit')->name('admin_category_doedit');
	Route::get('/category/del', 'CategoryController@del')->name('admin_category_del');
	//标签
	Route::get('/tag', 'TagController@index')->name('admin_tag');
	Route::get('/tag/add', 'TagController@add')->name('admin_tag_add');
	Route::post('/tag/doadd', 'TagController@doadd')->name('admin_tag_doadd');
	Route::get('/tag/edit', 'TagController@edit')->name('admin_tag_edit');
	Route::post('/tag/doedit', 'TagController@doedit')->name('admin_tag_doedit');
	Route::get('/tag/del', 'TagController@del')->name('admin_tag_del');
	//单页
	Route::get('/page', 'PageController@index')->name('admin_page');
	Route::get('/page/add', 'PageController@add')->name('admin_page_add');
	Route::post('/page/doadd', 'PageController@doadd')->name('admin_page_doadd');
	Route::get('/page/edit', 'PageController@edit')->name('admin_page_edit');
	Route::post('/page/doedit', 'PageController@doedit')->name('admin_page_doedit');
	Route::get('/page/del', 'PageController@del')->name('admin_page_del');
	//产品
	Route::get('/product', 'ProductController@index')->name('admin_product');
	Route::get('/product/add', 'ProductController@add')->name('admin_product_add');
	Route::post('/product/doadd', 'ProductController@doadd')->name('admin_product_doadd');
	Route::get('/product/edit', 'ProductController@edit')->name('admin_product_edit');
	Route::post('/product/doedit', 'ProductController@doedit')->name('admin_product_doedit');
	Route::get('/product/del', 'ProductController@del')->name('admin_product_del');
	Route::get('/product/recommendarc', 'ProductController@recommendarc')->name('admin_product_recommendarc');
	Route::get('/product/articleexists', 'ProductController@productexists')->name('admin_product_productexists');
	//产品分类
	Route::get('/producttype', 'ProductTypeController@index')->name('admin_producttype');
	Route::get('/producttype/add', 'ProductTypeController@add')->name('admin_producttype_add');
	Route::post('/producttype/doadd', 'ProductTypeController@doadd')->name('admin_producttype_doadd');
	Route::get('/producttype/edit', 'ProductTypeController@edit')->name('admin_producttype_edit');
	Route::post('/producttype/doedit', 'ProductTypeController@doedit')->name('admin_producttype_doedit');
	Route::get('/producttype/del', 'ProductTypeController@del')->name('admin_producttype_del');
	//友情链接
	Route::get('/friendlink', 'FriendlinkController@index')->name('admin_friendlink');
	Route::get('/friendlink/add', 'FriendlinkController@add')->name('admin_friendlink_add');
	Route::post('/friendlink/doadd', 'FriendlinkController@doadd')->name('admin_friendlink_doadd');
	Route::get('/friendlink/edit', 'FriendlinkController@edit')->name('admin_friendlink_edit');
	Route::post('/friendlink/doedit', 'FriendlinkController@doedit')->name('admin_friendlink_doedit');
	Route::get('/friendlink/del', 'FriendlinkController@del')->name('admin_friendlink_del');
	//关键词管理
	Route::get('/keyword', 'KeywordController@index')->name('admin_keyword');
	Route::get('/keyword/add', 'KeywordController@add')->name('admin_keyword_add');
	Route::post('/keyword/doadd', 'KeywordController@doadd')->name('admin_keyword_doadd');
	Route::get('/keyword/edit', 'KeywordController@edit')->name('admin_keyword_edit');
	Route::post('/keyword/doedit', 'KeywordController@doedit')->name('admin_keyword_doedit');
	Route::get('/keyword/del', 'KeywordController@del')->name('admin_keyword_del');
	//搜索关键词
	Route::get('/searchword', 'SearchwordController@index')->name('admin_searchword');
	Route::get('/searchword/add', 'SearchwordController@add')->name('admin_searchword_add');
	Route::post('/searchword/doadd', 'SearchwordController@doadd')->name('admin_searchword_doadd');
	Route::get('/searchword/edit', 'SearchwordController@edit')->name('admin_searchword_edit');
	Route::post('/searchword/doedit', 'SearchwordController@doedit')->name('admin_searchword_doedit');
	Route::get('/searchword/del', 'SearchwordController@del')->name('admin_searchword_del');
	//幻灯片
	Route::get('/slide', 'SlideController@index')->name('admin_slide');
	Route::get('/slide/add', 'SlideController@add')->name('admin_slide_add');
	Route::post('/slide/doadd', 'SlideController@doadd')->name('admin_slide_doadd');
	Route::get('/slide/edit', 'SlideController@edit')->name('admin_slide_edit');
	Route::post('/slide/doedit', 'SlideController@doedit')->name('admin_slide_doedit');
	Route::get('/slide/del', 'SlideController@del')->name('admin_slide_del');
	//在线留言管理
	Route::get('/guestbook', 'GuestbookController@index')->name('admin_guestbook');
	Route::get('/guestbook/del', 'GuestbookController@del')->name('admin_guestbook_del');
	//系统参数配置
	Route::get('/sysconfig', 'SysconfigController@index')->name('admin_sysconfig');
	Route::get('/sysconfig/add', 'SysconfigController@add')->name('admin_sysconfig_add');
	Route::post('/sysconfig/doadd', 'SysconfigController@doadd')->name('admin_sysconfig_doadd');
	Route::get('/sysconfig/edit', 'SysconfigController@edit')->name('admin_sysconfig_edit');
	Route::post('/sysconfig/doedit', 'SysconfigController@doedit')->name('admin_sysconfig_doedit');
	Route::get('/sysconfig/del', 'SysconfigController@del')->name('admin_sysconfig_del');
	//用户管理
	Route::get('/user', 'UserController@index')->name('admin_user');
	Route::get('/user/add', 'UserController@add')->name('admin_user_add');
	Route::post('/user/doadd', 'UserController@doadd')->name('admin_user_doadd');
	Route::get('/user/edit', 'UserController@edit')->name('admin_user_edit');
	Route::post('/user/doedit', 'UserController@doedit')->name('admin_user_doedit');
	Route::get('/user/del', 'UserController@del')->name('admin_user_del');
	//角色管理
	Route::get('/userrole', 'UserRoleController@index')->name('admin_userrole');
	Route::get('/userrole/add', 'UserRoleController@add')->name('admin_userrole_add');
	Route::post('/userrole/doadd', 'UserRoleController@doadd')->name('admin_userrole_doadd');
	Route::get('/userrole/edit', 'UserRoleController@edit')->name('admin_userrole_edit');
	Route::post('/userrole/doedit', 'UserRoleController@doedit')->name('admin_userrole_doedit');
	Route::get('/userrole/del', 'UserRoleController@del')->name('admin_userrole_del');
	Route::get('/userrole/permissions', 'UserRoleController@permissions')->name('admin_userrole_permissions'); //权限设置
	Route::post('/userrole/dopermissions', 'UserRoleController@dopermissions')->name('admin_userrole_dopermissions');
	//菜单管理
	Route::get('/menu', 'MenuController@index')->name('admin_menu');
	Route::get('/menu/add', 'MenuController@add')->name('admin_menu_add');
	Route::post('/menu/doadd', 'MenuController@doadd')->name('admin_menu_doadd');
	Route::get('/menu/edit', 'MenuController@edit')->name('admin_menu_edit');
	Route::post('/menu/doedit', 'MenuController@doedit')->name('admin_menu_doedit');
	Route::get('/menu/del', 'MenuController@del')->name('admin_menu_del');
	//后台登录注销
	Route::get('/login', 'LoginController@login')->name('admin_login');
	Route::post('/dologin', 'LoginController@dologin')->name('admin_dologin');
	Route::get('/logout', 'LoginController@logout')->name('admin_logout');
	Route::get('/recoverpwd', 'LoginController@recoverpwd')->name('admin_recoverpwd');
	//页面跳转
	Route::get('/jump', 'LoginController@jump')->name('admin_jump');
});

//接口路由
Route::group(['prefix' => 'api', 'namespace' => 'Api', 'middleware' => ['web']], function () {
	Route::post('/listarc', 'IndexController@listarc')->name('api_listarc');
    Route::get('/ccc', function () {
        // 匹配 "/api/users" URL
    });
});


//中间件
Route::group(['middleware' => 'auth'], function () {
    Route::get('/qwe', function () {
        // 使用 Auth 中间件
    });

    Route::get('user/profile', function () {
        // 使用 Auth 中间件
    });
});











//https://github.com/cong5/myPersimmon
//前台
/* Route::group(['namespace' => 'App'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/post/{flag}', 'HomeController@posts')->name('post');
    Route::get('/tags/{flag}', 'HomeController@tags')->name('tags');
    Route::get('/category/{flag}', 'HomeController@category')->name('category');
    Route::get('/feed', 'HomeController@feed');
    Route::get('/sitemap.xml', 'HomeController@siteMap');
    Route::get('/xmlrpc', 'XmlRpcController@errorMessage');
    Route::post('/xmlrpc', 'XmlRpcController@index')->name('xmlrpc');
    Route::get('/friends', 'HomeController@friends')->name('friends');
    Route::resource('/comment', 'CommentController');
    Route::get('/debug', 'HomeController@debug')->name('debug');
});

//后台
Route::group(['prefix' => 'myp', 'namespace' => 'Backend'], function () {
    Route::get('/', 'DashboardController@dashboard')->name('admin');
    Route::post('/auth/check', 'AuthController@check')->name('admin.login_check');
    Route::post('/auth/logout', 'AuthController@logout')->name('admin.logout');
    Route::post('/auth/login', 'AuthController@authenticate')->name('admin.login');
});
Route::group(['prefix' => 'myp', 'middleware' => 'auth', 'namespace' => 'Backend'], function () {
    Route::get('/dashboard/meta', 'DashboardController@meta');
    Route::get('/dashboard/shanbay', 'DashboardController@shanbay');
    Route::resource('/categorys', 'CategorysController');
    Route::resource('/posts', 'PostsController');
    Route::resource('/tags', 'TagsController');
    Route::resource('/links', 'LinksController');
    Route::resource('/options', 'OptionsController');
    Route::resource('/settings', 'SettingsController');
    Route::resource('/navigations', 'NavigationController');
    Route::resource('/uploads', 'FileController');
    Route::resource('/util', 'UtilController');
    Route::resource('/user', 'UserController');
    Route::resource('/comments', 'CommentController');
    Route::resource('/trash', 'TrashController');
}); */







