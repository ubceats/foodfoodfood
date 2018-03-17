<?php

namespace ubceats\db;

class VoteQuery extends DbQuery
{
    private $foodItemId;
    private $isPositive;

    /**
     * VoteQuery constructor.
     * @param $foodItemId
     * @param $isPositive
     */
    public function __construct($foodItemId, bool $isPositive)
    {
        $this->foodItemId = $foodItemId;
        $this->isPositive = $isPositive;
    }


    public function runQuery()
    {
        // FUCK THIS SHIT!!!
    }



}