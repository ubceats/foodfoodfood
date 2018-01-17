<?php
namespace ubceats\db\Sorts;


class RatingSort
{
    // Comparison function
    static function cmp($venue1, $venue2) {
        if ($venue1["rating"] == $venue2["rating"]) {
            return 0;
        }
        return ($venue1["rating"] > $venue2["rating"]) ? -1 : 1;
    }

    static function sort(array &$venues): array {
        uasort($venues, 'self::cmp');
        return $venues;
    }
}