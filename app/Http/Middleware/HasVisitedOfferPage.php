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
        if(session()->has('has_visit_offer_page') && session()->get('has_visit_offer_page') == 'yes')
            return $next($request);
        session()->flash('error' , 'Complete Tasks First !');
        return back();
    }
}
