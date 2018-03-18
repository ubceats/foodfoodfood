<?php

namespace ubceats\db;

/**
 * Class GetItemsForBrand
 * @package ubceats\db
 * @checklist Join query
 */
class GetItemsForBrand extends DbQuery
{
    private $name;

    /**
     * GetItemsForBrand constructor.
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

        $q = $this->query("SELECT name, f.brandName, price, total FROM food_items f
LEFT JOIN
  (SELECT SUM(v.isUpvote) AS total, v.brandName, foodItemName FROM votes v GROUP BY brandName, foodItemName) AS T ON T.brandName =  f.brandName AND T.foodItemName = f.name
WHERE f.brandName = '{$this->getDb()->escape_string($this->name)}' ORDER BY total DESC;");



        if(is_bool($q)){
            return mysqli_error($this->getDb());

        }


        $arr = [];
        while ($onerow = $q->fetch_assoc()) {
            array_push($arr, $onerow);
        }
        return $arr;
    }


}