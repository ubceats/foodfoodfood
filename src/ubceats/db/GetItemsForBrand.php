<?php

namespace ubceats\db;

/**
 * Class GetItemsForBrand
 * @package ubceats\db
 * @checklist Nested aggregation query
 */
class GetItemsForBrand extends DbQuery
{
    private $name;
    private $order;

    /**
     * GetItemsForBrand constructor.
     * @param $name
     * @param $order
     */
    public function __construct($name, $order = "DESC")
    {
        $this->name = $name;
        $this->order = $order;
    }


    public function runQuery()
    {
        $date = date('w');
        if ($date == 0) {
            $date = 7;
        }

        $q = $this->query("SELECT name, f.brandName, price, ROUND(total) AS total FROM food_items f
LEFT JOIN
  (SELECT (((AVG(isUpvote)*100)+100)/2) AS total, v.brandName, foodItemName FROM votes v 
  GROUP BY brandName, foodItemName) AS T ON T.brandName =  f.brandName AND T.foodItemName = f.name
WHERE f.brandName = '{$this->getDb()->escape_string($this->name)}' ORDER BY total {$this->getDb()->escape_string($this->order)};");


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