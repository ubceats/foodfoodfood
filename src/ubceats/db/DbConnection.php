<?php

namespace ubceats\db;


class DbConnection{
    private static $instance = null;

    private $host;
    private $user;
    private $pass;
    private $dbName;

    private $mysqli;

    public static function getInstance() : DbConnection{
        if (!isset(static::$instance)) {
            static::$instance = self::buildFromConfig();
        }
        return static::$instance;
    }

    /**
     * DbConnection constructor.
     * @param $host
     * @param $user
     * @param $pass
     * @param $dbName
     */
    private function __construct($host, $user, $pass, $dbName)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->dbName = $dbName;

        $this->connect();

    }

    private function connect(){
        $this->mysqli = @new \mysqli($this->host, $this->user, $this->pass, $this->dbName);

        if ($this->mysqli->connect_errno) {
            //echo "Failed to connect to MySQL: " . $this->mysqli->connect_error;
            include_once $GLOBALS['dir'] . 'templates/connerr.phtml';
            exit(0);
        }
    }

    /**
     * @return mixed
     */
    public function getMysqli(){
        return $this->mysqli;
    }

    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return mixed
     */
    public function getDbName()
    {
        return $this->dbName;
    }


    protected function __wakeup(){
    }

    protected function __clone(){
    }

    public static function buildFromConfig() : DbConnection{
        $arr = json_decode(file_get_contents($GLOBALS['dir']. "db.json"), true);
        return new DbConnection($arr["hostname"], $arr["user"], $arr["password"], $arr["dbName"]);
    }
}