<?php

namespace ubceats\db;


class GetLocationsForBrand extends DbQuery
{
    private $name;

    /**
     * GetLocationsForBrand constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }


    public function runQuery()
    {
        $q = $this->query("SELECT l.address, l.latitude, l.longitude, l.name FROM locations l, occupies o WHERE l.name = o.locationName AND l.address = o.locationAddress AND o.brandName ='" . $this->name . "';");
        if(is_bool($q)){
            return $q;
        }


        $arr = [];
        while ($onerow = $q->fetch_assoc()) {
            array_push($arr, $onerow);
        }
        return $arr;
    }


}