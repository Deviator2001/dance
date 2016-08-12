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
//ВХОД НА САЙТ
Route::get('login', 'AuthController@login'); //get получение вида с формой ввода логина и пароля
Route::post('login', 'AuthController@loginProcess'); //post получение введенных данных из формы - массив request

//РЕГИСТРАЦИЯ НА САЙТЕ
Route::get('register', 'AuthController@register'); //get получение вида с формой регистрации
Route::post('register', 'AuthController@registerProcess'); //post получение введенных данных из формы регистрации
Route::get('activate/{id}/{code}', 'AuthController@activate'); // Пользователь получил письмо и нажал ссылку для активации аккаунта сюда

Route::get('reset', 'AuthController@resetOrder');// Пользователь забыл пароль и запросил сброс пароля.
Route::post('reset', 'AuthController@resetOrderProcess');// Пользователь заполнил и отправил форму с E-Mail в запросе на сброс пароля
Route::get('reset/{id}/{code}', 'AuthController@resetComplete');// Пользователю пришло письмо со ссылкой на эту страницу для ввода нового пароля
Route::post('reset/{id}/{code}', 'AuthController@resetCompleteProcess');// Пользователь ввел новый пароль и отправил.
Route::get('wait', 'AuthController@wait');// Сервисная страничка о том, что письмо отправлено и надо заглянуть в почтовый ящик





Route::get('search', ['as' => 'site-search', 'uses' => 'SearchController@index']);

//Route::post('/', 'IndexController@search');

Route::get('/post/index', ['as' => 'post.index', 'uses' => 'PostController@index']);
Route::get('/styles', ['as' => 'index.styles', 'uses' => 'StyleController@index']);
Route::get('/', ['as' => 'index.index', 'uses' => 'IndexController@index']);
Route::post('/', ['as' => 'index.index', 'uses' => 'AuthController@loginProcess']);
Route::get('/contacts', ['as' => 'index.contacts', 'uses' => 'IndexController@contacts']);
Route::get('/trainers', ['as' => 'index.trainers', 'uses' => 'IndexController@trainers']);
Route::get('/gallery/index', ['as' => 'gallery.index', 'uses' => 'GalleryController@index']);
Route::get('/schedule', ['as' => 'schedule.index', 'uses' => 'ScheduleController@index']);

//Форум
Route::get('/message/index', ['as' => 'message.index', 'uses' => 'MessageController@index']);
Route::get('/message/create', ['as' => 'message.create', 'uses' => 'MessageController@create']);//вызов формы добавления записи
Route::post('/message/create', ['as' => 'message.create', 'uses' => 'MessageController@store']);//получение данных из формы и запись в базу

Route::DELETE('message/{message}', ['as' => 'message.destroy', 'uses' => 'MessageController@destroy']);


Route::get('category/{name?}', 'CategoryController@show');



Route::group(['middleware' => ['web']], function () {


// Выход пользователя из системы
    Route::get('logout', 'AuthController@logoutuser');






    Route::get('attaches/{date}/{filename}', function ($date,$filename)
    {
        return Storage::get('attaches/'.$date.'/'.$filename);
    });

    Route::get('post/create', ['as' => 'post.create', 'uses' => 'PostController@create']);//вызов формы добавления записи
    Route::post('post', ['as' => 'post.store', 'uses' => 'PostController@store']);//получение данных из формы и запись в базу

    Route::DELETE('post/{post}', ['as' => 'post.destroy', 'uses' => 'PostController@destroy']);
    Route::get('post/{post}', ['as' => 'post.show', 'uses' => 'PostController@show']);
    Route::get('post/{post}/edit', ['as' => 'post.edit', 'uses' => 'PostController@edit']);
    Route::post('post/{post}', ['as' => 'post.update', 'uses' => 'PostController@update']);


    Route::get('/fileentry/{post}', ['as' => 'fileentry', 'uses' => 'FileEntryController@index']);
    Route::get('/fileentry/get/{filename}', ['as' => 'getentry', 'uses' => 'FileEntryController@get']);
    Route::post('/fileentry/add/{post}',['as' => 'addentry', 'uses' => 'FileEntryController@add']);
    Route::get('/fileentry/del/{post}',['as' => 'delentry', 'uses' => 'FileEntryController@del']);

    Route::get('galery/create', ['as' => 'galery.create', 'uses' => 'GaleryController@create']);//вызов формы добавления записи
    Route::post('galery', ['as' => 'galery.store', 'uses' => 'GaleryController@store']);//получение данных из формы и запись в базу

    Route::get('galery/{galery}', ['as' => 'galery.show', 'uses' => 'GaleryController@show']);
    Route::get('galery/{galery}/edit', ['as' => 'galery.edit', 'uses' => 'GaleryController@edit']);
    Route::post('galery/{galery}', ['as' => 'galery.update', 'uses' => 'GaleryController@update']);



});
