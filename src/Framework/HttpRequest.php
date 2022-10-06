<?php

namespace Georges\Framework;
use Illuminate\Http\Request;

class HttpRequest
{

	private	 	$_param;
	private	 	$_paramAll;
	private	 	$_method;
	private	 	$_route;
	public		$request;
	
	function __construct()
	{
		$this->request= Request::capture();
		$this->_method = $this->request->method();
		$this->_param = array();
		$this->_paramAll = $this->request->all();
		$this->bindParam();

	}
	
	public function getUrl()
	{
		return  $this->request->fullUrl();	
	}

	public function getPath()
	{
		return '/'.ltrim($this->request->path(),"/");
	}	
	
	public function getMethod()
	{
		return  $this->_method;
	}
	
	public function getParams()
	{
		return $this->_param;
	}

	public function setRoute($route)
	{
		$this->_route = $route;	
	}
	
	public function bindParam()
	{
		switch($this->_method){
			case "GET":
			case "DELETE":							
				$this->_param=$this->request->query();
			break;
			case "POST":
			case "PUT":
				$this->_param=$this->request->post();
			break;
		}
	}
	public function getRoute()
	{
		return $this->_route;	
	}
	
	public function run()
	{
		$this->bindParam();
		$this->_route->run($this);
	}	
	
}