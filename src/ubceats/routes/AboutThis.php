<?php

namespace ubceats\routes;

use Slim\Http\Request;
use Slim\Http\Response;

class AboutThis extends GenericRoute
{
    public function __invoke(Request $request, Response $response, array $args)
    {
        // Sample log message
        $this->container->get('logger')->info("ubceats '/' aboutthis");

        // Render index view
        return $this->container->get('renderer')->render($response, 'about.phtml', $args);
    }
}