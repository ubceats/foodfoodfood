<?php

namespace ubceats\db;


class GetAllOccupies extends DbQuery
{
    private $name;

    /**
     * GetAllOccupies constructors
     */
    public function __construct()
    {}


    public function runQuery()
    {

        $q = $this->query("SELECT * FROM occupies;");


        $arr = [];
        while ($onerow = $q->fetch_assoc()) {
            array_push($arr, $onerow);
        }
        return $arr;
    }


}