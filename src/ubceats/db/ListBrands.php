<?php

namespace ubceats\db;

/**
 * Class ListBrands
 * @package ubceats\db
 * @checklist Selection query
 */
class ListBrands extends DbQuery
{

    /**
     * @return \mysqli_result|boolean For successful SELECT, SHOW, DESCRIBE or
     * EXPLAIN queries <b>mysqli_query</b> will return
     * a <b>mysqli_result</b> object.For other successful queries <b>mysqli_query</b> will
     * return true and false on failure.
     */
    public function getBrandsNamesList()
    {
        $result = $this->query("SELECT name FROM brand;");
        return $result;
    }


    public function runQuery()
    {
        // TODO
    }

}