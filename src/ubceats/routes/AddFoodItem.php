<?php

namespace ubceats\routes;

use Slim\Http\Request;
use Slim\Http\Response;
use ubceats\db\BrandInsertion;
use ubceats\db\BrandLocationAssociation;
use ubceats\db\FoodItemInsertion;
use ubceats\db\ListBrands;
use ubceats\db\ListLocations;
use ubceats\db\LocationInsertion;
use ubceats\db\Sorts\PriceSort;

class AddFoodItem extends GenericRoute
{
    public function __invoke(Request $request, Response $response, array $args)
    {
        // Log the page load.
        $this->container->get('logger')->info("ubceats '/' add food item");
        $error = null;
        if ($request->getParam("name")) {
            // the request is an insertion!
            $didInsert = true;
            $name = $request->getParam("name");
            $price = $request->getParam("price");
            $brand = $request->getParam("brand");
            $insertion = new FoodItemInsertion($name, $brand, $price);
            $insertionResult = $insertion->pushFoodItemToDB();
            if (!$insertionResult) {
                // insertion failed, let's set the error
                $error = mysqli_error($insertion->getDb());
            }
        } else {
            $didInsert = false;
            $name = null;
        }

        $getBrands = new ListBrands();
        $brandsList = $getBrands->getBrandsNamesList();

        // Render the page.
        return $this->container->get('renderer')->render($response, 'addfooditem.phtml', [
            "didInsert" => $didInsert,
            "error" => $error,
            "lastName" => $name,
            "brands" => $brandsList
        ]);
    }
}