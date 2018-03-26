<?php

namespace ubceats\routes;

use Slim\Http\Request;
use Slim\Http\Response;
use ubceats\db\BrandInsertion;
use ubceats\db\Sorts\PriceSort;

class AddBrand extends GenericRoute
{
    public function __invoke(Request $request, Response $response, array $args)
    {
        // Log the page load.
        $this->container->get('logger')->info("ubceats '/' add brand");
        $error = null;
        if ($request->getParam("name")) {
            // the request is an insertion!
            $didInsert = true;
            $name = $request->getParam("name");
            $url = $request->getParam("url");
            $desc = $request->getParam("desc");
            $insertion = new BrandInsertion($name, $url, $desc);
            $insertionResult = $insertion->pushBrandToDB();
            if (!$insertionResult) {
                // insertion failed, let's set the error
                $error = mysqli_error($insertion->getDb());
            }
        } else {
            $didInsert = false;
            $name = null;
        }
        // Render the page.
        return $this->container->get('renderer')->render($response, 'addbrand.phtml', [
            "didInsert" => $didInsert,
            "error" => $error,
            "lastName" => $name
        ]);
    }
}