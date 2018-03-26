<?php

namespace ubceats\db;


class GetCategory extends DbQuery
{
    private $name;

    /**
     * GetCategory constructor.
     */
    public function __construct()
    {
    }


    public function runQuery()
    {

        $q = $this->query("SELECT * FROM categories;");


        $arr = [];
        while ($onerow = $q->fetch_assoc()) {
            array_push($arr, $onerow);
        }
        return $arr;
    }


}