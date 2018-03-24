<?php

namespace ubceats\db;


class GetCategory extends DbQuery
{
    private $name;

    /**
     * GetCategory constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
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