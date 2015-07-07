<?php

/**
 * Класс ответственный за проверку наличия файла контроллера и функции в нем 
 */
require_once ("./Lib/Request/URL.php");
require_once ("./Lib/Exception/ExceptionBase.php");

Class CallController
{
	private $Controller;
	private $Action;
	private $Param;
  private $ReflectorClass;

function __construct()
{
    $this->Controller="";
    $this->Action="";
    $this->Param="";
    // Получаем разобранную строку и 
    // присваеме значение пременным 
    $ArrayUrl=Url::RecognozeURL();
  //  var_dump($ArrayUrl);
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
	$Path = './Controller/'.$this->Controller.'.php';
	//Проверяем начилие файла 
	if (!file_exists($Path)) 
	{
            $S="File Controller ".$Path." Not found";
            throw new ExceptionBase($S, 1);
	}
	// Файл найден Подключаем его 
	include_once ("$Path");
  
	// Проверяем наличие в нем нужного класса
	if (!class_exists($this->Controller)) {throw new ExceptionBase("Class Controller not found", 2);}
	if (!$this->hasMethod()) {throw new ExceptionBase("Action not found", 3);}
  // Проверяем равенство параметров 
      // если список параметров не пуст и количество параметров которые переданы равен параметрам метода то 
     // запускаем метод
        if ((!is_null($this->Param)) and ($this->getCountParam()==count($this->Param))) {
            call_user_func_array(array( new $this->Controller() ,$this->Action, $this->Param));
        } 
      //если список параметров пуст и количество параметров метода равно нулю  то 
      // запускаем метод без параметров
        if ((is_null($this->Param)) and ($this->getCountParam()==0)) {
            call_user_func_array(array( new $this->Controller() ,$this->Action));}
            // иначе выдаем ошибку 
        else {throw new ExceptionBase("Count param not found", 3);}
  }

/**
 * Проверяем есть ли метод в указано классе 
 * http://ua2.php.net/manual/ru/reflectionclass.hasmethod.php
 * @return boolean истинно если метод есть и ложь если метода нет 
 */
public function hasMethod()
{
 if (class_exists($this->Controller)) {
  $this->ReflectorClass= new ReflectionClass($this->Controller);
    if (!$this->ReflectorClass->hasMethod($this->Action)) 
      { return false;} 
       else { return true;}
 } else {return false;}
  
}


/** Узнаем количество параметров в методе который будем вызывать возвращаем количество параметров
 * @return CountParam количесво параметров в методе 
 */
public function getCountParam()
{
 $CountParam = $this->ReflectorClass->getMethod($this->Action)->getnumberofparameters();
 return $CountParam;
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
///
//
}