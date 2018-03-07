<?php

namespace App\Http\Middleware;

use Closure;

class CheckLanguage
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
        $languages = ['en', 'de', 'fr'];
        if(in_array($request->lang, $languages) !== true) {
            abort(400, "Language is not correnct!");
        }

        return $next($request);
    }
}
