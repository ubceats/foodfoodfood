<?php

namespace ubceats\db;

class ResetDatabaseQuery extends DbQuery
{
    private $query;

    public function __construct(string $query)
    {
        $this->query = $query;
    }


    public function runQuery()
    {
        return $this->getDb()->multi_query($this->query);
    }



}