<?php

namespace ubceats\routes;

use Slim\Http\Request;
use Slim\Http\Response;
use ubceats\db\BrandCategoryAssociation;
use ubceats\db\GetCategory;
use ubceats\db\ListBrands;

class AssociateBrandCategory extends GenericRoute
{
    public function __invoke(Request $request, Response $response, array $args)
    {
        // Log the page load.
        $this->container->get('logger')->info("ubceats '/' associate brand with category");
        $error = null;
        $categoryName = null;
        $brandName = null;
        if ($request->getParam("category")) {
            // the request is an insertion!
            $didInsert = true;
            $category = urldecode($request->getParam("category"));
            $brand = urldecode($request->getParam("brand"));
            $brandName = $brand;
            $insertion = new BrandCategoryAssociation($brand, $category);
            $categoryName = $category;
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

        $listBrands = new ListBrands();
        $brandsList = $listBrands->getBrandsNamesList();

        // Render the page.
        return $this->container->get('renderer')->render($response, 'assocbrandcategory.phtml', [
            "didInsert" => $didInsert,
            "error" => $error,
            "lastBrandName" => $brandName,
            "lastCategoryName" => $categoryName,
            "categoriesList" => $categoriesList,
            "brandsList" => $brandsList
        ]);
    }
}