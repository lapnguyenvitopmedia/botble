<?php

use Botble\Banners\Http\Controllers\BannersController;

Route::group(['namespace' => 'Botble\Banners\Http\Controllers', 'middleware' => ['web', 'core']], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'banners', 'as' => 'banners.'], function () {
            Route::resource('', 'BannersController')->parameters(['' => 'banners']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'BannersController@deletes',
                'permission' => 'banners.destroy',
            ]);
        });
    });

});

