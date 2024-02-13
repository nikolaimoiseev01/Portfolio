<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use Torann\GeoIP\GeoIP;

class SetLocale
{
//    protected $geoip;

    public function handle($request, Closure $next)
    {
        if($request->ip() == '127.0.0.1') {
            $country = 'en';
        } else {
            $country = Location::get($request->ip())->countryCode;
        }


        $locale = (strtolower($country) == 'ru') ? 'ru' : 'ru';

        app()->setLocale($locale);

        return $next($request);
    }
}
