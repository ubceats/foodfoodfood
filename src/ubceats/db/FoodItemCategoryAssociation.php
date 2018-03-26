<?php

namespace ubceats\db;

class FoodItemCategoryAssociation extends DbQuery
{
    private $fooditem;
    private $category;
    private $brand;

    public function __construct(string $category, string $fooditem, string $brand)
    {
        $this->category = $category;
        $this->fooditem = $fooditem;
        $this->brand = $brand;
    }

    /**
     * @return \mysqli_result|boolean For successful SELECT, SHOW, DESCRIBE or
     * EXPLAIN queries <b>mysqli_query</b> will return
     * a <b>mysqli_result</b> object.For other successful queries <b>mysqli_query</b> will
     * return true and false on failure.
     */
    public function pushAssociationToDB()
    {
        $result = $this->query("INSERT INTO itemHas (itemName, categoryName, brandName)
                      VALUES ('" . $this->fooditem . "', '" . $this->category . "', '" . $this->brand . "');");
        return $result;
    }


    public function runQuery()
    {
        // FUCK THIS SHIT!!!
    }


}