<?php

namespace ubceats\db;


class DatabaseLogger{
    public static function sendLog(string $str){
        $GLOBALS['mysqlLogs'][] = $str;
    }

}