<?php
/**
 * Created by PhpStorm.
 * User: agott
 * Date: 2018-03-17
 * Time: 13:53
 */

namespace ubceats\db;

class LoginSorcerer extends DbQuery
{
    private $attempt_username;
    private $attempt_password;

    /**
     * LoginSorcerer constructor.
     * @param string $attempt_username attempted username
     * @param string $attempt_password attempted password
     */
    public function __construct(string $attempt_username, string $attempt_password)
    {
        $this->attempt_username = $attempt_username;
        $this->attempt_password = $attempt_password;
    }

    /**
     * @return string|bool "user", "admin" or false if login failed
     */
    public function tryLogin() {
        // Yes, this is not secure. No hashes, salt or anything. But it's a project.
        if (!ctype_alnum($this->attempt_username)) {
            die("Special characters were found in the inserted username. Someone is doing something nasty here.");
        }
        $result = $this->query("SELECT password, isAdmin FROM users WHERE username = '".$this->attempt_username."';");
        $dbPasswordAssoc = $result->fetch_assoc();
        if ($dbPasswordAssoc["password"] == $this->attempt_password) {
            if ($dbPasswordAssoc["isAdmin"] == 1) {
                return "admin";
            } else {
                return "user";
            }
        } else {
            return false;
        }
    }

    public function runQuery()
    {
        // No need to implement this.
    }
}