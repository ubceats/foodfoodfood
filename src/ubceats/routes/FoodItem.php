<?php

namespace ubceats\routes;

use Slim\Http\Request;
use Slim\Http\Response;
use ubceats\db\CostQuery;
use ubceats\db\DatabaseLogger;
use ubceats\db\GetCategoriesForItem;
use ubceats\db\GetItem;
use ubceats\db\GetItemsForBrand;
use ubceats\db\GetLocationsForBrand;
use ubceats\db\GetReviewsForItem;

class FoodItem extends GenericRoute
{
    public function __invoke(Request $request, Response $response, array $args) {
        // Sample log message
        $this->container->get('logger')->info("ubceats '/' brand info");

        // Render index view
        return $this->container->get('renderer')->render($response, 'fooditem.phtml', [
            "brand" => urldecode($args['brand']),
            "foodItem" => (new GetItem($args['item'], $args['brand']))(),
            "reviews" => (new GetReviewsForItem($args['item'], $args['brand']))(),
            "cats" => (new GetCategoriesForItem($args['item'], $args['brand']))()
        ]);
    }
}