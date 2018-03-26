<?php

namespace ubceats\routes;

use Slim\Http\Request;
use Slim\Http\Response;
use ubceats\db\CostQuery;
use ubceats\db\DatabaseLogger;

class CostInfo extends GenericRoute
{
    public function __invoke(Request $request, Response $response, array $args)
    {
        // Sample log message
        $this->container->get('logger')->info("ubceats '/' cost info");

        // Render index view
        return $this->container->get('renderer')->render($response, 'costinfo.phtml', ["data" => (new CostQuery())()]);
    }
}