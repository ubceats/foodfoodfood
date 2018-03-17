<?php

// Routes

$app->get('/', \ubceats\routes\Home::class);
$app->get('/about', \ubceats\routes\AboutThis::class);
$app->get('/list', \ubceats\routes\AllVenues::class);
$app->get('/search/{thing}', \ubceats\routes\Search::class);
$app->get('/vote/{foodItemId}/{direction}', \ubceats\routes\Vote::class);
$app->get('/login', \ubceats\routes\Login::class);