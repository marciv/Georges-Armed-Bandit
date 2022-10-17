<?php
namespace Georges\Middlewares;

class Home2 extends \Georges\Framework\Middleware{

    function handle($httpRequest){

        // echo  "middleware 2 run";
        return parent::next($httpRequest);

    }


}



?>