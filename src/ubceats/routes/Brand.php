<?php

namespace ubceats\routes;

use Slim\Http\Request;
use Slim\Http\Response;
use ubceats\db\CostQuery;
use ubceats\db\DatabaseLogger;
use ubceats\db\GetLocationsForBrand;

class Brand extends GenericRoute
{
    public function __invoke(Request $request, Response $response, array $args) {
        // Sample log message
        $this->container->get('logger')->info("ubceats '/' brand info");

        // Render index view
        return $this->container->get('renderer')->render($response, 'brand.phtml', [
            "brand" => urldecode($args['name']),
            "locations" => (new GetLocationsForBrand($args['name']))()
        ]);
    }
}