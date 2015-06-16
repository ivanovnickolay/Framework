<?php
/**
 * Класс расширяет базовый класс ConfigBase
 * в части выборки данных с файлов маршрутизации 
 */
require_once ("./Lib/Config/ConfigBase.php");
require_once ("./Lib/Config/ConfigSingleton.php");
class ConfigRouting extends ConfigBase
{
/**
 *
 * @var $xml_element содержит XML 
 * @var $Id - Id раздела в ХМЛ файле с конфигурацией
 */
   private $xml_element;
   private $Id;
           function __construct($Controller,$Action) 
    {
            parent::__construct('Routing', $Controller);
            $this->Id=$Action;
    }
/**
 * @param type $Id получение данных из файла XML
 * с секцией с указаным Id
 */   
function ValidAction()
    {
	$DomElement=$this->getXMLElementById($this->Id);
        $Config = ConfigSingleton::init();
	    foreach ($DomElement as $Elem) 
            {
             $IdValue= $Elem->getAttribute('ID'); 
             $Config->SetValue($this->TypeConfig,'ID',$IdValue);
             $XmlName=$Elem->getElementsByTagName('name');
             $Name=$XmlName->item(0)->nodeValue;
             $Config->SetValue($this->TypeConfig,'name',$Name);
            }    
    }
}
//echo phpinfo();
