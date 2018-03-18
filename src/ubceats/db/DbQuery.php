<?php
namespace ubceats\db;

/**
 * Class DbQuery
 * @package ubceats\db
 */
abstract class DbQuery{
    abstract public function runQuery();

    public function getDb() : \mysqli{
        return DbConnection::getInstance()->getMysqli();
    }

    protected function query($str){
        $rc = new \ReflectionClass($this);
        $com = $rc->getDocComment();
        preg_match("`@checklist (.*)`", $com, $matches);
        if(count($matches) > 0){
            DatabaseLogger::sendLog($str, $this, $matches[1]);
        }
        else{
            DatabaseLogger::sendLog($str, $this);
        }
        return $this->getDb()->query($str);
    }

    public function __invoke()
    {
       return $this->runQuery();
    }

}