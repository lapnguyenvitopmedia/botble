<?php

// Custom routes
// You can delete this route group if you don't need to add your custom routes.
Route::group(['namespace' => 'Theme\Newtheme\Http\Controllers', 'middleware' => ['web', 'core']], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {

        // Add your custom route here
        // Ex: Route::get('hello', 'RippleController@getHello');

    });
});

Theme::routes();

Route::group(['namespace' => 'Theme\Newtheme\Http\Controllers', 'middleware' => ['web', 'core']], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {

        Route::get('/', 'ExampleController@getIndex')->name('public.index');
        
        Route::get('sitemap.xml', [
            'as'   => 'public.sitemap',
            'uses' => 'ExampleController@getSiteMap',
        ]);

        Route::get('{slug?}' . config('core.base.general.public_single_ending_url'), [
            'as'   => 'public.single',
            'uses' => 'ExampleController@getView',
        ]);
        
        Route::get('/abc/edf', 'ExampleController@abc')->name('public.abc');
        Route::get('/abc/getpost', 'ExampleController@getAPost')->name('public.getapost');
    });

});

Route::group([
    'middleware' => 'api',
    'prefix'     => 'api/v1',
    'namespace'  => 'Theme\Newtheme\Http\Controllers',
], function () {
    Route::get('search', 'ExampleController@getSearch')->name('public.api.search');
});

