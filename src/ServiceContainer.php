<?php

namespace App;

use App\Controllers\PageController;

class ServiceContainer
{
    private static $instance;

    private $services;

    private function __construct()
    {
        $this->services['router'] = function () {
            $router = new Router();

            $router->addRoute('home', [
                'path' => '/',
                'controller' => function () use ($router) {
                    return new PageController($router, 'home', 'default');
                }
            ]);
            $router->addRoute('article', [
                'path' => '/article',
                'controller' => function () use ($router) {
                    return new PageController($router, 'article', 'default');
                }
            ]);
            $router->addRoute('body', [
                'path' => '/body',
                'controller' => function () use ($router) {
                    return new PageController($router, 'body', 'default');
                }
            ]);

            $router->addRoute('invalid', [
                'path' => '/invalid'
            ]);

            return $router;
        };
    }

    /**
     * @return ServiceContainer
     */
    public static function getInstance(): ServiceContainer
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @param string $id
     * @return mixed
     * @throws \Exception
     */
    public function get(string $id)
    {
        if (!$this->has($id)) {
            throw new \Exception(sprintf('Selected service %s was not found...', $id));
        }

        return $this->services[$id]($this);
    }

    /**
     * @param string $id
     * @return bool
     */
    public function has(string $id)
    {
        return isset($this->services[$id]);
    }
}