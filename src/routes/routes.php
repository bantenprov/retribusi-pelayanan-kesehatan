<?php

Route::group(['prefix' => 'pelanan_kesehatan','middleware' => ['web']], function() {    

    Route::get('', 'Bantenprov\PelayananKesehatan\Http\Controllers\PelayananKesehatanController@index')->name('pelanan_kesehatan.index');
    Route::get('create-root', 'Bantenprov\PelayananKesehatan\Http\Controllers\PelayananKesehatanController@createRoot')->name('pelanan_kesehatan.create.root');
    
    Route::post('create-root', 'Bantenprov\PelayananKesehatan\Http\Controllers\PelayananKesehatanController@storeRoot')->name('pelanan_kesehatan.store.root');
    Route::post('create-child', 'Bantenprov\PelayananKesehatan\Http\Controllers\PelayananKesehatanController@storeChild')->name('pelanan_kesehatan.store.child');
    Route::get('add-child/{id}', 'Bantenprov\PelayananKesehatan\Http\Controllers\PelayananKesehatanController@addChild')->name('pelanan_kesehatan.add.child');
    Route::get('{id}/edit', 'Bantenprov\PelayananKesehatan\Http\Controllers\PelayananKesehatanController@edit')->name('pelanan_kesehatan.edit');
    Route::put('{id}/update', 'Bantenprov\PelayananKesehatan\Http\Controllers\PelayananKesehatanController@update')->name('pelanan_kesehatan.update');
});
