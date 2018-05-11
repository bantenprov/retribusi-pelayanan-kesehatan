<?php

Route::group(['prefix' => 'pelayanan-kesehatan'], function() {
    Route::get('demo', 'Bantenprov\PelayananKesehatan\Http\Controllers\PelayananKesehatanController@demo');


    Route::get('', 'Bantenprov\PelayananKesehatan\Http\Controllers\PelayananKesehatanController@index');
    Route::get('create-root', 'Bantenprov\PelayananKesehatan\Http\Controllers\PelayananKesehatanController@createRoot');
    Route::get('create-child', 'Bantenprov\PelayananKesehatan\Http\Controllers\PelayananKesehatanController@createChild');
    
    Route::post('create-root', 'Bantenprov\PelayananKesehatan\Http\Controllers\PelayananKesehatanController@storeRoot')->name('storeRoot');
    Route::post('create-child', 'Bantenprov\PelayananKesehatan\Http\Controllers\PelayananKesehatanController@storeChild')->name('storeChild');
    Route::get('add-child/{id}', 'Bantenprov\PelayananKesehatan\Http\Controllers\PelayananKesehatanController@addChild')->name('addChild');
});
