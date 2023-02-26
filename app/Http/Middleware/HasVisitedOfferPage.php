<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasVisitedOfferPage
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
        if(session()->has('visited') && session()->get('visited') == 1)
            return $next($request);
        session()->flash('error' , 'Complete Tasks First !');
        return redirect(route('home'));
    }
}
