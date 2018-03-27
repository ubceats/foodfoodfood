<?php

namespace ubceats\db;

class BrandCategoryAssociation extends DbQuery
{
    private $brandName;
    private $categoryName;

    public function __construct(string $brandName, string $categoryName)
    {
        $this->brandName = $brandName;
        $this->categoryName = $categoryName;
    }

    /**
     * @return \mysqli_result|boolean For successful SELECT, SHOW, DESCRIBE or
     * EXPLAIN queries <b>mysqli_query</b> will return
     * a <b>mysqli_result</b> object.For other successful queries <b>mysqli_query</b> will
     * return true and false on failure.
     */
    public function pushAssociationToDB()
    {
        $result = $this->query("INSERT INTO brandHas (brandName, categoryName)
                      VALUES ('" . $this->getDb()->escape_string($this->brandName) . "', '" . $this->getDb()->escape_string($this->categoryName) . "');");
        return $result;
    }


    public function runQuery()
    {
        // FUCK THIS SHIT!!!
    }


}