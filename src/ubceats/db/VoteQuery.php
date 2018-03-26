<?php

namespace ubceats\db;

class VoteQuery extends DbQuery
{
    private $brandName;
    private $foodItemName;
    private $isPositive;
    private $rating;

    /**
     * VoteQuery constructor.
     * @param $brandName
     * @param $foodItemName
     * @param $isPositive
     * @param $rating
     */
    public function __construct($brandName, $foodItemName, $isPositive, $rating)
    {
        $this->brandName = $brandName;
        $this->foodItemName = $foodItemName;
        $this->isPositive = $isPositive;
        $this->rating = $rating;
    }


    public function runQuery()

    {
        $result = $this->query("INSERT INTO votes (isUpvote, review, username, foodItemName, brandName) VALUES (" . ($this->isPositive !== "on" ? -1 : 1) . ",'" . $this->getDb()->escape_string($this->rating) . "', '" . $this->getDb()->escape_string($_SESSION['username']) . "','" . $this->getDb()->escape_string($this->foodItemName) . "', '" . $this->getDb()->escape_string($this->brandName) . "')");

        return !is_bool($result);

    }


}