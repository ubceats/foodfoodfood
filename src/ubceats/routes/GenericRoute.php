<?php

namespace ubceats\routes;


use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

abstract class GenericRoute{
    protected $container;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }

    abstract public function __invoke(Request $request, Response $response, array $args);
}