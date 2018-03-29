<?php

namespace ubceats\db;

class FoodItemInsertion extends DbQuery
{
    private $name;
    private $brand;
    private $price;

    public function __construct(string $name, string $brand, string $price)
    {
        $this->name = $name;
        $this->brand = $brand;
        $this->price = $price;
    }

    /**
     * @return \mysqli_result|boolean For successful SELECT, SHOW, DESCRIBE or
     * EXPLAIN queries <b>mysqli_query</b> will return
     * a <b>mysqli_result</b> object.For other successful queries <b>mysqli_query</b> will
     * return true and false on failure.
     */
    public function pushFoodItemToDB()
    {
        $result = $this->query("INSERT INTO food_items (name, brandName, price) VALUES ('" . $this->name . "', '" . $this->brand . "', '" . $this->price . "');");
        return $result;
    }


    public function runQuery()
    {
        // No query needed
    }


}