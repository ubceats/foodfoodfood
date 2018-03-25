<?php

namespace ubceats\db;

/**
 * Class LocationRemoval
 * @package ubceats\db
 * @checklist Deletion (no cascade)
 */
class LocationRemoval extends DbQuery
{
    private $name;
    private $address;

    public function __construct(string $name, string $address) {
        $this->name = $name;
        $this->address = $address;
    }

    /**
     * @return \mysqli_result|boolean For successful SELECT, SHOW, DESCRIBE or
     * EXPLAIN queries <b>mysqli_query</b> will return
     * a <b>mysqli_result</b> object. For other successful queries <b>mysqli_query</b> will
     * return true and false on failure.
     */
    public function removeLocationFromDB() {
        $result = $this->query("DELETE FROM locations WHERE name = '".$this->name."' AND address = '".$this->address."';");
        return $result;
    }

    public function runQuery() {
        // FUCK THIS SHIT!!!
    }

}