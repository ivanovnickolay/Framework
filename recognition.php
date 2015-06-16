<?php
// строка запроса 
$request ="controller/action/param1/param2/param3";
$array_req=  explode('/', $request );
//получаем значения контролера и действия 
if ($array_req[0]) 
    {
    $Controller = $array_req[0];
    echo "Controller = $Controller </br>";
    };
if ($array_req[1]) 
    {
    $Action = $array_req[1];
    echo "Action = $Action </br>";
    };

// паттерн запроса с параметрами 
$pattern="controller/action/{id4545}/{454}/{hfhf}";
$array_pat = explode('/', $pattern);


// если количество элементов массива совпадает то и строка и паттерн совпадают 
// и в число элементов в массиве больше 2 - есть параметры
$cnt_pat = count($array_pat);
echo "$cnt_pat </br>"; ;
$cnt_req =count($array_req); 
echo "$cnt_req</br>";
if ($cnt_pat==$cnt_req)
{
    // обходим массив pattern
    $array_req_param = array_slice($array_req, 2);
    var_dump($array_req_param);
    $array_pat_param = array_slice($array_pat, 2);
    var_dump($array_pat_param);
    $i = 0;
    foreach ($array_pat_param as $value) 
    {
        $Count_val = strlen($value);
        $str = substr($value,1, $Count_val-2);
        $array_key[$i]=$str;
        $i++;
    }
} 
else {
echo 'Error';    
}

$array_key_value=  array_combine($array_key, $array_req_param);
var_dump($array_key_value);

