<?php

namespace App\Controllers;
use App\Request;
use App\Response;

class SimpleController implements ControllerInterface
{
    public function __invoke(Request $request): Response
    {
        $body = [
            'Some test value',
            'param1' => 'value 1'
        ];
        $additionalHeaders = ['Content-Type: application/json'];
        return new Response(json_encode($body), $additionalHeaders);
    }
}