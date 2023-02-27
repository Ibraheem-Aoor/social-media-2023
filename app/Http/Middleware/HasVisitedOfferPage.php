<?php

namespace App\Http\Middleware;

use App\Models\Session;
use App\Models\TempUser;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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
        $temp_user = TempUser::find($request->session()->get('database_session_id'));
        if($temp_user != null &&  $temp_user->visited && session()->has('has_visited') && session()->get('has_visited') == 1)
        {
            return $next($request);
        }
        session()->flash('error' , 'Complete Tasks First !');
        return redirect(route('home'));
    }
}
