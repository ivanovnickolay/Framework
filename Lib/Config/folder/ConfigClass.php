<?php
class ConfigClass 
{
	// ��� ����� 
private $xml_element;
function __construct($TypeConfig, $Name) 
{
//libxml_use_internal_errors(true);
    //$NameFile = './Config/Routing/'.$Name.'.xml';
      $NameFile = './Config/'.$TypeConfig.'/'.$Name.'.xml';
        echo "$NameFile "."</br>";
            if(file_exists($NameFile))
		{
                    //$this->xml_element = simplexml_load_file($NameFile);
                    $this->xml_element = new DOMDocument;
                     //������ ��� ��������� �� id, �������� ����� ���������
                    $this->xml_element->validateOnParse = true;
                    $this->xml_element->Load($NameFile);
                    echo "file_exists"."</br>";
		} else 
		{
                    echo "file NO exists"."</br>";
		}
}
	function ValidAction($Action)
	{
	// �������� �� ������� � ����� �������� � ������� $Action
           //$DomElement=$this->xml_element->getElementsByTagName('action');
           //$DomElement=$this->xml_element->getElementById("add");
	$DomElement=$this->getXMLElementById($Action);
	    foreach ($DomElement as $Elem) 
            {
             $IdValue= $Elem->getAttribute('ID'); 
             $XmlName=$Elem->getElementsByTagName('name');
             $Name=$XmlName->item(0)->nodeValue;
             echo "$Name - $IdValue"."</br>";
            }    
    }

private	function getXMLElementById($id)
{
    // ищет в ХМЛ файле записи с указаным $id
    $xpath = new DOMXPath($this->xml_element);
    return $xpath->query("//*[@id='$id']");
}

}
//echo phpinfo();
?>