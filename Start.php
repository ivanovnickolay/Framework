<?php
//namespace FreamWork;
//require_once ("./Lib/Config/ConfigBoot.php");
//require_once ("./Lib/Config/ConfigSingleton.php");
//require_once ("./Lib/Config/ConfigObserver.php");
//require_once ("./Lib/DB/DB.php");
require_once ("./Lib/Request/Url.php");
require_once ("./Lib/Controller/CallController.php");

define('PATH_ROOT', dirname(__FILE__));

$Controller = new CallController();
try 
{
$Controller->Call();	
} 
catch (Exception $e) 
{
	echo $e->getMessage();
}





