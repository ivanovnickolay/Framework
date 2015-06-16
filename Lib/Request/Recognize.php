<?php  

/**
 * Класс аналидирует полученный массив от class Url 
 * и проверяет наличие всех параметров 
 */
require '../Request/Url.php';

class RecognozeURL
{
	
	static function RecognozeURL ()
	{
			// получаем массив розобранного входящего URL
			$Array_url= $URL::getURLRequest();
			// анализируем его
			if (empty($Array_url[0])) 
			{
				// нам ввели пустой запрос в корень "/"
				$Array_recog['Controller'] = 'default';
				$Array_recog['Action'] = 'default';
				$Array_recog['Param'] = 'default';
				return $Array_recog;
			}		
			if (empty($Array_url[1)) 
			{
				// нам ввели запрос в корень "/Controller/"
				$Array_recog['Controller'] = $Array_url[0];
				$Array_recog['Action'] = 'default';
				$Array_recog['Param'] = 'default';
				return $Array_recog;
			}
			if (empty($Array_url[2)) 
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


