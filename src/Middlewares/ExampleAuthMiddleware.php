<?php

namespace Georges\Middlewares;

class ExampleAuthMiddleware extends \Georges\Framework\Middleware
{
    function handle($httpRequest)
    {
        if (isset($_SESSION['auth']) && $_SESSION['auth'] == true) {
        } else {
            redirect("/exampleLogin");
        }
        return parent::next($httpRequest);
    }
}
