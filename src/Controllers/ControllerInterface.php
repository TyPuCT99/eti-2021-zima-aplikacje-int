<?php

namespace App\Controllers;
use App\Layout;
use App\Request;
use App\Response\Response;

interface ControllerInterface
{
    public function __invoke(Request $request): Response;


}