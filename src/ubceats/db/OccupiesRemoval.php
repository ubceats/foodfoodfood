<?php

namespace ubceats\db;

/**
 * Class OccupiesRemoval
 * @package ubceats\db
 * @checklist Deletion (no cascade)
 */
class OccupiesRemoval extends DbQuery
{
    private $brandName;
    private $locationName;
    private $locationAddress;

    public function __construct(string $brandName, string $locationName, string $locationAddress) {
        $this->brandName = $brandName;
        $this->locationName = $locationName;
        $this->locationAddress = $locationAddress;
    }

    /**
     * @return \mysqli_result|boolean For successful SELECT, SHOW, DESCRIBE or
     * EXPLAIN queries <b>mysqli_query</b> will return
     * a <b>mysqli_result</b> object. For other successful queries <b>mysqli_query</b> will
     * return true and false on failure.
     */
    public function removeOccupiesFromDB() {
        $result = $this->query("DELETE FROM occupies WHERE brandName = '{$this->getDb()->escape_string($this->brandName)}' AND locationName = '{$this->getDb()->escape_string($this->locationName)}' AND locationAddress = '{$this->getDb()->escape_string($this->locationAddress)}';");
        return $result;
    }

    public function runQuery() {
        // FUCK THIS SHIT!!!
    }

}