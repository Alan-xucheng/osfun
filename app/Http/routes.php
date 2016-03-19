<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

/**
 * 当访问admin/...时，如果未验证则跳转至admin/public/login
 */
Route::group(['middleware' => ['web', 'auth:admin'], 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::controllers([
        '/project' => 'ProjectController',
        '/home' => 'AdminController',
        '/article' =>'ArticleController',
    ]);


    Route::get('/', function() {
        return 'this is home of user. <a href="' . url('admin/public/logout') . '">logout</a>';
    });
   
    // your admin routes
});
/**
 * 当访问user/...时，如果未验证则跳转至user/public/login
 */
Route::group(['middleware' => ['web', 'auth:user'], 'prefix' => 'user', 'namespace' => 'User'], function () {

   Route::controllers([
        '/show' => 'ShowController',
        '/home' => 'HomeController',
        '/api' =>'ApiController',
        '/message' => 'MessageController',
     
    ]);
    Route::get('/', function() {
        return 'this is home of user. <a href="' . url('user/public/logout') . '">logout</a>';
    });
    // your user routes
});

Route::group(['middleware' => ['web', 'auth:service'], 'prefix' => 'service', 'namespace' => 'Service'], function () {
    Route::controller('/home','ServiceController');
       Route::get('/', function() {
        return 'this is home of user. <a href="' . url('service/public/logout') . '">logout</a>';
    });
    // your user routes
});
Route::group(['middleware' => 'web'], function() {
    Route::get('/','Publish\HomeController@getIndex');
    Route::auth();
    Route::controllers([
        'admin/public' => 'Admin\PublicController',
        'user/public' => 'User\PublicController',
        'api' => 'Publish\ApiController',
        'service/public' => 'Service\PublicController',
        'academy' => 'Publish\AcademyController',
        'view' => 'Publish\ViewController',
    ]);
});

