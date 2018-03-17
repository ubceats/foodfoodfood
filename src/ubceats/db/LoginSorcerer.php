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
     * @return bool whether login was successful or not
     */
    public function tryLogin() : bool
    {
        // Yes, this is not secure. No hashes or anything. But it's a project.
        $result = $this->query("SELECT password FROM users WHERE username = '".$this->attempt_username."';");
        $dbPasswordAssoc = $result->fetch_assoc();
        return $dbPasswordAssoc["password"] == $this->attempt_password;
    }

    public function runQuery()
    {
        // No need to implement this.
    }
}