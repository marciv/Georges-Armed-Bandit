<?php

namespace Georges\Middlewares;

class ExampleAuthMiddleware extends \Georges\Framework\Middleware
{
    function handle($httpRequest)
    {
        if ($httpRequest->getParams()['user'] == "admin" && $httpRequest->getParams()['password'] == "1234") {
            $auth = true;
        } else {
            return redirect("/exampleLogin", $httpRequest->getParams());
        }

        return parent::next($httpRequest);
    }
}
