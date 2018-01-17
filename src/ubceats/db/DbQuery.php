<?php
namespace ubceats\db;


abstract class DbQuery{
    abstract public function runQuery();

    public function getDb() : \mysqli{
        return DbConnection::getInstance()->getMysqli();
    }

    public function __invoke()
    {
       return $this->runQuery();
    }

}