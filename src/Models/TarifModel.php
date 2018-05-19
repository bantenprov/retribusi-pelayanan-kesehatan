<?php

namespace Bantenprov\PelayananKesehatan\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TarifModel extends Model
{

    protected $table = 'tarifs';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'uuid',
        'uraian',
        'tarif',
        'jasa_pelayanan',
        'jasa_sarana',
        'satuan',
        'master_tarif_id',
        'user_id',
        'user_update',
    ];

    public function getMasterTarif()
    {
        return $this->hasOne('Bantenprov\MasterTarif\Models\MasterTarifModel', 'id');
    }

    public function getUserCreated()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function getUserUpdated()
    {
        return $this->belongsTo('App\User','user_update');
    }

    public function getItem()
    {
        return $this->hasMany('Item', 'id');
    }

}
