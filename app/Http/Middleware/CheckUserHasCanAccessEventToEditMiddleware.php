<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Event;

class CheckUserHasCanAccessEventToEditMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        //dd(__CLASS__);

        /**
         * pegar o id do evento que está na url
         */
        $event = Event::find($request->route()->parameter('event'));

        if(!auth()->user()->events->contains($event))
        {
            abort(403);
        }

        return $next($request);
    }
}
