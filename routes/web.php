<?php
use Illuminate\Support\Facades\Auth;
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
Route::get('/', 'TaskController@userList');
Route::get('register', function () {
    return view('register');
});
//로그인 관련
Route::view('login','login');
Route::post('login', 'Login@login');
Route::post('logout','Login@logout');
Route::post('register', 'Login@register');

Route::get('/chat', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');

//하단메뉴 러유투
Route::get('home','HomeController@index');
Route::view('category','category');
Route::view('search','search');
Route::view('message','message');
Route::view('setting','setting');

//상품 라우트
Route::get('goods','GoodsController@goodsList')->name('goodsList');
Route::get('goodsdetail/{idx}','GoodsController@getSingleData');
Route::get('goodsinsert','GoodsController@goodsInsertView');
Route::post('goodsinsert','GoodsController@goodsInsert');
Route::post('goodsdetail/{idx}/comment','GoodsController@Comment');

Route::get('useredit','SettingController@editView');
