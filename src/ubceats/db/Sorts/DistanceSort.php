<?php
/**
 * Created by PhpStorm.
 * User: iandelrio
 * Date: 2018-01-13
 * Time: 8:02 PM
 */

namespace ubceats\db\Sorts;


use ubceats\util\LatLon;

class DistanceSort
{

    // Comparison function
    static function cmp($venue1, $venue2) {
        if ($venue1["distanceTo"] == $venue2["distanceTo"]) {
            return 0;
        }
        return ($venue1["distanceTo"] < $venue2["distanceTo"]) ? -1 : 1;
    }


    static function sort(array &$venues, LatLon $user): array {

        foreach($venues as &$venue){
            self::assignDistance($venue, $user);
        }

        uasort($venues, 'self::cmp');
        return $venues;
    }

    // Adds distance to user to array
    static function assignDistance(array &$venue, LatLon $user) {
        $latLon = new LatLon();
        $latLon->lat = $venue["lat"];
        $latLon->lon = $venue["lon"];
        $distance = $latLon->distanceTo($user);
        $venue["distanceTo"] = $distance;
    }
}