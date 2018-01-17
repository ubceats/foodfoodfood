<?php

namespace ubceats\routes;

use Slim\Http\Request;
use Slim\Http\Response;
use ubceats\db\VoteQuery;

class Vote extends GenericRoute
{
    public function __invoke(Request $request, Response $response, array $args) {

        if($args["direction"] === "up"){
            (new VoteQuery($args["foodItemId"], true))();
            $this->container->get('logger')->info("ubceats '/' vote up");
        }
        else{
            (new VoteQuery($args["foodItemId"], false))();
            $this->container->get('logger')->info("ubceats '/' vote down");

        }
        // Sample log message

        // Render index view
        return "{}";
    }
}