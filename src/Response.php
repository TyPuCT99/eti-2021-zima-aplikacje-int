<?php

namespace App;

class Response
{
private $headers;
private $body;
private $status;


    public function __construct($body, array $headers = [], int $status = 200)
    {
        $this->body = $body;
        $this->headers = $headers;
        $this->status = $status;
    }

    public function getHeaders(){
        $genericHeaders = [
            sprintf('HTTP/1.1 %s', $this->status),
            sprintf('Content-Length: %s', strlen($this->body))
        ];
        return array_merge($genericHeaders, $this->headers);

    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }
}