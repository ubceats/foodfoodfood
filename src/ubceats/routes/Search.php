<?php

namespace ubceats\routes;

use Slim\Http\Request;
use Slim\Http\Response;
use ubceats\db\NewFoodSearch;

class Search extends GenericRoute
{
    public function __invoke(Request $request, Response $response, array $args)
    {
        // Sample log message
        $this->container->get('logger')->info("ubceats '/' search");

        $search = new NewFoodSearch($args["thing"]);

        // Render index view
        return $this->container->get('renderer')->render($response, 'newlist.phtml', [
            "thing" => $args["thing"],
            "stuff" => $search()
        ]);
    }
}