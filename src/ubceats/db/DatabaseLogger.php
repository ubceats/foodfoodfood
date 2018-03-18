<?php

namespace ubceats\db;


class DatabaseLogger{
    public static function sendLog(string $str, $ctx = null, $checklistItem = ""){
        $GLOBALS['mysqlLogs'][] = [($ctx != null ? get_class($ctx) : ""), $str, $checklistItem];
    }

}