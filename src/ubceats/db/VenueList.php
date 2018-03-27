<?php

namespace ubceats\db;

/**
 * Class VenueList
 * @package ubceats\db
 * @checklist Selection query
 */
class VenueList extends DbQuery
{
    /** @var bool */
    private $selectUrl;

    /**
     * VenueList constructor.
     * @param bool $selectUrl
     */
    public function __construct(bool $selectUrl){
        $this->selectUrl = $selectUrl;
    }


    public function runQuery()
    {
        $arr = [];
        $query = $this->query("SELECT name " . ($this->selectUrl ? ', url' : '') . " FROM brand ORDER BY name");

        while ($onerow = $query->fetch_assoc()) {
            array_push($arr, $onerow);
        }
        return $arr;
    }
}