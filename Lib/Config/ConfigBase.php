<?php
/**
 * Класс реализует базовые возможности работы с файлами конфигурации в формате XML
 * А именно :
 * - подкючение к выбранному файлу конфигурации
 * -реализация поиска по установленному Id
 *
 * @author Администратор
 */
abstract class ConfigBase 
{
   /**
    * @var $xml_element глобальная переменная содержит XML файл
    * @var $TypeConfig переменная используется для создания записей в 
    *                   ConfigSingleton->setValue( $TypeConfig, $key, $val ) 
     */
    private $xml_element;
    protected $TypeConfig;


    /**
     * Формирует путь к файлу конфигурации и подключается к нему
     * значения файла загружаются в $xml_element
     * Если файл не найден - выдается ошибка
     * @var $TypeConfig тип конфигурации (под папка в папке Config в которой находятся файлы 
     * @var $Name наименование файла 
     */
    function __construct($TypeConfig, $Name) 
    {
      $NameFile = './Config/'.$TypeConfig.'/'.$Name.'.xml';
      $this->TypeConfig=$TypeConfig;
      $this->LoadXML($NameFile);
    }
    
    /**
     * Возвращает группу элементов в файле XML с указаным id 
     * @param type $id 
     * @return type группа элементов 
     */
    protected function getXMLElementById($id)
    {
        $xpath = new DOMXPath($this->xml_element);
        return $xpath->query("//*[@id='$id']");
    }
    /**
     * Функция проводит загрузку файла ХМЛ 
     * @param type $NameFile наименование файла с путем к нему 
     * возвращает 
     *      TRUE если файл загружен без ошибок
     *      FALSE если при загрузке файла были ошибки (не найден файл) 
     */
    protected function LoadXML($NameFile) 
    {
      if(file_exists($NameFile))
		{
                    //$this->xml_element = simplexml_load_file($NameFile);
                    $this->xml_element = new DOMDocument;
                     //������ ��� ��������� �� id, �������� ����� ���������
                    $this->xml_element->validateOnParse = true;
                    $this->xml_element->Load($NameFile);
                    return TRUE;
                } else 
		{
                    echo "Файл не найден"."</br>";
                    return FALSE;
		}  
    }
    abstract function ValidAction();
    
}
    
