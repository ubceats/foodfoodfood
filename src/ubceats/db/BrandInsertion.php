<?php

namespace ubceats\db;

class BrandInsertion extends DbQuery
{
    private $name;
    private $url;
    private $desc;

    public function __construct(string $name, string $url, string $desc)
    {
        $this->name = $name;
        $this->url = $url;
        $this->desc = $desc;
    }

    /**
     * @return \mysqli_result|boolean For successful SELECT, SHOW, DESCRIBE or
     * EXPLAIN queries <b>mysqli_query</b> will return
     * a <b>mysqli_result</b> object.For other successful queries <b>mysqli_query</b> will
     * return true and false on failure.
     */
    public function pushBrandToDB()
    {
        $result = $this->query("INSERT INTO brand (name, url, `desc`) VALUES ('" . $this->name . "', '" . $this->url . "', '" . $this->desc . "');");
        return $result;
    }


    public function runQuery()
    {
        // FUCK THIS SHIT!!!
    }


}