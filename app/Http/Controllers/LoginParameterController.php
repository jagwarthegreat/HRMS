<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class LoginParameterController extends Controller
{
    public function index()
    {
        // abort_if(
        //     Gate::denies('position_access'),
        //     Response::HTTP_FORBIDDEN,
        //     '403 Forbidden'
        // );

        $canCreate = Gate::allows('position_create');

        return Inertia::render('LoginParam/Index', compact('canCreate'));
    }

    public static function getDistance($gpsLat, $gpsLong, $defaultRadius = 10)
    {
        $defaultLong = 10.648516;
        $defaultLat = 122.965087;

        $isInsideRadius = 0;
        $theta = $defaultLong - $gpsLong;
        $distance = sin(deg2rad($defaultLat)) * sin(deg2rad($gpsLat)) +  cos(deg2rad($defaultLat)) * cos(deg2rad($gpsLat)) * cos(deg2rad($theta));

        $distance = acos($distance);
        $distance = rad2deg($distance);

        // Miles = ($distance * 60 * 1.1515)
        // Kilometers = 1.609344
        $distanceInKm = $distance * 60 * 1.1515 * 1.609344;
        if ($distanceInKm < $defaultRadius) {
            // inside the defaultRadius
            $isInsideRadius = 1;
        }

        return $isInsideRadius;
    }
}
