<?php


namespace App\Response;


use App\Layout;

class PageNotFoundResponse extends Response
{

    public function __construct(
        array $headers = [],
        int $status = 404
    )
    {
        $layout = new Layout(null, 'errors/pageNotFound');
        $body = $layout->render();
        parent::__construct(
            $body,
            $headers,
            $status
        );
    }
}