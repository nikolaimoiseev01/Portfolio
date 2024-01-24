<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use Torann\GeoIP\GeoIP;

class SetLocale
{
//    protected $geoip;

    public function __construct(Request $request)
    {
//        dd($request->ip());
//        dd(Location::get());

//        if ($position = Location::get()) {
//            // Successfully retrieved position.
//            echo $position->countryName;
//            dd(Location::get());
//        } else {
//            dd(Location::get());
//        }

//        $geoip = new IpStack(config('services.ipstack.key'));
//        $response = $geoip->get(request()->ip());
//        dd($response);
//        dd(geoip()->getLocation($_SERVER['REMOTE_ADDR']));
////        $this->geoip = $geoip;
    }

    public function handle($request, Closure $next)
    {
        if($request->ip() == '127.0.0.1') {
            $country = 'en';
        } else {
            $country = Location::get($request->ip())->countryCode;
        }

        dd($country);
        
        $locale = (strtolower($country) == 'ru') ? 'ru' : 'en';

        app()->setLocale($locale);

        return $next($request);
    }
}
