<?php


Route::group(['module' => 'Frontend', 'middleware' => ['web'], 'namespace' => 'App\Modules\Frontend\Controllers'], function() {

    Route::get('/', 'HomeController@index');

    Route::get('/plans', 'PlanController@index')->name('plans.index');
    Route::get('/registration', 'RegistrationController@index')->name('registration.index');
    Route::post('/registration/store', 'RegistrationController@store')->name('registration.store');
    Route::get('/contact', 'ContactController@index')->name('contact.index');
    Route::post('/contact/store', 'ContactController@store')->name('contact.store');
});
