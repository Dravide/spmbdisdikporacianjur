<?php

namespace App\Services;

class DistanceCalculatorService
{
    // Earth's radius in meters
    const EARTH_RADIUS = 6371000;

    public function calculateDistance($fromLat, $fromLng, $toLat, $toLng)
    {
        // Convert degrees to radians
        $fromLatRad = deg2rad((float)$fromLat);
        $fromLngRad = deg2rad((float)$fromLng);
        $toLatRad = deg2rad((float)$toLat);
        $toLngRad = deg2rad((float)$toLng);

        // Calculate differences
        $latDelta = $toLatRad - $fromLatRad;
        $lngDelta = $toLngRad - $fromLngRad;

        // Haversine formula
        $a = sin($latDelta / 2) * sin($latDelta / 2) +
            cos($fromLatRad) * cos($toLatRad) *
            sin($lngDelta / 2) * sin($lngDelta / 2);
            
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        
        // Calculate distance in meters
        $meters = self::EARTH_RADIUS * $c;
        
        return [
            'meters' => round($meters),
            'kilometers' => round($meters / 1000, 2)
        ];
    }
}