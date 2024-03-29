<?php

namespace App\Http\Middleware\Frontend;

use Closure;
use Session;

class ShippinIdCheck
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
        if(Session::get('shipping_id'))
        {
            return redirect('/checkout/payment');
        }
        else{
            return $next($request); 
        }
    }
}
