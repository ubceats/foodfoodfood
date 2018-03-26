<?php

namespace ubceats\db;


class GetFoodItems extends DbQuery
{
    private $name;

    /**
     * GetFoodItems constructor.
     * @param $name
     */
    public function __construct()
    {
    }


    public function runQuery()
    {

        $q = $this->query("SELECT * FROM food_items;");


        $arr = [];
        while ($onerow = $q->fetch_assoc()) {
            array_push($arr, $onerow);
        }
        return $arr;
    }


}