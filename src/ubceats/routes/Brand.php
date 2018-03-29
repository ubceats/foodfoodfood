<?php

namespace ubceats\routes;

use Slim\Http\Request;
use Slim\Http\Response;
use ubceats\db\CostQuery;
use ubceats\db\DatabaseLogger;
use ubceats\db\GetBrand;
use ubceats\db\GetCategoriesForBrand;
use ubceats\db\GetItemsForBrand;
use ubceats\db\GetLocationsForBrand;

class Brand extends GenericRoute
{
    public function __invoke(Request $request, Response $response, array $args)
    {
        // Sample log message
        $this->container->get('logger')->info("ubceats '/' brand info");

        // Render index view
        return $this->container->get('renderer')->render($response, 'brand.phtml', [
            "brand" => (new GetBrand($args['name']))(),
            "locations" => (new GetLocationsForBrand($args['name']))(),
            "cats" => (new GetCategoriesForBrand($args['name']))(),
            "menu" => (new GetItemsForBrand($args['name'], ($request->getParam("sort") ? $request->getParam("sort") : 'DESC')))()
        ]);
    }
}