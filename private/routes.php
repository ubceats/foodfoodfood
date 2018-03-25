<?php

// Routes

$app->get('/', \ubceats\routes\Home::class);
$app->get('/about', \ubceats\routes\AboutThis::class);
$app->get('/costs', \ubceats\routes\CostInfo::class);
$app->get('/list', \ubceats\routes\AllVenues::class);
$app->get('/search/{thing}', \ubceats\routes\Search::class);
$app->post('/vote', \ubceats\routes\Vote::class);

$app->get('/brand/{name}', \ubceats\routes\Brand::class);
$app->get('/brand/{brand}/{item}', \ubceats\routes\FoodItem::class);

// Login/logout
$app->get('/login', \ubceats\routes\Login::class);
$app->get('/logout', \ubceats\routes\Logout::class);

// Administration options
$app->get('/addbrand', \ubceats\routes\AddBrand::class);
$app->get('/addlocation', \ubceats\routes\AddLocation::class);
$app->get('/assocbrandloc', \ubceats\routes\AssociateBrandLocation::class);
$app->get('/addfooditem', \ubceats\routes\AddFoodItem::class);
$app->get('/rmlocation', \ubceats\routes\RemoveLocation::class);
$app->get('/rmbrand', \ubceats\routes\RemoveBrand::class);
$app->get('/rmoccupies', \ubceats\routes\RemoveOccupies::class);
$app->get('/assocfooditemcategory', \ubceats\routes\AssociateFoodItemCategory::class);