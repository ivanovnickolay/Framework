<?php
/**
* 
*/
require_once ("./Lib/Controller/ControllerBase.php");

class First extends ControllerBase
{
	
	function __construct()
{
		parent::__construct();
	
}

public function First($name)	
{
	$Param= array('name' => $name);
	$this->View('First.tpl', $Param);
	
}



}