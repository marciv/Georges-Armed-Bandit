<?php
return
    array(
        [
            'path' => "/exampleHome",
            'middleware' => \Georges\Middlewares\ExampleAuthMiddleware::class
        ],
        [
            'path' => "/exampleLogin",
            'middleware' => \Georges\Middlewares\ExampleSetAuthMiddleware::class
        ]
    );
