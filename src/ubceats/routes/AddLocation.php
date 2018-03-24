<?php

namespace ubceats\routes;

use Slim\Http\Request;
use Slim\Http\Response;
use ubceats\db\BrandInsertion;
use ubceats\db\LocationInsertion;
use ubceats\db\Sorts\PriceSort;

class AddLocation extends GenericRoute
{
    public function __invoke(Request $request, Response $response, array $args) {
        // Log the page load.
        $this->container->get('logger')->info("ubceats '/' add location");
        $error = null;
        if ($request->getParam("name")) {
            // the request is an insertion!
            $didInsert = true;
            $name = $request->getParam("name");
            $address = $request->getParam("address");
            $latitude = $request->getParam("latitude");
            $longitude = $request->getParam("longitude");
            // TODO: add CHECK constraint
            $locationOK = $latitude >= -123.27 &&
                           $latitude <= -123.22 &&
                           $longitude >= 49.241 &&
                           $longitude <= 49.283;
            if ($locationOK) {
                $insertion = new LocationInsertion($name, $address, $latitude, $longitude);
                $insertionResult = $insertion->pushLocationToDB();
                if (!$insertionResult) {
                    // insertion failed, let's set the error
                    $error = mysqli_error($insertion->getDb());
                }
            } else {
                $error = "CHECK constraint failed. The location is outside the UBC campus.";
            }
        } else {
            $didInsert = false;
            $name = null;
        }
        // Render the page.
        return $this->container->get('renderer')->render($response, 'addlocation.phtml', [
            "didInsert" => $didInsert,
            "error" => $error,
            "lastName" => $name
        ]);
    }
}