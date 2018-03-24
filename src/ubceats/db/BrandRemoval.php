<?php

namespace ubceats\db;

class BrandRemoval extends DbQuery
{
    private $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    /**
     * @return \mysqli_result|boolean For successful SELECT, SHOW, DESCRIBE or
     * EXPLAIN queries <b>mysqli_query</b> will return
     * a <b>mysqli_result</b> object. For other successful queries <b>mysqli_query</b> will
     * return true and false on failure.
     */
    public function removeBrandFromDB() {
        $result = $this->query("DELETE FROM brand WHERE name = '".$this->name."';");
        return $result;
    }

    public function runQuery() {
        // FUCK THIS SHIT!!!
    }

}