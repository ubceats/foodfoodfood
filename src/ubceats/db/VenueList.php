<?php

namespace ubceats\db;


class VenueList extends DbQuery {
    public function runQuery()
    {
        $arr = [];
        $query = $this->query("SELECT * FROM venues");

        while ($onerow = $query->fetch_assoc()) {
            array_push($arr, $onerow['name']);
        }
        return $arr;
    }
}