<?php

namespace Georges\Middlewares;

class ExampleSetAuthMiddleware extends \Georges\Framework\Middleware
{
    function handle($httpRequest)
    {
        if ($httpRequest->getMethod() == 'POST') {
            if ($_POST['user'] == "admin" && $_POST['password'] == "1234") {
                $_SESSION['auth'] = true;
                $_SESSION['user'] = $_POST['user'];
                redirect("/exampleHome");
            } else {
                echo "Mauvais identifiant de connexion";
            }
        }

        if (isset($_SESSION['auth']) && $_SESSION['auth'] = true) {
            redirect("/exampleHome");
        }
        return parent::next($httpRequest);
    }
}
