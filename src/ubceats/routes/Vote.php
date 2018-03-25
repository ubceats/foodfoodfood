<?php

namespace ubceats\routes;

use Slim\Http\Request;
use Slim\Http\Response;
use ubceats\db\DbConnection;
use ubceats\db\VoteQuery;

class Vote extends GenericRoute
{
    public function __invoke(Request $request, Response $response, array $args) {
        $body = $request->getParsedBody();

        $this->container->get('logger')->info("ubceats '/' vote");

        $res = (new VoteQuery($body["brandName"], $body["foodItemName"], $body["isUpvote"], $body["review"]))();

        header("Location: " . $_SERVER["HTTP_REFERER"] . "?error=" . (!$res ? 'true' : 'false'));
        exit();
    }
}