<?php

namespace ubceats\routes;

use Slim\Http\Request;
use Slim\Http\Response;
use ubceats\db\ListBrands;
use ubceats\db\BrandRemoval;

class RemoveBrand extends GenericRoute
{
    public function __invoke(Request $request, Response $response, array $args)
    {
        // Log the page load.
        $this->container->get('logger')->info("ubceats '/' remove brand");
        $error = null;
        if ($request->getParam("brand")) {
            // the request is a removal for a place!
            $didRemove = true;
            $brand = $request->getParam("brand");
            $removal = new BrandRemoval($brand);
            $removalResult = $removal->removeBrandFromDB();
            if (!$removalResult) {
                // insertion failed, let's set the error
                $error = mysqli_error($removal->getDb());
            }
        } else {
            $didRemove = false;
            $name = null;
        }

        $getBrands = new ListBrands();
        $brandsList = $getBrands->getBrandsNamesList();

        // Render the page.
        return $this->container->get('renderer')->render($response, 'removebrand.phtml', [
            "didRemove" => $didRemove,
            "error" => $error,
            "lastName" => $brand,
            "brands" => $brandsList
        ]);
    }
}