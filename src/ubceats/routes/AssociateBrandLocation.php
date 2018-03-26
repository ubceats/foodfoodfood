<?php

namespace ubceats\routes;

use Slim\Http\Request;
use Slim\Http\Response;
use ubceats\db\BrandInsertion;
use ubceats\db\BrandLocationAssociation;
use ubceats\db\ListBrands;
use ubceats\db\ListLocations;
use ubceats\db\LocationInsertion;
use ubceats\db\Sorts\PriceSort;

class AssociateBrandLocation extends GenericRoute
{
    public function __invoke(Request $request, Response $response, array $args)
    {
        // Log the page load.
        $this->container->get('logger')->info("ubceats '/' associate brand location");
        $error = null;
        $brand = null;
        $locationName = null;
        if ($request->getParam("brand")) {
            // the request is an insertion!
            $didInsert = true;
            $brand = $request->getParam("brand");
            $location = $request->getParam("location");
            $parts = explode(" | ", $location);
            $locationName = $parts[0];
            $locationAddress = $parts[1];
            $insertion = new BrandLocationAssociation($brand, $locationName, $locationAddress);
            $insertionResult = $insertion->pushAssociationToDB();
            if (!$insertionResult) {
                // insertion failed, let's set the error
                $error = mysqli_error($insertion->getDb());
            }
        } else {
            $didInsert = false;
            $name = null;
        }

        $getLocations = new ListLocations();
        $locationsList = $getLocations->getLocationsList();

        $getBrands = new ListBrands();
        $brandsList = $getBrands->getBrandsNamesList();

        // Render the page.
        return $this->container->get('renderer')->render($response, 'assocbrandloc.phtml', [
            "didInsert" => $didInsert,
            "error" => $error,
            "lastBrandName" => $brand,
            "lastLocationName" => $locationName,
            "brands" => $brandsList,
            "locations" => $locationsList
        ]);
    }
}