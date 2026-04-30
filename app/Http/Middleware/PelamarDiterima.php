<?php

namespace App\Http\Middleware;

use App\Models\Pelamar;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PelamarDiterima
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $pelamar = Pelamar::find(session('pelamar_id'));

        if (! $pelamar || $pelamar->status_pelamar !== 'diterima') {
            return redirect()->route('pelamar.dashboard')
                ->with('error', 'Hanya pelamar berstatus "diterima" yang dapat mengakses kuis.');
        }
        return $next($request);
    }
}
