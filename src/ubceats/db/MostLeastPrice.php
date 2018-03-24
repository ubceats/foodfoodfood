<?php
namespace ubceats\db;

/**
 * Class CostQuery
 * @package ubceats\db
 * @checklist Nested aggregation query
 */
class MostLeastPrice extends DbQuery{

    public function runQuery(){
        $max = $this->query("SELECT brandName, ROUND(price, 2) AS price FROM
  (SELECT AVG(fi.price) AS price, brandName FROM food_items fi
    GROUP BY brandName
    ORDER BY price DESC LIMIT 1) AS T;");

        $max = $max->fetch_assoc();

        $min = $this->query("SELECT brandName, ROUND(price, 2) AS price FROM
  (SELECT AVG(fi.price) AS price, brandName FROM food_items fi
    GROUP BY brandName
    ORDER BY price ASC LIMIT 1) AS T;");

        $min = $min->fetch_assoc();



        return [
            "max" => $max,
            "min" => $min
        ];

    }

}