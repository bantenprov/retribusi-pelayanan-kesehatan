<?php

Route::group(['prefix' => 'pelayanan_kesehatan','middleware' => ['web']], function() {    

    Route::get('', 'Bantenprov\PelayananKesehatan\Http\Controllers\PelayananKesehatanController@index')->name('pelayanan_kesehatan.index');
    Route::get('create-root', 'Bantenprov\PelayananKesehatan\Http\Controllers\PelayananKesehatanController@createRoot')->name('pelayanan_kesehatan.create.root');
    
    Route::post('create-root', 'Bantenprov\PelayananKesehatan\Http\Controllers\PelayananKesehatanController@storeRoot')->name('pelayanan_kesehatan.store.root');
    Route::post('create-child', 'Bantenprov\PelayananKesehatan\Http\Controllers\PelayananKesehatanController@storeChild')->name('pelayanan_kesehatan.store.child');
    Route::get('add-child/{id}', 'Bantenprov\PelayananKesehatan\Http\Controllers\PelayananKesehatanController@addChild')->name('pelayanan_kesehatan.add.child');
    Route::get('{id}/edit', 'Bantenprov\PelayananKesehatan\Http\Controllers\PelayananKesehatanController@edit')->name('pelayanan_kesehatan.edit');
    Route::put('{id}/update', 'Bantenprov\PelayananKesehatan\Http\Controllers\PelayananKesehatanController@update')->name('pelayanan_kesehatan.update');
});
