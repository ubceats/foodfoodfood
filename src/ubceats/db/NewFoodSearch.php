<?php

namespace ubceats\db;


use ubceats\db\Sorts\DistanceSort;
use ubceats\db\Sorts\PriceSort;
use ubceats\db\Sorts\RatingSort;
use ubceats\OpenTimeDecorator;
use ubceats\util\LatLon;

/**
 * Class NewFoodSearch
 * @package ubceats\db
 * @checklist Selection query
 */
class NewFoodSearch extends DbQuery {

    private $search;


    /**
     * FoodSearch constructor.
     * @param $search
     */
    public function __construct(string $search){
        $this->search = $search;
    }


    public function runQuery()
    {

        $brands = [];

        $query = $this->query("SELECT * FROM brand WHERE name LIKE '%{$this->getDb()->escape_string($this->search)}%';");


        while ($onerow = $query->fetch_assoc()) {
            array_push($brands, $onerow);
        }

        $foodItems = [];

        $query = $this->query("SELECT * FROM food_items WHERE name LIKE '%{$this->getDb()->escape_string($this->search)}%';");

        while ($onerow = $query->fetch_assoc()) {
            array_push($foodItems, $onerow);
        }

        return [
            "brands" => $brands,
            "food" => $foodItems
        ];

    }


    /**
     * @return string
     */
    public function getSearch(): string
    {
        return $this->search;
    }

}