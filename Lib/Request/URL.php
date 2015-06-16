<?php
/**
 * Класс возвращает параметры запроса 
 * разложенные по названию контроллера, действия и параметрам
 */
 namespace FreamWork;
 
  class Url 
  {
  	/**
     *Возвращает разобранную строку как массив 
     *@param str строка которая подлежит разбору
     **/  

    static function getURLRequest($str) 
  	{
  		// получаем массив значений из URI, который был передан для того, чтобы получить доступ к этой странице. 
  		//return  explode($_SERVER['REQUEST_URI'], '/') ;
      return  explode($str, '/') ;
  		
  	}
  	/**
     * Статическая функция 
     * Вызывает getURLRequest для развития входящего запроса 
     * Возвращает массив 
     * @return массив $Array_recog вида 
     * $Array_recog['Controller']
     * $Array_recog['Action'] 
     * $Array_recog['Param'] 
     **/ 

    static function RecognozeURL ()
  {
      // получаем массив розобранного входящего URL
      $Array_url= self::getURLRequest($_SERVER['REQUEST_URI']);
      // анализируем его
      if (empty($Array_url[0])) 
      {
        // нам ввели пустой запрос в корень "/"
        $Array_recog['Controller'] = 'default';
        $Array_recog['Action'] = 'default';
        $Array_recog['Param'] = 'default';
        return $Array_recog;
      }   
      if (empty($Array_url[1])) 
      {
        // нам ввели запрос в корень "/Controller/"
        $Array_recog['Controller'] = $Array_url[0];
        $Array_recog['Action'] = 'default';
        $Array_recog['Param'] = 'default';
        return $Array_recog;
      }
      if (empty($Array_url[2]))
      {
        // нам ввели запрос в корень "/Controller/action/"
        $Array_recog['Controller'] = $Array_url[0];
        $Array_recog['Action'] = $Array_url[1];
        $Array_recog['Param'] = 'default';
        return $Array_recog;
      } else
      {
        // нам ввели запрос в корень "/Controller/action/param"
        $Array_recog['Controller'] = $Array_url[0];
        $Array_recog['Action'] = $Array_url[1];
        // в параметры передаем все полученные значения после Action 
        $Array_recog['Param'] = array_slice($Array_url, 2);
        return $Array_recog;
      }
  } 
}
?>