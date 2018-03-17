<?php
namespace ubceats\db;


abstract class DbQuery{
    abstract public function runQuery();

    public function getDb() : \mysqli{
        return DbConnection::getInstance()->getMysqli();
    }

    protected function query($str){
        DatabaseLogger::sendLog($str);
        return $this->getDb()->query($str);
    }

    public function __invoke()
    {
       return $this->runQuery();
    }

}