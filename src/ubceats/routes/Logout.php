<?php

namespace ubceats\routes;

use Slim\Http\Request;
use Slim\Http\Response;
use ubceats\db\LoginSorcerer;

class Logout extends GenericRoute
{
    public function __invoke(Request $request, Response $response, array $args)
    {
        // Sample log message
        $this->container->get('logger')->info("ubceats '/' logout attempt");
        session_destroy();
        return $this->container->get('renderer')->render($response, 'loggedout.phtml', $args);
    }
}