<?php
require_once ("./Lib/Config/ConfigSingleton.php");
/**
 * Класс подключается к базе данных и вохвращает экземпляр 
 *
 * @author Администратор
 */
class DB {
    function __construct() 
    {
        $Conf = ConfigSingleton::init();
        $host = $Conf->getValue('DB','host');
        $user = $Conf->getValue('DB','username');
        $password= $Conf->getValue('DB','passwd');
        $database = $Conf->getValue('DB','dbname');
        $port = $Conf->getValue('DB','port');
        $socket= $Conf->getValue('DB','socket');
        $MySql = new mysqli($host, $user, $password, $database, $port, $socket);
        if ($MySql->connect_error) 
        {
        die('Ошибка подключения (' . $MySql->connect_errno. ') '. $MySql->connect_error);
        }
        return $MySql; 
    }
}
