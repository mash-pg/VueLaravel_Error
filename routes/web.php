<?php
Route::get('/', function () {
    return view('user/welcome');
});

// ユーザー
Route::namespace('User')->name('user.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'mypage' => true,
        'confirm'  => false,
        'reset'    => false
    ]);

    // ログイン認証後
    Route::middleware('auth:user')->group(function () {
        // Homeページ
        Route::resource('home', 'HomeController', ['only' => 'index']);
    });
});

Route::get('shop/register','RegisterController@showRegistrationForm');
// 管理者
Route::namespace('Shop')->prefix('shop')->name('shop.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'confirm'  => false,
        'reset'    => false
    ]);
    // ログイン認証後
    Route::middleware('auth:shop')->group(function () {
        // TOPページ
        // Route::resource('home', 'HomeController', ['only' => 'index']);
        Route::resource('home', 'HomeController')->only(['index', 'store', 'update', 'destroy']);
    });
});

