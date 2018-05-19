<?php

namespace Bantenprov\PelayananKesehatan\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemModel extends Model
{

    protected $table = 'items';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'uuid',
        'keterangan',
        'tarif',
        'jumlah',
        'subtotal',
        'transaksi_id',
        'tarif_id',
        'rekening_id',
        'transaksi_uuid',
        'tarif_uuid',
        'rekening_uuid',
    ];

    public function getTransaksi()
    {
        return $this->hasOne('Bantenprov\PelayananKesehatan\Models\TransaksiPelayananKesehatanModel', 'transaksi_id');
    }
    /*
    public function getRekening()
    {
        return $this->belongsTo('Rekening', 'rekening_id');
    }
    */
    public function getTarif()
    {
        return $this->hasOne('Bantenprov\PelayananKesehatan\Models\TarifPelayananKesehatanModel', 'tarif_id');
    }

}
