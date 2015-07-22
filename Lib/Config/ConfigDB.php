<?php

/**
 * ConfigDB * Класс расширяет базовый класс ConfigBase
 * в части выборки данных о подключении с безе данных с файлов конфигурации
 *
 * @author Администратор
 */
include_once './ConfigBase.php';
class ConfigDB extends ConfigBase
{
    /**
     *
     * @var $Id - Id раздела в ХМЛ файле с конфигурацией
     * подключения к базе данных 
     */
    private $Id;
            function __construct($TypeConfig, $Name, $Id) 
    {
            parent::__construct($TypeConfig, $Name);
            $this->Id = $Id;
    }
    
    function ValidAction()
    {
	$DomElement=$this->getXMLElementById($this->Id);
        $Config = ConfigSingleton::init();
	    foreach ($DomElement as $Elem) 
            {
             $IdValue= $Elem->getAttribute('ID'); 
             $Config->SetValue($this->TypeConfig,'ID',$IdValue);
             // Host
             $XmlHost=$Elem->getElementsByTagName('host');
             $Host=$XmlHost->item(0)->nodeValue;
             $Config->SetValue($this->TypeConfig,'host',$Host);
             // username
             $Xmlusername=$Elem->getElementsByTagName('username');
             $username=$Xmlusername->item(0)->nodeValue;
             $Config->SetValue($this->TypeConfig,'username',$username);
             // passwd
             $Xmlpasswd=$Elem->getElementsByTagName('passwd');
             $passwd=$Xmlpasswd->item(0)->nodeValue;
             $Config->SetValue($this->TypeConfig,'passwd',$passwd);
             //dbname
             $Xmldbname=$Elem->getElementsByTagName('dbname');
             $dbname=$Xmldbname->item(0)->nodeValue;
             $Config->SetValue($this->TypeConfig,'dbname',$dbname);
             //port
             $Xmlport=$Elem->getElementsByTagName('port');
             $port=$Xmlport->item(0)->nodeValue;
             $Config->SetValue($this->TypeConfig,'port',$port);
             //socket
             $Xmlsocket=$Elem->getElementsByTagName('socket');
             $socket=$Xmlsocket->item(0)->nodeValue;
             $Config->SetValue($this->TypeConfig,'socket',$socket);
            }    
    }
}
