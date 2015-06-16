<?php

/**
 * Класс ответственный за проверку наличия файла контроллера и функции в нем 
 */
include_once '../Request/URL.php';
Class CallController
{
	private $Controller;
	private $Action;
	private $Param;

function __Controller()
{
    // Получаем разобранную строку и 
    // присваеме значение пременным 
    $ArrayUrl=URL::RecognozeURL();
    $Controller=$ArrayUrl['Controller'];
    $Action=$ArrayUrl['Action'];
    $Param=$ArrayUrl['Param'];
}

/**
 * Функция проверяет наличие файла контроллера в системе 
 * и если все хорошо то возвращает путь к нему 
 * при отсутствии файла генерирует ошибку   
 **/
public function Call()
{
	$Path = "Controller/.$Controller.php";
	//Проверяем начилие файла 
	if (!file_exists($Path)) 
	{
	 throw new Exception("Файл Контроллера не найден", 1);
	}
	// Файл найден Подключаем его 
	require_once '$Path';
	// Проверяем наличие в нем нужного класса
	if (!class_exists($Controller)) 
	{
		throw new Exception("Класс Контроллера не найден", 1);
	}
	$Obj = new $Controller ();
	if (!method_exists($Obj, $Action)) 
	{
	throw new Exception("Action в класса Контроллера не найден", 1);
	}
	//call_user_func_array — Вызывает пользовательскую функцию с массивом параметров
	//
	call_user_func_array(array($Obj,$Action),$Param);
}

}
?>