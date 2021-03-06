<?php
namespace ubceats\db;

/**
 * Class CatDivQuery
 * @package ubceats\db
 * @checklist Division query
 */
class CatDivQuery extends DbQuery{

    private $cats;
    private $brandName;

    /**
     * CatDivQuery constructor.
     * @param $cats
     */
    public function __construct(array $cats){
        $this->cats = $cats;
    }


    public function runQuery(){
        $str = "";
        foreach ($this->cats as $cat){
            $str .= "C.name = '{$this->getDb()->escape_string($cat)}' OR ";
        }


        $items = $this->query("SELECT *
FROM food_items fi
WHERE NOT EXISTS
  (SELECT C.name FROM categories C WHERE (" . substr($str, 0, -3) . ") AND NOT EXISTS
    (SELECT ih.itemName
        FROM itemHas ih
        WHERE C.name = ih.categoryName
        AND ih.itemName=fi.name));");

        $foodItems = [];
        while ($onerow = $items->fetch_assoc()) {
            array_push($foodItems, $onerow);
        }

        $brands = $this->query("SELECT *
FROM brand fi
WHERE NOT EXISTS
  (SELECT C.name FROM categories C WHERE (" . substr($str, 0, -3) . ") AND NOT EXISTS
    (SELECT ih.brandName
        FROM brandHas ih
        WHERE C.name = ih.categoryName
        AND ih.brandName=fi.name));");

        $brandsRes = [];
        while ($onerow = $brands->fetch_assoc()) {
            array_push($brandsRes, $onerow);
        }



        return [
            "food" => $foodItems,
            "brands" => $brandsRes
        ];

    }

}