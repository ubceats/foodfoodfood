<?php

namespace ubceats\routes;

use Slim\Http\Request;
use Slim\Http\Response;

class Login extends GenericRoute
{
    public function __invoke(Request $request, Response $response, array $args) {
        // Sample log message
        $this->container->get('logger')->info("ubceats '/' login attempt");

        $attempted_username = $request->getQueryParam("username", "IAN");
        $attempted_password = $request->getQueryParam("password", "IAN_DEFAULT_PASSWORD");



        // Render index view
        return $this->container->get('renderer')->render($response, 'loginhappened.phtml', $args);
    }
}