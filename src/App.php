<?php

namespace App;

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
        //$this->processRouting();
        $this->request = Request::initialize();
        $serviceContainer = ServiceContainer::getInstance();
        $router = $serviceContainer->get('router');

        $page = $router->match($this->request);

        $layout = new Layout($this->request, $page);

        $layout->render();
    }
}
