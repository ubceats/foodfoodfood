<?php

namespace ubceats\routes;

use Slim\Http\Request;
use Slim\Http\Response;
use ubceats\db\LoginSorcerer;

class Login extends GenericRoute
{
    public function __invoke(Request $request, Response $response, array $args)
    {
        // Sample log message
        $this->container->get('logger')->info("ubceats '/' login attempt");
        $attempted_username = $request->getParam("username");
        $attempted_password = $request->getParam("password");

        $loginSorcerer = new LoginSorcerer($attempted_username, $attempted_password);
        $loginResult = $loginSorcerer->tryLogin();

        if ($loginResult) {
            $_SESSION["username"] = $attempted_username;
            if ($loginResult == "admin") {
                $_SESSION["isAdmin"] = 1;
            }
            return $this->container->get('renderer')->render($response, 'loginsucceeded.phtml', $args);
        } else {
            return $this->container->get('renderer')->render($response, 'loginfailed.phtml', $args);
        }

    }
}