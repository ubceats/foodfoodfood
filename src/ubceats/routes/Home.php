<?php

namespace ubceats\routes;

use Slim\Http\Request;
use Slim\Http\Response;

class Home extends GenericRoute
{
    public function __invoke(Request $request, Response $response, array $args) {
        // Sample log message
        $this->container->get('logger')->info("ubceats '/' route");

        // Render index view
        return $this->container->get('renderer')->render($response, 'index.phtml', $args);
    }
}