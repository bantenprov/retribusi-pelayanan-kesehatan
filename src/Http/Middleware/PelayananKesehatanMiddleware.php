<?php namespace Bantenprov\PelayananKesehatan\Http\Middleware;

use Closure;

/**
 * The TarifPelayananKesehatanMiddleware class.
 *
 * @package Bantenprov\PelayananKesehatan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class TarifPelayananKesehatanMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
