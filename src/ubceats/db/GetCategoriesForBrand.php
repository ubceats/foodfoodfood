<?php

namespace ubceats\db;

/**
 * Class GetCategoriesForBrand
 * @package ubceats\db
 * @checklist Selection query
 */
class GetCategoriesForBrand extends DbQuery
{

    private $brandName;

    /**
     * CostQuery constructor.
     * @param $brandName
     */
    public function __construct($brandName)
    {
        $this->brandName = $brandName;
    }


    public function runQuery()
    {

        $cats = $this->query("SELECT categoryName FROM brandHas INNER JOIN categories c ON brandHas.categoryName = c.name
WHERE brandName = '{$this->getDb()->escape_string($this->brandName)}'");

        $arr = [];
        while ($onerow = $cats->fetch_assoc()) {
            array_push($arr, $onerow);
        }

        return $arr;

    }

}