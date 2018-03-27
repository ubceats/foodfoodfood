<?php

namespace ubceats\db;

class RemoveVote extends DbQuery
{
    private $brandName;
    private $foodItemName;

    /**
     * VoteQuery constructor.
     * @param $brandName
     * @param $foodItemName
     */
    public function __construct($brandName, $foodItemName)
    {
        $this->brandName = $brandName;
        $this->foodItemName = $foodItemName;

    }


    public function runQuery()

    {
        $result = $this->query(
            "DELETE FROM  votes
WHERE username = '{$this->getDb()->escape_string($this->username)}'
            AND brandName = '{$this->getDb()->escape_string($this->brandName)}' 
            AND foodItemName = '{$this->getDb()->escape_string($this->foodItemName)}'");

        return !is_bool($result);

    }


}