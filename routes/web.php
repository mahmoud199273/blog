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

Route::name('home')->get('/', 'Front\ArticlesController@index');
Route::name('home')->get('/home', 'Front\ArticlesController@index');
Route::name('categories')->get('/category/{categoryId}/{articles?}', 'Front\ArticlesController@CategoryArticles');
Route::name('ShowArticle')->get('/ShowArticle/{articleId}/{articleTile?}', 'Front\ArticlesController@ShowArticle');
Route::name('SaveComment')->post('/SaveComment', 'Front\ArticlesController@SaveComment');
//Route::name('login')->get('/login', 'Back\LoginController@index');
//Route::name('doLogin')->post('/login', 'Back\LoginController@doLogin');

Route::prefix('admin')->namespace('Back')->group(function () {
        
    Route::name('admin')->get('/', 'AdminController@index');
    
    // Articles Module
    Route::name('ShowArticles')->get('/ShowArticles', 'ArticlesController@ShowArticles');
    Route::name('AddArticle')->get('/AddArticle', 'ArticlesController@AddArticle');
    Route::name('SaveArticle')->post('/SaveArticle', 'ArticlesController@SaveArticle');
    Route::name('EditArticle')->get('/EditArticle/{id?}', 'ArticlesController@EditArticle');
    Route::name('DeleteArticle')->get('/DeleteArticle/{id?}', 'ArticlesController@DeleteArticle');
    
    // Categories Module
    Route::name('ShowCategories')->get('/ShowCategories', 'CategoryController@ShowCategories');
    Route::name('AddCategory')->get('/AddCategory', 'CategoryController@AddCategory');
    Route::name('SaveCategory')->post('/SaveCategory', 'CategoryController@SaveCategory');
    Route::name('EditCategory')->get('/EditCategory/{id?}', 'CategoryController@EditCategory');
    Route::name('DeleteCategory')->get('/DeleteCategory/{id?}', 'CategoryController@DeleteCategory');
});