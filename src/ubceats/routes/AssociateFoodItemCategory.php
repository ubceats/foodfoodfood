<?php

namespace ubceats\routes;

use Slim\Http\Request;
use Slim\Http\Response;
use ubceats\db\FoodItemCategoryAssociation;
use ubceats\db\GetCategory;
use ubceats\db\GetFoodItems;

class AssociateFoodItemCategory extends GenericRoute
{
    public function __invoke(Request $request, Response $response, array $args) {
        // Log the page load.
        $this->container->get('logger')->info("ubceats '/' associate food item with category");
        $error = null;
        $categoryName = null;
        $foodItemName = null;
        if ($request->getParam("category")) {
            // the request is an insertion!
            $didInsert = true;
            $category = $request->getParam("category");
            $fooditem = $request->getParam("fooditem");
            $parts = explode(" | ", $fooditem);
            $foodItemName = $parts[0];
            $brand = $parts[1];
            $insertion = new FoodItemCategoryAssociation($category, $foodItemName, $brand);
            $insertionResult = $insertion->pushAssociationToDB();
            if (!$insertionResult) {
                // insertion failed, let's set the error
                $error = mysqli_error($insertion->getDb());
            }
        } else {
            $didInsert = false;
            $name = null;
        }

        $getCategory = new GetCategory();
        $categoriesList = $getCategory->runQuery();

        $getFoodItems = new GetFoodItems();
        $foodItemsList = $getFoodItems->runQuery();

        // Render the page.
        return $this->container->get('renderer')->render($response, 'assocfooditemcategory.phtml', [
            "didInsert" => $didInsert,
            "error" => $error,
            "lastFoodItemName" => $foodItemName,
            "lastCategoryName" => $categoryName,
            "categoriesList" => $categoriesList,
            "foodItemsList" => $foodItemsList
        ]);
    }
}