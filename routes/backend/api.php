<?php
Route::prefix('products')->namespace('Products')->group(function () {
    Route::get('', 'ProductController@allProducts')->name('backend.api.product.index');
    Route::post('', 'ProductController@store')->name('backend.api.product.store');
    Route::put('{productID}', 'ProductController@update')->name('backend.api.product.update');
    Route::delete('{productID}', 'ProductController@destroy')->name('backend.api.product.delete');
    Route::put('{productID}/active', 'ProductController@toggleActive')->name('backend.api.product.active.toggle');
});

Route::prefix('buckets')->namespace('Buckets')->group(function () {
    Route::get('colors', 'BucketController@bucketColors')->name('backend.api.bucket.color');
    Route::get('', 'BucketController@indexApi')->name('backend.api.bucket.index');
    Route::post('store', 'BucketController@store')->name('backend.api.bucket.store');
    Route::get('{bucketID}', 'BucketController@findBucket')->name('backend.api.bucket.show');
    Route::put('{bucketID}', 'BucketController@update')->name('backend.api.bucket.update');
    Route::delete('{bucketID}', 'BucketController@destroy')->name('backend.api.bucket.delete');
});

Route::prefix('lender/buckets')->namespace('Buckets')->group(function () {
    Route::get('', 'LenderBucketController@indexApi')->name('backend.api.lender.bucket.index');
    Route::post('{bucketID}/store', 'LenderBucketController@store')->name('backend.api.lender.bucket.store');
    Route::get('{bucketID}', 'LenderBucketController@findBucket')->name('backend.api.lender.bucket.show');
    Route::put('{bucketID}', 'LenderBucketController@update')->name('backend.api.lender.bucket.update');
    Route::delete('{bucketID}', 'LenderBucketController@destroy')->name('backend.api.lender.bucket.delete');
});

Route::namespace('Users')->group(function () {
    Route::get('profile', 'UserController@profileJson')->name('backend.api.profile.show');
    Route::put('profile', 'UserController@profileUpdate')->name('backend.api.profile.update');
    Route::put('profile/password', 'UserController@passwordUpdate')->name('backend.api.password.update');
    Route::get('lender/profile', 'LenderController@profileJson')->name('backend.api.lender.profile.show');
    Route::put('lender/profile', 'LenderController@profileUpdate')->name('backend.api.lender.profile.update');

    Route::prefix('lenders')->group(function () {
        Route::get('', 'LenderController@indexApi')->name('backend.api.lender.index');
        Route::post('', 'LenderController@store')->name('backend.api.lender.store');
        Route::put('{lenderID}', 'LenderController@update')->name('backend.api.lender.update');
        Route::get('{lenderID}', 'LenderController@findApi')->name('backend.api.lender.show');
        Route::delete('{lenderID}', 'LenderController@destroy')->name('backend.api.lender.delete');
        Route::put('{lenderID}/active', 'LenderController@toggleIsActive')->name('backend.api.lender.toggle.status');
    });

    Route::prefix('customers')->group(function () {
        Route::get('', 'CustomerController@indexApi')->name('backend.api.customer.index');
        Route::get('{customerID}', 'CustomerController@findApi')->name('backend.api.customer.show');
        Route::delete('{customerID}', 'CustomerController@destroy')->name('backend.api.customer.delete');
        Route::put('{customerID}/active', 'CustomerController@toggleIsActive')->name('backend.api.customer.toggle.status');
    });

    Route::prefix('admins')->group(function () {
        Route::get('', 'AdminUserController@indexApi')->name('backend.api.admin.index');
        Route::post('', 'AdminUserController@store')->name('backend.api.admin.store');
        Route::put('{adminID}', 'AdminUserController@update')->name('backend.api.admin.update');
        Route::put('{adminID}/toggle', 'AdminUserController@toggleIsActive')->name('backend.api.admin.toggle');
        Route::delete('{adminID}', 'AdminUserController@destroy')->name('backend.api.admin.delete');
    });
});

Route::prefix('applications')->namespace('Applications')->group(function () {
    Route::get('', 'ApplicationController@indexApi')->name('backend.api.application.index');
    Route::get('{applicationID}', 'ApplicationController@findApi')->name('backend.api.application.show');
    Route::get('{applicationID}/call_credit', 'CallCreditController@userInfo')->name('backend.api.application.call_credit.show');
    Route::get('{applicationID}/address', 'ApplicationController@userAddress')->name('backend.api.application.address');
    Route::get('{applicationID}/banks', 'ApplicationController@userBanks')->name('backend.api.application.banks');
    Route::get('{applicationID}/employments', 'ApplicationController@userEmployments')->name('backend.api.application.employments');
});

Route::namespace('Config')->prefix('config')->group(function () {
    Route::get('setting', 'SettingsController@indexApi')->name('backend.api.setting.index');
    Route::put('setting', 'SettingsController@update')->name('backend.api.setting.update');

    Route::get('loan-purposes', 'LoanPurposeController@indexApi')->name('backend.api.loan.purpose.index');
    Route::post('loan-purposes', 'LoanPurposeController@store')->name('backend.api.loan.purpose.store');
    Route::put('loan-purposes/{loanPurposeID}', 'LoanPurposeController@update')->name('backend.api.loan.purpose.update');
    Route::delete('loan-purposes/{loanPurposeID}', 'LoanPurposeController@destroy')->name('backend.api.loan.purpose.delete');
});

Route::namespace('CallCredit')->prefix('call-credit')->group(function () {
    Route::get('api-fields', 'ApiFieldController@index')->name('backend.api.call_credit.api_field.index');
});
