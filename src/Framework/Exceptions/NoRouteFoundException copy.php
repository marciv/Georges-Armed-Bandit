<?php

namespace Georges\Framework\Exceptions;

	class NoRouteFoundException extends \Exception
	{
		public function __construct($message = "No route has been found for this path")
		{
			parent::__construct($message, "0002");
		}
	}
    