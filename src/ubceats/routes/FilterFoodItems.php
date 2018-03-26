<?php

namespace ubceats\routes;

use Slim\Http\Request;
use Slim\Http\Response;
use ubceats\db\CatDivQuery;
use ubceats\db\CostQuery;
use ubceats\db\DatabaseLogger;
use ubceats\db\GetBrand;
use ubceats\db\GetCategory;
use ubceats\db\GetItemsForBrand;
use ubceats\db\GetLocationsForBrand;

class FilterFoodItems extends GenericRoute
{
    public function __invoke(Request $request, Response $response, array $args)
    {
        // Sample log message
        $this->container->get('logger')->info("ubceats '/' filter food items");
        $results = null;
        if (isset($request->getParams()["categories"])) {
            $catDivQuery = new CatDivQuery($request->getParams()["categories"]);
            $results = $catDivQuery->runQuery();
        }
        // Render index view
        return $this->container->get('renderer')->render($response, 'filterfooditems.phtml', [
            "categories" => (new GetCategory())->runQuery(),
            "stuff" => $results
        ]);
    }
}