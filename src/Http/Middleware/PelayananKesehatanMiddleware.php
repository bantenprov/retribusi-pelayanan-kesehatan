<?php 

namespace Bantenprov\PelayananKesehatan\Http\Middleware;

use Closure;

/**
 * The PelayananKesehatanMiddleware class.
 *
 * @package Bantenprov\PelayananKesehatan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class PelayananKesehatanMiddleware
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
