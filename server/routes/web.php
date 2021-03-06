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


// @で実行したい関数の指定をする。
// http://localhost/comments/{time_zone}/{message}のURLにアクセスがあった場合、CommentsControlleのmessages関数を実行
// {time_zone}には morning / afternoon / evening / night / freeword /random のいずれかが入る。
// {message}には 自由なメッセージが入る。（'がんばって' など）
// 例：http://localhost/comments/freeword/がんばって
Route::get('comments/{time_zone}', 'CommentsController@messages');
Route::get('comments/{time_zone}/{message}', 'CommentsController@freeMessages');