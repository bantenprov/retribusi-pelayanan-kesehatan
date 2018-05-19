<?php

namespace Bantenprov\PelayananKesehatan\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerRetribusi extends Model
{

    protected $table = 'customer_retribusies';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'uuid',
        'customers_id',
        'daftar_retribusi_id',
        'user_id',
        'user_update',
    ];

    public function getTransaksi()
    {
        return $this->hasMany('Bantenprov\PelayananKesehatan\Models\TransaksiModel', 'id');
    }

    // public function getDaftarRetribusi()
    // {
    //     return $this->hasOne('DaftarRetribusi', 'daftar_retribusi_id');
    // }

    // public function getCustomer()
    // {
    //     return $this->hasOne('Customer', 'customer_id');
    // }

}
