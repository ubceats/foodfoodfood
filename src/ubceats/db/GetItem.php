<?php
namespace ubceats\db;

/**
 * Class CostQuery
 * @package ubceats\db
 */
class GetItem extends DbQuery{

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
        $foodItem = $this->query("SELECT * FROM food_items WHERE name = '{$this->getDb()->escape_string($this->itemName)}' AND brandName = '{$this->getDb()->escape_string($this->brandName)}';");

        return is_bool($foodItem) ? false : $foodItem->fetch_assoc();

    }

}