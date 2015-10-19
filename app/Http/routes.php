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


//Route::post('/payments/order', function () {
//    return 'Hello World';
//});


Route::group(['namespace' => 'Payments', 'prefix' => 'payments'], function () {
    Route::resource('order', 'AvisoController');
    Route::resource('status', 'StatusController');
});


/**
 * Авторизация, регистрация, востановление пароля
 */
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
Route::resource('language', 'Language\LanguageController');

/**
 * Администратор
 */
Route::group(['namespace' => 'Dashboard', 'middleware' => ['auth', 'admin'], 'prefix' => 'dashboard'], function () {

    Route::resource('user', 'UserController');
    Route::resource('editor', 'EditorUserController');
    Route::resource('page', 'PageController');
    Route::resource('news', 'NewsController');
    Route::resource('shares', 'SharesController');
    Route::resource('', 'AdminController');
    Route::resource('feedback', 'FeedbackController');
    Route::resource('category', 'CategoryController');
    Route::resource('goods', 'GoodsController');
    Route::resource('order', 'OrderController');
    Route::resource('comments', 'CommentsController');
    Route::resource('filemanager', 'FileManagerController');
    Route::resource('review', 'ReviewController');
    Route::resource('task', 'TaskController');
    Route::resource('langorder', OrderLangController::class);
    Route::resource('block', 'BlockController');
    Route::resource('element', 'ElementController');

    Route::resource('statinfo', 'StatInfoController');

    Route::get('/wmenuindex', array('as' => 'wmenuindex', 'uses' => 'WmenuController@wmenuindex'));
    Route::post('/addcustommenu', array('as' => 'addcustommenu', 'uses' => 'WmenuController@addcustommenu'));
    Route::post('/deleteitemmenu', array('as' => 'deleteitemmenu', 'uses' => 'WmenuController@deleteitemmenu'));
    Route::post('/deletemenug', array('as' => 'deletemenug', 'uses' => 'WmenuController@deletemenug'));
    Route::post('/createnewmenu', array('as' => 'createnewmenu', 'uses' => 'WmenuController@createnewmenu'));
    Route::post('/generatemenucontrol', array('as' => 'generatemenucontrol', 'uses' => 'WmenuController@generatemenucontrol'));
    Route::post('/updateitem', array('as' => 'updateitem', 'uses' => 'WmenuController@updateitem'));
});


Route::group(['namespace' => 'Site'], function () {
    Route::resource('', 'IndexController');
    Route::resource('page', 'PageController');
    Route::resource('news', 'NewsController');
    Route::resource('feedback', 'FeedbackController');
    Route::resource('review', 'ReviewController');
    Route::resource('search', 'SearchController');
    Route::resource('catalog', 'CatalogController');


    Route::group(['middleware' => ['auth', 'user']], function () {
        Route::resource('home', 'HomeController');
        //  Route::resource('setting', 'SettingController');
        Route::resource('order', 'OrderController');
        Route::resource('comments', 'CommentsController');
        Route::resource('payments', 'PaymentsController');
        Route::resource('filemanager', 'FileManagerController');
    });
});


Route::group(['middleware' => ['auth'], 'namespace' => 'Site'], function () {

    Route::resource('setting', 'SettingController');
});


Route::group(['namespace' => 'Editor', 'middleware' => ['auth', 'editor'], 'prefix' => 'editor'], function () {
    Route::resource('', 'IndexController');
    Route::resource('order', 'OrderController');
    Route::resource('chan', 'ChanController');
    Route::resource('comment', 'CommentController');
    Route::resource('filemanager', 'FileManagerController');

    Route::resource('payments', 'PaymentsController');
});



