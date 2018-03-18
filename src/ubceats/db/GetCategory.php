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
        $date = date('w');
        if($date == 0){
            $date = 7;
        }

        $q = $this->query("");
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