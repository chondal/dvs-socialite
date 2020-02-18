<?php

use Illuminate\Support\Facades\Route;
Route::group(['namespace' => 'Chondal\DvsSocialite\Http\Controllers', 'middleware' => 'web'], function () {
    Route::get('/socialLogin/{socialNetwork}', 'SocialLoginController@redirect')
        ->name('socialLogin.index');
    Route::get('/socialLogin/{socialNetwork}/callback', 'SocialLoginController@callback');
});
