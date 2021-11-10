<?php

namespace App;

use App\Controllers\ControllerInterface;

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
//        try {
//            echo 'Przed wyjatkiem';
//            throw new PageNotFoundException;
//        } catch(PageNotFoundException $exception) {
//            echo 'Page not found';
//        } catch (ServiceNotFoundException $exception) {
//            echo 'Servicee not found';
//        }catch (\Exception $exception){
//            echo 'other';
//
//        }

        //$this->processRouting();
        $this->request = Request::initialize();
        $serviceContainer = ServiceContainer::getInstance();
        $router = $serviceContainer->get('router');

        /** @var Router $router */
        $matchedRoute = $router->match($this->request);
        $response = $matchedRoute($this->request);
        foreach ($response->getHeaders() as $header) {
                header($header);
        }

        echo $response->getBody();

    }

}