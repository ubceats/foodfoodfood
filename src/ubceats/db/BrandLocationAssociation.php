<?php

namespace ubceats\db;

class BrandLocationAssociation extends DbQuery
{
    private $brandName;
    private $locationName;
    private $locationAddress;

    public function __construct(string $brandName, string $locationName, string $locationAddress)
    {
        $this->brandName = $brandName;
        $this->locationName = $locationName;
        $this->locationAddress = $locationAddress;
    }

    /**
     * @return \mysqli_result|boolean For successful SELECT, SHOW, DESCRIBE or
     * EXPLAIN queries <b>mysqli_query</b> will return
     * a <b>mysqli_result</b> object.For other successful queries <b>mysqli_query</b> will
     * return true and false on failure.
     */
    public function pushAssociationToDB()
    {
        $result = $this->query("INSERT INTO occupies (brandName, locationName, locationAddress)
                      VALUES ('" . $this->getDb()->escape_string($this->brandName) . "', '" . $this->getDb()->escape_string($this->locationName) . "', '" . $this->getDb()->escape_string($this->locationAddress) . "');");
        return $result;
    }


    public function runQuery()
    {
        // No query needed
    }


}