<?php

namespace ubceats\db;


class DatabaseLogger{
    public static function sendLog(string $str, $ctx = null){
        $GLOBALS['mysqlLogs'][] = [($ctx != null ? get_class($ctx) : ""), $str];
    }

}