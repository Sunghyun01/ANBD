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

//로그인 관련
Route::view('login','login');
Route::post('login', 'Login@login');
Route::get('logout','Login@logout');
Route::view('register','register');
Route::post('register', 'Login@register');
Route::post('idchk','Login@idChk');

//하단메뉴 러유투
Route::get('home','HomeController@index')->name('home');
Route::view('category','category');
Route::view('search','search');
Route::get('message', 'MessageController@getMessage');
Route::get('setting','SettingController@index');

//상품 라우트
Route::get('goods','GoodsController@goodsList')->name('goodsList');
Route::get('goodsdetail/{idx}','GoodsController@getSingleData');
Route::get('goodsinsert','GoodsController@goodsInsertView');
Route::post('goodsinsert','GoodsController@goodsInsert');
Route::post('goodsdetail/{idx}/comment','GoodsController@Comment');

//메시지 라우트
Route::post('msg','MessageController@send');
Route::get('messagedetail/{send}','MessageController@messageDetail');

//세팅 라우트
Route::get('useredit','SettingController@editView');
