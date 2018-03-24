<?php
namespace ubceats\db;

/**
 * Class GetBrand
 * @package ubceats\db
 */
class GetBrand extends DbQuery{

    private $itemName;
    private $brandName;

    /**
     * GetBrand constructor.
     * @param $brandName
     */
    public function __construct($brandName){
        $this->brandName = $brandName;
    }


    public function runQuery(){
        $brand = $this->query("SELECT * FROM brand WHERE name = '{$this->getDb()->escape_string($this->brandName)}';");

        return is_bool($brand) ? false : $brand->fetch_assoc();

    }

}