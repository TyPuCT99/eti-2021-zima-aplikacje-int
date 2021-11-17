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
        $body = new Layout(null, 'exceptions/pageNotFound');
        parent::__construct(
            $body,
            $headers,
            $status
        );
    }
}