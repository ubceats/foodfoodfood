<?php
namespace ubceats\db;

/**
 * Class CostQuery
 * @package ubceats\db
 * @checklist Selection query
 */
class GetCategoriesForItem extends DbQuery{

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

        $cats = $this->query("SELECT categoryName, c.desc FROM itemHas INNER JOIN categories c ON itemHas.categoryName = c.name
WHERE brandName = '{$this->getDb()->escape_string($this->brandName)}' AND itemName = '{$this->getDb()->escape_string($this->itemName)}'");

        $arr = [];
        while ($onerow = $cats->fetch_assoc()) {
            array_push($arr, $onerow);
        }

        return $arr;

    }

}