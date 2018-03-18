<?php

namespace ubceats\db;

/**
 * Class ListLocations
 * @package ubceats\db
 * @checklist Selection query
 */
class ListLocations extends DbQuery
{

    /**
     * @return \mysqli_result|boolean For successful SELECT, SHOW, DESCRIBE or
     * EXPLAIN queries <b>mysqli_query</b> will return
     * a <b>mysqli_result</b> object.For other successful queries <b>mysqli_query</b> will
     * return true and false on failure.
     */
    public function getLocationsList() {
        $result = $this->query("SELECT name, address FROM locations;");
        return $result;
    }


    public function runQuery() {
        // FUCK THIS SHIT!!!
    }

}