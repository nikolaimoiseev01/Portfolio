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
//        $country = $this->geoip->getLocation()->country;
//
//        // Добавьте здесь логику для определения локали на основе страны
//        $locale = ($country == 'RU') ? 'ru' : 'en';
//
//        app()->setLocale($locale);
//
        dd($request->ip());
        dd(Location::get());
        return $next($request);
    }
}
