<?php
namespace ubceats\util;


class LatLon
{
    public $lat;
    public $lon;



    /**
     * @return int
     */
    public function distanceTo(LatLon $latLon): float {
        $R = 6378.137; // radius of the Earth
        $lat1 = $this->radsToDegs($this->lat); //convert radians to degrees
        $lat2 = $this->radsToDegs($latLon->lat);
        $lon1 = $this->radsToDegs($this->lon);
        $lon2 = $this->radsToDegs($latLon->lon);
        $dLat = $lat1 - $lat2; //calculate difference
        $dLon = $lon1 - $lon2;
        $a = pow(sin($dLat/2),2)+cos($lat1)*cos($lat2)*pow(sin($dLon/2),2); //haversine
        $b = 2*atan2(sqrt($a), sqrt(1-$a));
        $c = $R * $b;
        return $c*1000; //convert to meters

    }

    private function radsToDegs(float $rad): float {
        return ($rad * pi())/180;
    }

}