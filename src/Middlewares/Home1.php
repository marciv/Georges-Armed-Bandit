<?php
namespace Georges\Middlewares;

class Home1 extends \Georges\Framework\Middleware{

    function handle($httpRequest){

        // echo  "middleware 1 run";
        return parent::next($httpRequest);

    }


}



?>