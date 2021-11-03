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
        $router = new Router($this->getRoutes());
        $page = $router->match($this->request);

        $layout = new Layout($this->request, $page);
        $layout->render();
    }

    /**
     * @return string
     */
    public function getPage(): string
    {
        return $this->page;
    }

    /**
     * @return string[]
     */
    private function getRoutes(): array
    {
        return [
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
            ]
        ];
    }
}