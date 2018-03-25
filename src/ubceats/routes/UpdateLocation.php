<?php

namespace ubceats\routes;

use Slim\Http\Request;
use Slim\Http\Response;
use ubceats\db\ListLocations;
use ubceats\db\LocationUpdate;

class UpdateLocation extends GenericRoute
{
    public function __invoke(Request $request, Response $response, array $args)
    {
        // Log the page load.
        $this->container->get('logger')->info("ubceats '/' update location");
        $error = null;
        $locationName = null;
        if ($request->getParam("location")) {
            // the request is a removal for a place!
            $didUpdate = true;
            $location = $request->getParam("location");
            $latitude = $request->getParam("latitude");
            $longitude = $request->getParam("longitude");
            $locationOK = $longitude >= -123.27 &&
                $longitude <= -123.22 &&
                $latitude >= 49.241 &&
                $latitude <= 49.283;
            if ($locationOK) {
                $parts = explode(" | ", $location);
                $locationName = $parts[0];
                $locationAddress = $parts[1];
                $update = new LocationUpdate($locationName, $locationAddress, $latitude, $longitude);
                $updateResult = $update->updateLocationInDB();
                if (!$updateResult) {
                    // insertion failed, let's set the error
                    $error = mysqli_error($update->getDb());
                }
            } else {
                $error = "CHECK constraint failed. The new location you picked is outside the UBC campus.";
            }
        } else {
            $didUpdate = false;
        }

        $getLocations = new ListLocations();
        $locationsList = $getLocations->getLocationsList();

        // Render the page.
        return $this->container->get('renderer')->render($response, 'updatelocation.phtml', [
            "didUpdate" => $didUpdate,
            "error" => $error,
            "lastName" => $locationName,
            "locations" => $locationsList
        ]);
    }
}