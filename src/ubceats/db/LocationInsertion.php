<?php

namespace ubceats\db;

class LocationInsertion extends DbQuery
{
    private $name;
    private $address;
    private $latitude;
    private $longitude;

    public function __construct(string $name, string $address, float $latitude, float $longitude)
    {
        $this->name = $name;
        $this->address = $address;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * @return \mysqli_result|boolean For successful SELECT, SHOW, DESCRIBE or
     * EXPLAIN queries <b>mysqli_query</b> will return
     * a <b>mysqli_result</b> object. For other successful queries <b>mysqli_query</b> will
     * return true and false on failure.
     */
    public function pushLocationToDB()
    {
        $result = $this->query("INSERT INTO locations (name, address, latitude, longitude) VALUES ('" . $this->name . "', '" . $this->address . "', '" . $this->latitude . "', '" . $this->longitude . "');");
        return $result;
    }

    public function runQuery()
    {
        // TODO
    }

}