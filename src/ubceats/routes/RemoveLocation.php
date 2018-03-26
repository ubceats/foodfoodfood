<?php

namespace ubceats\routes;

use Slim\Http\Request;
use Slim\Http\Response;
use ubceats\db\ListBrands;
use ubceats\db\ListLocations;
use ubceats\db\LocationRemoval;

class RemoveLocation extends GenericRoute
{
    public function __invoke(Request $request, Response $response, array $args)
    {
        // Log the page load.
        $this->container->get('logger')->info("ubceats '/' remove location");
        $error = null;
        if ($request->getParam("location")) {
            // the request is a removal for a place!
            $didRemove = true;
            $location = $request->getParam("location");
            $parts = explode(" | ", $location);
            $locationName = $parts[0];
            $locationAddress = $parts[1];
            $removal = new LocationRemoval($locationName, $locationAddress);
            $removalResult = $removal->removeLocationFromDB();
            if (!$removalResult) {
                // insertion failed, let's set the error
                $error = mysqli_error($removal->getDb());
            }
        } else {
            $didRemove = false;
            $name = null;
        }

        $getLocations = new ListLocations();
        $locationsList = $getLocations->getLocationsList();

        // Render the page.
        return $this->container->get('renderer')->render($response, 'removelocation.phtml', [
            "didRemove" => $didRemove,
            "error" => $error,
            "lastName" => $locationName,
            "locations" => $locationsList
        ]);
    }
}