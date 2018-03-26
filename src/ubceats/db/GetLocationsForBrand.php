<?php

namespace ubceats\db;

/**
 * Class GetLocationsForBrand
 * @package ubceats\db
 * @checklist Join query
 */
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
        $date = date('w');
        if ($date == 0) {
            $date = 7;
        }

        $q = $this->query("SELECT l.address, l.latitude, l.longitude, l.name, time2.opensAt, time2.closesAt
FROM locations l
INNER JOIN occupies o ON l.name = o.locationName AND l.address = o.locationAddress AND o.brandName = '{$this->getDb()->escape_string($this->name)}'
LEFT JOIN opening_times time2 ON time2.day = {$date} AND o.brandName = time2.brandName AND o.locationName = time2.locationName AND o.locationAddress = time2.locationAddress;");
        if (is_bool($q)) {
            return mysqli_error($this->getDb());
        }


        $arr = [];
        while ($onerow = $q->fetch_assoc()) {
            array_push($arr, $onerow);
        }
        return $arr;
    }


}