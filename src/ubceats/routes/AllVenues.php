<?php

namespace ubceats\routes;

use Slim\Http\Request;
use Slim\Http\Response;
use ubceats\db\VenueList;

class AllVenues extends GenericRoute
{
    public function __invoke(Request $request, Response $response, array $args) {
        // Sample log message
        $this->container->get('logger')->info("ubceats '/' list");

        // Render index view
        return $this->container->get('renderer')->render($response, 'list.phtml', ["venues" => (new VenueList())()]);
    }
}