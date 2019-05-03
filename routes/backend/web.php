<?php
Route::get('/', 'HomeController@index')->name('home');
Route::get('products', 'Products\ProductController@index')->name('backend.product.index');

Route::prefix('config')->namespace('Config')->group(function () {
    Route::get('settings', 'SettingsController@index')->name('backend.settings.index');
    Route::get('loan-purpose', 'LoanPurposeController@index')->name('backend.loan.purpose.index');
});
