<?php

Route::group(['prefix' => 'admin','module' => 'User', 'middleware' => ['web','auth','admin'], 'namespace' => 'App\Modules\User\Controllers\Backend'], function() {

    /*
     * User Management Routes
     */
    Route::get('users/approve/{userId}','UserController@approveUser')->name('admin.users.approve');
    Route::get('users/activate/{userId}','UserController@activateUser')->name('admin.users.activate');
    Route::get('users/deactivate/{userId}','UserController@deactivateUser')->name('admin.users.deactivate');
    Route::resource('users', 'UserController', ['names' => [
        'index'     => 'admin.users.index',
        'create'    => 'admin.users.create',
        'edit'      => 'admin.users.edit',
        'store'     => 'admin.users.store',
        'update'    => 'admin.users.update',
        'show'      => 'admin.users.show'
    ]]);

    Route::post('profile/change-password', 'ProfileController@changePassword')->name('admin.profile.change-password');
    Route::resource('profile', 'ProfileController', ['names' => [
        'index'     => 'admin.profile.index',
        'create'    => 'admin.profile.create',
        'edit'      => 'admin.profile.edit',
        'store'     => 'admin.profile.store',
        'update'    => 'admin.profile.update',
        'show'      => 'admin.profile.show'
    ]]);
});

Route::group(['module' => 'User', 'middleware' => ['web'], 'namespace' => 'App\Modules\User\Controllers\Frontend'], function() {
    Route::get('forget-password','ForgetPasswordController@forgetPassword');
    Route::post('forget-password-request','ForgetPasswordController@forgetPasswordRequest');
    Route::get('reset-password/{userHash}','ForgetPasswordController@resetPassword');
    Route::post('reset-password-request/{userId}','ForgetPasswordController@resetPasswordRequest');

    Route::post('signup','CustomerController@signup');
});
