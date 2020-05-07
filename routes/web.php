<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::prefix("/lianxi")->group(function(){
	Route::get("create","LianxiController@create");//添加页面
	Route::post("store","LianxiController@store");//执行添加页面
	Route::get("/","LianxiController@index");// 展示
	Route::get("destroy/{id}","LianxiController@destroy");//删除
	Route::get("edit/{id}","LianxiController@edit");//修改
	Route::post("update/{id}","LianxiController@update"); //执行修改
});
// Route::prefix("/login")->group(function(){

// });
	Route::view('/Login','yan.Login');    //
		Route::post("/Yanzheng/denglu","Yanzheng@Login");
Route::prefix("/Yanzheng")->middleware('isLogin')->group(function(){
	Route::get("create","Yanzheng@create");//添加页面
	Route::post("store","Yanzheng@store");//执行添加页面
	Route::get("/","Yanzheng@index");// 展示
	Route::get("destroy/{id}","Yanzheng@destroy");//删除
	Route::get("edit/{id}","Yanzheng@edit");//修改
	Route::post("update/{id}","Yanzheng@update"); //执行修改
 //执行修改
});

