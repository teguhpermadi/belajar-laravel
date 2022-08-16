<?php

namespace App\Http\Middleware;

use App\Models\Tahun;
use Closure;
use Illuminate\Http\Request;

class TahunAjaran
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!session()->has('tahun_id')){
            $tahun_id = Tahun::latest()->first()->id;
            session(['tahun_id' => $tahun_id]);
        };
        return $next($request);
    }
}
