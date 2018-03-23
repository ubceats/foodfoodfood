<?php
namespace ubceats\db;

/**
 * Class CostQuery
 * @package ubceats\db
 * @checklist Aggregation query
 */
class GetReviewsForItem extends DbQuery{

    private $itemName;
    private $brandName;

    /**
     * CostQuery constructor.
     * @param $itemName
     * @param $brandName
     */
    public function __construct($itemName, $brandName){
        $this->itemName = $itemName;
        $this->brandName = $brandName;
    }


    public function runQuery(){
        $avg = $this->query("SELECT (((AVG(isUpvote)*100)+100)/2) AS avg FROM votes WHERE brandName = '{$this->getDb()->escape_string($this->brandName)}' AND foodItemName = '{$this->getDb()->escape_string($this->itemName)}'");

        $avg = $avg->fetch_assoc();

        $reviews = $this->query("SELECT isUpvote, review FROM votes WHERE brandName = '{$this->getDb()->escape_string($this->brandName)}' AND foodItemName = '{$this->getDb()->escape_string($this->itemName)}'");

        $arr = [];
        while ($onerow = $reviews->fetch_assoc()) {
            array_push($arr, $onerow);
        }

        return [
            "avg" => $avg["avg"],
            "reviews" => $arr
        ];

    }

}