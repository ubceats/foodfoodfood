<?php

namespace ubceats\routes;

use Slim\Http\Request;
use Slim\Http\Response;
use ubceats\db\DbConnection;
use ubceats\db\RemoveVote;
use ubceats\db\VoteQuery;

class Vote extends GenericRoute
{
    public function __invoke(Request $request, Response $response, array $args)
    {
        $body = $request->getParsedBody();

        $this->container->get('logger')->info("ubceats '/' vote");

        switch ($body["intent"]){
            case 'create':
                (new VoteQuery($body["brandName"], $body["foodItemName"], $body["isUpvote"], $body["review"]))();
                break;
            case 'delete':
                (new RemoveVote($body["brandName"], $body["foodItemName"]))();
                break;
        }
        //var_dump($body);
        //var_dump($res);

        header("Location: " . $_SERVER["HTTP_REFERER"] . '?code=' . urlencode(mysqli_error(DbConnection::getInstance()->getMysqli())));
        exit();
    }
}