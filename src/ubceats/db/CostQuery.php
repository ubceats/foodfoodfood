<?php
namespace ubceats\db;


class CostQuery extends DbQuery{

    public function runQuery(){
        $avg = $this->query("SELECT ROUND(AVG(price),2) AS res FROM food_items;");

        $avg = $avg->fetch_assoc()['res'];

        $max = $this->query("SELECT MAX(price) AS res FROM food_items;");
        $max = $max->fetch_assoc()['res'];

        $min = $this->query("SELECT MIN(price) AS res FROM food_items;");
        $min = $min->fetch_assoc()['res'];



        $count = $this->query("SELECT COUNT(price) AS res FROM food_items;");
        $count = $count->fetch_assoc()['res'];

        $sum = $this->query("SELECT ROUND(SUM(price),2) AS res FROM food_items;");
        $sum = $sum->fetch_assoc()['res'];

        return [
            "avg" => $avg,
            "max" => $max,
            "min" => $min,
            "count" => $count,
            "sum" => $sum
        ];

    }

}