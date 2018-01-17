<?php
/**
 * Created by PhpStorm.
 * User: iandelrio
 * Date: 2018-01-13
 * Time: 8:02 PM
 */

namespace ubceats\db\Sorts;


class PriceSort
{
    // Comparison function
    static function cmp($venue1, $venue2) {
        if ($venue1["price"] == $venue2["price"]) {
            return 0;
        }
        return ($venue1["price"] < $venue2["price"]) ? -1 : 1;
    }


    static function sort(array &$venues): array {
        uasort($venues, 'self::cmp');
        return $venues;
    }

}