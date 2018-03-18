<?php

// Routes

$app->get('/', \ubceats\routes\Home::class);
$app->get('/about', \ubceats\routes\AboutThis::class);
$app->get('/list', \ubceats\routes\AllVenues::class);
$app->get('/search/{thing}', \ubceats\routes\Search::class);
$app->get('/vote/{foodItemId}/{direction}', \ubceats\routes\Vote::class);

// Login/logout
$app->get('/login', \ubceats\routes\Login::class);
$app->get('/logout', \ubceats\routes\Logout::class);

// Administration options
$app->get('/addbrand', \ubceats\routes\AddBrand::class);
$app->get('/addlocation', \ubceats\routes\AddLocation::class);
$app->get('/assocbrandloc', \ubceats\routes\AssociateBrandLocation::class);