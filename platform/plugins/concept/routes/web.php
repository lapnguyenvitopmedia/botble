<?php

Route::group(['namespace' => 'Botble\Concept\Http\Controllers', 'middleware' => ['web', 'core']], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'concepts', 'as' => 'concept.'], function () {
            Route::resource('', 'ConceptController')->parameters(['' => 'concept']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'ConceptController@deletes',
                'permission' => 'concept.destroy',
            ]);
        });
    });

});
