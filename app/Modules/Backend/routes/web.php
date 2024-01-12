<?php

Route::group(['prefix' => 'admin','module' => 'Backend', 'middleware' => ['web','auth','admin'], 'namespace' => 'App\Modules\Backend\Controllers'], function() {

    Route::get('dashboard','DashboardController@index')->name('admin.dashboard.index');

    Route::resource('appearance', 'AppearanceController', ['names' => [
        'index'     => 'admin.appearance.index',
        'store'     => 'admin.appearance.store'
    ]]);

    Route::get('contact-us/{id}/delete','ContactUsController@delete');
    Route::resource('contact-us', 'ContactUsController', ['names' => [
        'index' => 'admin.contact-us.index',
    ]]);

    Route::get('sliders/{id}/delete','SliderController@delete');
    Route::resource('sliders', 'SliderController', ['names' => [
        'index' => 'admin.sliders.index',
        'create' => 'admin.sliders.create',
        'store' => 'admin.sliders.store',
        'edit' => 'admin.sliders.edit',
        'update' => 'admin.sliders.update'
    ]]);

    Route::get('plans/{id}/delete','PlanController@delete');
    Route::resource('plans', 'PlanController', ['names' => [
        'index' => 'admin.plans.index',
        'create' => 'admin.plans.create',
        'store' => 'admin.plans.store',
        'edit' => 'admin.plans.edit',
        'update' => 'admin.plans.update'
    ]]);

    Route::get('gallery/{id}/delete','GalleryController@delete');
    Route::resource('gallery', 'GalleryController', ['names' => [
        'index' => 'admin.gallery.index',
        'create' => 'admin.gallery.create',
        'store' => 'admin.gallery.store',
        'edit' => 'admin.gallery.edit',
        'update' => 'admin.gallery.update'
    ]]);





});

