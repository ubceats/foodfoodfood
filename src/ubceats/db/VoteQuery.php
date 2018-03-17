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
        if ($this->isPositive) {
            $this->query("UPDATE food_items SET rating = rating + 1 WHERE id = '" .$this->getDb()->real_escape_string($this->foodItemId) . "'");
        } else {
            $this->query("UPDATE food_items SET rating = rating - 1 WHERE id = '" .$this->getDb()->real_escape_string($this->foodItemId) . "'");
        }
    }



}