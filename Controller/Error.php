<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Error
 *
 * @author Администратор
 */
require_once ("./Lib/Controller/ControllerBase.php");
class Error extends ControllerBase
{
	
	function __construct()
{
		parent::__construct();
	
}

public function ViewErrror(array $Err )	
{
        $Param= array('exc' => $Err);
	$this->View('Error.tpl', $Param);
}
}