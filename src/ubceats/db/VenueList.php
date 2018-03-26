<?php

namespace ubceats\db;

/**
 * Class VenueList
 * @package ubceats\db
 * @checklist Selection query
 */
class VenueList extends DbQuery
{
    public function runQuery()
    {
        $arr = [];
        $query = $this->query("SELECT * FROM brand ORDER BY name");

        while ($onerow = $query->fetch_assoc()) {
            array_push($arr, $onerow['name']);
        }
        return $arr;
    }
}