<?php

namespace Bantenprov\PelayananKesehatan\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiModel extends Model
{

    protected $table = 'transaksies';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'uuid',
        'nomor',
        'total',
        'grandtotal',
        'denda',
        'potongan',
        'admin_id',
        'customer_transaksi_id',
        'tarif_id',
        'admin_uuid',
        'customer_transaksi_uuid',
        'tarif_uuid',
    ];

    public function getitem()
    {
        return $this->belongsTo('Bantenprov\PelayananKesehatan\Models\ItemPelayananKesehatanModel');
    }

    /* public function getCustomer()
    {
        return $this->hasOne('CustomerRetribusi', 'customer_retribusi_id');
    } */

    /* public function getAdmin()
    {
        return $this->hasOne('Admin', 'admin_id');
    } */

}
