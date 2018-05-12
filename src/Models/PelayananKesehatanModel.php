<?php 

namespace Bantenprov\PelayananKesehatan\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use Emadadly\LaravelUuid\Uuids;

/**
 * The PelayananKesehatanModel class.
 *
 * @package Bantenprov\PelayananKesehatan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class PelayananKesehatanModel extends Model
{
    use NodeTrait;
    use Uuids;
    

    protected $table = "pelanan_kesehatan";
    protected $fillable = [
            'kunker',
            'name',
            'kunker_sinjab',
            'kunker_simral',
            'levelunker',
            'njab',
            'npej'
    ];
    protected $hidden = [];
    public $incrementing = false;
}

