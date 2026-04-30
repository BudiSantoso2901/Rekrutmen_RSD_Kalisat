<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PelamarAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! session()->has('pelamar_id')) {
            return redirect()->route('pelamar.login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }
        return $next($request);
    }
}
