<?php

/**
 * Класс ответственный за проверку наличия файла контроллера и функции в нем 
 */
require_once ("./Lib/Request/URL.php");

Class CallController
{
	private $Controller;
	private $Action;
	private $Param;

function __construct()
{
    $this->Controller="";
    $this->Action="";
    $this->Param="";
    // Получаем разобранную строку и 
    // присваеме значение пременным 
    $ArrayUrl=Url::RecognozeURL();
    $this->Controller=$ArrayUrl['Controller'];
    $this->Action=$ArrayUrl['Action'];
    $this->Param=$ArrayUrl['Param'];
}

/**
 * Функция проверяет наличие файла контроллера в системе 
 * и если все хорошо то возвращает путь к нему 
 * при отсутствии файла генерирует ошибку   
 **/
public function Call()
{
	$Path = "Controller/$this->Controller.php";
	//Проверяем начилие файла 
	if (!file_exists($Path)) 
	{
		$S="File Controller ".$Path." Not found";
	 throw new Exception($S, 1);
	}
	// Файл найден Подключаем его 
	require_once '$Path';
	// Проверяем наличие в нем нужного класса
	if (!class_exists($Controller)) 
	{
		throw new Exception("Class Controller not found", 2);
	}
	$Obj = new $Controller ();
	if (!method_exists($Obj, $this->Action)) 
	{
	throw new Exception("Action в класса Контроллера не найден", 3);
	}
	//
	call_user_func_array(array($Obj,$this->Action),$this->Param);
}

// http://ua2.php.net/manual/ru/reflectionfunctionabstract.getnumberofparameters.php
//<?php
       // $this->method_args_count = $this->CReflection
         //   ->getMethod($Route->getMethod())
           // ->getNumberOfParameters();
        //Maybe be 5 but if uri is /controller/method/single_param/ we only of 1
        //$this->params = $Route->getParams(); //0 in some cases

        //if($this->method_args_count > count($this->params))
        //{
         //   $this->difference = ($this->method_args_count - count($this->params));
          //  for($i=0;$i<=$this->difference;$i++)
           // {
            //    $this->params[] = false;
            //}
        //}
        
        //Call the method with correct amount of params
        // but as false for params that have not been passed!
      //  call_user_func_array(array(new $this->obj,$Route->getMethod()),$this->params);
//?>

}
?>