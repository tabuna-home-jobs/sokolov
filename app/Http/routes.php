<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {

    return view('welcome');
});


Route::group(['prefix' => '{local}'], function (){


    /**
     * Авторизация, регистрация, востановление пароля
     */
    Route::controllers([
        'auth' => 'Auth\AuthController',
        'password' => 'Auth\PasswordController',
    ]);


    /**
     * Администратор
     */
    Route::group(['namespace' => 'Dashboard', 'middleware' => ['auth'], 'prefix' => 'dashboard'], function () {

        Route::resource('user', 'UserController');
        Route::resource('groups', 'GroupsController');
        Route::resource('page', 'PageController');
        Route::resource('news', 'NewsController');
        Route::resource('shares', 'SharesController');
        Route::resource('', 'AdminController');
        Route::resource('feedback', 'FeedbackController');
        Route::resource('category', 'CategoryController');
        Route::resource('goods', 'GoodsController');


        Route::get('/wmenuindex', array('as' => 'wmenuindex', 'uses' => 'WmenuController@wmenuindex'));
        Route::post('/addcustommenu', array('as' => 'addcustommenu', 'uses' => 'WmenuController@addcustommenu'));
        Route::post('/deleteitemmenu', array('as' => 'deleteitemmenu', 'uses' => 'WmenuController@deleteitemmenu'));
        Route::post('/deletemenug', array('as' => 'deletemenug', 'uses' => 'WmenuController@deletemenug'));
        Route::post('/createnewmenu', array('as' => 'createnewmenu', 'uses' => 'WmenuController@createnewmenu'));
        Route::post('/generatemenucontrol', array('as' => 'generatemenucontrol', 'uses' => 'WmenuController@generatemenucontrol'));
        Route::post('/updateitem', array('as' => 'updateitem', 'uses' => 'WmenuController@updateitem'));
    });


});