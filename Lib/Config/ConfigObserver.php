<?php


/**
 * Реализация шаблона Наблюдатель
 * в котором регистрируются все объекты для чтения конфигурации 
 *
 * @author Администратор
 */
//require_once './ConfigBase.php';
class ConfigObserver 
{
    
    private $configs = array();
    
    public function __construct() 
    {
    }

    /**
     * Добавление объекта наблюдения
     * @param ConfigBase $Config
     */
    public function attach(ConfigBase $Config) 
    {
        $this->configs[] = $Config;
    }
    
    //remove observer
    public function detach(ConfigBase $Config) {
        
        $key = array_search($Config,$this->configs, true);
        if($key){
            unset($this->configs[$key]);
        }
    }
        
    /**
     * Обход по всем объектам наблюдения и вызов функции 
     */
    public function Execute() 
    {
        foreach ($this->configs as $value) 
        {
            $value->ValidAction();
        }
    }
}

