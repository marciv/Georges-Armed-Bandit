<?php

namespace Georges\Middlewares;

class ExampleMiddleware extends \Georges\Framework\Middleware
{

    function handle($httpRequest)
    {

        echo  "ExampleMiddleware run";
        return parent::next($httpRequest);
    }
}
