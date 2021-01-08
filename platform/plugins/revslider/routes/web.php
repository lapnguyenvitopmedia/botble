<?php

Route::group(['namespace' => 'Botble\Revslider\Http\Controllers', 'middleware' => ['web', 'core']], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'revsliders', 'as' => 'revslider.'], function () {
            Route::resource('', 'RevsliderController')->parameters(['' => 'revslider']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'RevsliderController@deletes',
                'permission' => 'revslider.destroy',
            ]);
        });

    });

});

