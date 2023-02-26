<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ClearVpn
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
        $s = file_get_contents(public_path('black_list_ips.txt'));
        $vpns = explode("\n" , $s);
        $ip = $request->ip();
        if(in_array($ip , $vpns))
        {
            return  abort(403 , 'VPN NOT ALLOWED');
        }else{
            return $next($request);
        }
    }
}
