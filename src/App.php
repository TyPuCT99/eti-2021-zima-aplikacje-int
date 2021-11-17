<?php

namespace App;

use App\Controllers\ControllerInterface;
use App\Response\PageNotFoundResponse;
use mysql_xdevapi\Exception;

/**
 * Application entry point.
 */
class App
{
    /**
     * @var string
     */
    private $page;

    /**
     * @var Request
     */
    private $request;

    /**
     * Uruchamia aplikację.
     */
    public function run(): void
    {
        $this->request = Request::initialize();

        $serviceContainer = ServiceContainer::getInstance();

        $router = $serviceContainer->get('router');

        try{
            $matchedRoute = $router->match($this->request);
            $response = $matchedRoute($this->request);
        }catch(Exception $exception) {
            $response = new PageNotFoundResponse();
        }

        foreach($response->getHeaders() as $header) {
            header($header);
        }

        echo $response->getBody();

    }
}