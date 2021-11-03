<?php

namespace App;

use App\Controllers\SimpleController;

class ServiceContainer
{
    private static $instance;

    private $services;

    private function __construct()
    {
        $this->services['router'] = new Router(
            [
            'homepage' => [
                'path'=>'/',
                'page'=>'home'
            ],
            'article' => [
                'path'=>'/article/{id}',
                'page'=>'article'
            ],
            'body'=> [
                'path'=>'/body',
                'page'=>'body'
            ],
                'responseTest'=> [
                    'path' => '/jsonTest',
                    'controller' => new  SimpleController()
    ]
        ]
        );

    }
    public static function getInstance(): ServiceContainer
    {
        if(!isset(self::$instance)){
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function get(string $id)
    {
         if(!$this->has($id)){
             throw new \Exception(sprintf('Selected service %s was not found...', $id));

         }
         return $this->services[$id];
    }

    public function has(string $id)
    {
        return isset($this->services[$id]);
    }
}