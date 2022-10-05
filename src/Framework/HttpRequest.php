<?php

namespace Georges\Framework;
use Illuminate\Http\Request;

class HttpRequest
{
	public	 	$url;
	public		$method;
	public	 	$param;
	public 		$request;
	
	function __construct()
	{
		$this->request= Request::capture();
	}
	
	public function getUrl()
	{
		return  $this->request->fullUrl();	
	}

	public function getPath()
	{
		return  $this->request->path();	
	}	
	
	public function getMethod()
	{
		return  $this->request->method();
	}
	
	public function getParams()
	{
		return $this->request->all();
	}
	
}