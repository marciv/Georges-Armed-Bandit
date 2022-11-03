<?php

namespace Georges\Middlewares;

use Georges\Framework\Redirect;

class ExampleSetAuthMiddleware extends \Georges\Framework\Middleware
{
    function handle($httpRequest)
    {
        if ($httpRequest->getMethod() == 'POST') {
            if ($_POST['user'] == "admin" && $_POST['password'] == "1234") {
                $_SESSION['auth'] = true;
                $_SESSION['user'] = $_POST['user'];
                Redirect::with($httpRequest, ["new_params" => "LOOK my new params"]);
                Redirect::route("/exampleHome", $httpRequest);
            } else {
                flash('errorLogin', 'Wrong login, can you retry ?', 'danger');
            }
        }

        if (isset($_SESSION['auth']) && $_SESSION['auth'] = true) {
            Redirect::route("/exampleHome", $httpRequest);
        }
        return parent::next($httpRequest);
    }
}
