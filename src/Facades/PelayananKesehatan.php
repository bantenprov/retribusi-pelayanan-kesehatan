<?php namespace Bantenprov\PelayananKesehatan\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The PelayananKesehatan facade.
 *
 * @package Bantenprov\PelayananKesehatan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class PelayananKesehatan extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'pelayanan-kesehatan';
    }
}
