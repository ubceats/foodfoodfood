<?php

namespace ubceats\routes;

use Slim\Http\Request;
use Slim\Http\Response;
use ubceats\db\GetAllOccupies;
use ubceats\db\ListBrands;
use ubceats\db\ListLocations;
use ubceats\db\LocationRemoval;
use ubceats\db\OccupiesRemoval;

class RemoveOccupies extends GenericRoute
{
    public function __invoke(Request $request, Response $response, array $args) {
        // Log the page load.
        $this->container->get('logger')->info("ubceats '/' remove location");
        $error = null;
        if ($request->getParam("occupies")) {
            // the request is a removal for a place!
            $didRemove = true;
            $occupies = $request->getParam("occupies");
            $parts = explode("|", $occupies);
            $brandName = $parts[0];
            $locationName = $parts[1];
            $locationAddress = $parts[2];
            $removal = new OccupiesRemoval($brandName, $locationName, $locationAddress);
            $removalResult = $removal->removeOccupiesFromDB();
            if (!$removalResult) {
                // insertion failed, let's set the error
                $error = mysqli_error($removal->getDb());
            }
        } else {
            $didRemove = false;
            $name = null;
        }

        $getOccupies= new GetAllOccupies();
        $occupiesList = $getOccupies->runQuery();

        // Render the page.
        return $this->container->get('renderer')->render($response, 'removeoccupies.phtml', [
            "didRemove" => $didRemove,
            "error" => $error,
            "lastName" => [$brandName, $locationName],
            "occupies" => $occupiesList
        ]);
    }
}