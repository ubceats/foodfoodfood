<?php

namespace ubceats\routes;

use Slim\Http\Request;
use Slim\Http\Response;
use ubceats\db\DbConnection;
use ubceats\db\ListBrands;
use ubceats\db\BrandRemoval;
use ubceats\db\ResetDatabaseQuery;

class ResetDatabase extends GenericRoute
{
    public function __invoke(Request $request, Response $response, array $args)
    {
        // Log the page load.
        $this->container->get('logger')->info("ubceats '/' reset database");
        $error = null;
        if ($request->getParam("files")) {
            // the request is a removal for a place!
            $didReset = true;
            $file = $request->getParam("files");
            $removal = new ResetDatabaseQuery(file_get_contents($GLOBALS['dir'] . 'private/sql/' . $file));
            $removalResult = $removal->runQuery();
            if (!$removalResult) {
                // insertion failed, let's set the error
                $error = mysqli_error($removal->getDb());
            }
        } else {
            $didReset = false;
            $file = null;
        }

        $getBrands = new ListBrands();
        $brandsList = $getBrands->getBrandsNamesList();

        $path = $GLOBALS['dir'] . 'private/sql';
        $files = array_diff(scandir($path), array('.', '..'));

        // Render the page.
        return $this->container->get('renderer')->render($response, 'resetdb.phtml', [
            "backupName" => $file,
            "error" => $error,
            "name" => DbConnection::getInstance()->getDbName(),
            "hostname" => DbConnection::getInstance()->getHost(),
            "files" => $files,
            "didReset" => $didReset
        ]);
    }
}