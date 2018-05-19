<?php

Route::group(['prefix' => 'pelayanan-kesehatan', 'middleware' => ['web','auth']], function() {
    Route::resource('tarif', 'Bantenprov\PelayananKesehatan\Http\Controllers\TarifController');
    Route::resource('transaksi', 'Bantenprov\PelayananKesehatan\Http\Controllers\TransaksiController');
    Route::resource('item', 'Bantenprov\PelayananKesehatan\Http\Controllers\ItemController');
});
