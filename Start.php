<?php
//namespace FreamWork;
//require_once ("./Lib/Config/ConfigBoot.php");
//require_once ("./Lib/Config/ConfigSingleton.php");
//require_once ("./Lib/Config/ConfigObserver.php");
//require_once ("./Lib/DB/DB.php");
require_once ("./Lib/Request/Url.php");
require_once ("./Lib/Controller/CallController.php");
require_once ("./Lib/Exception/ExceptionBase.php");

// Задаем корневой каталог по умолчанию 
define('PATH_ROOT', $_SERVER['DOCUMENT_ROOT']);

$Controller = new CallController();
try 
{
$Controller->Call();	
} 
catch (ExceptionBase $e) 
{
	echo $e->getError();
}





