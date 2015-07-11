<?php
require_once ("./Lib/Config/ConfigSingleton.php");
require_once ("../Exception/ExceptionBase.php");
/**
 * Класс подключается к базе данных и возвращает экземпляр 
 * класс построен по паттерну одиночка 
 * всегда есть только одно подключение к базе данных 
 * @author Администратор
 */
class DB {
    
    private static $instance;
    
    /**     
     * закрытый конструктор для подключения к базе данных 
     * @return \mysqli
     * @throws ExceptionBase
     */
    private function __construct() 
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
            throw new ExceptionBase("Ошибка подключения к Базе данных");
        }
        return $MySql; 
    }
    /**
     * Статическая функция которая возвращает подключение к базе данных
     * @return ссылку на подключение к база данных 
     */
    public static function DB()
   {
          if ( empty( self::$instance ) ) {
            self::$instance = new DB ();
        }
        return self::$instance;
   }
            
}
