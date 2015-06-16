<?php
namespace FreamWork;
require_once ("./Lib/Config/ConfigBoot.php");
require_once ("./Lib/Config/ConfigSingleton.php");
require_once ("./Lib/Config/ConfigObserver.php");
require_once ("./Lib/DB/DB.php");
require_once ("./Lib/Request/Url.php");

$Controller = new callController();
$Controller.Call();




