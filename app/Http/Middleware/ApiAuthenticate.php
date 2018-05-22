<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Sites;

class ApiAuthenticate
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
        if(!$request->has('site_id')) {
            return response("Missing site_id param in request", 500);
        }

        // first check to make sure we have the public key set
        if(!$request->has('public_key')) {
            return response("Missing public_key param in request", 500);
        }

        // next check that the public key for the site matches.
        $siteId = (int)$request->get('site_id');

        if(!is_int($siteId)) {
            return response("site_id supplied is not an integer value", 500);
        }

        // pull the site record to make sure public key matches
        $site = Sites::find($siteId);

        // check to make sure site record is active
        if($site && !$site->active) {
            return response("Site: {$site->name} is currently not active", 500);
        }
        // check public keys
        if($site && $site->public_key != $request->get('public_key')) {
            return response("Public key passed in does not match key we stored for this site", 500);
        }

        return $next($request);
    }
}
