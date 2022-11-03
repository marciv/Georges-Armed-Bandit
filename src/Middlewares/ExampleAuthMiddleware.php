<?php

namespace Georges\Middlewares;

use Georges\Framework\Redirect;

class ExampleAuthMiddleware extends \Georges\Framework\Middleware
{
    function handle($httpRequest)
    {
        if (isset($_SESSION['auth']) && $_SESSION['auth'] == true) {
        } else {
            Redirect::route("/exampleLogin", $httpRequest);
        }
        return parent::next($httpRequest);
    }
}
