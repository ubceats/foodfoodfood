<?php

namespace ubceats\routes;

use Slim\Http\Request;
use Slim\Http\Response;
use ubceats\db\FoodSearch;
use ubceats\db\VenueList;
use ubceats\util\LatLon;

class Search extends GenericRoute
{
    public function __invoke(Request $request, Response $response, array $args) {
        // Sample log message
        $this->container->get('logger')->info("ubceats '/' search");

        $filters = [];

        if($request->getQueryParam('vegetarian', false)){
            $filters[] = 'vegetarian';
        }
        if($request->getQueryParam('vegan', false)){
            $filters[] = 'vegan';
        }
        if($request->getQueryParam('gluten_free', false)){
            $filters[] = 'gluten_free';
        }
        if($request->getQueryParam('mealPlan', false)){
            $filters[] = 'mealPlan';
        }
        if($request->getQueryParam('flexDollars', false)){
            $filters[] = 'flexDollars';
        }

        $search = new FoodSearch($args["thing"], $filters, $request->getQueryParam('sort', 0));

        if(isset($request->getQueryParams()["lat"]) && isset($request->getQueryParams()["lon"])){
            $latLon = new LatLon();
            $latLon->lat = $request->getQueryParam("lat");
            $latLon->lon = $request->getQueryParam("lon");
            $search->setUserLoc($latLon);
        }



        // Render index view
        return $this->container->get('renderer')->render($response, 'list.phtml', [
            "thing" => $args["thing"],
            "filters" => $filters,
            "sort" => $request->getQueryParam('sort', 0),
            "venues" => $search()
        ]);
    }
}