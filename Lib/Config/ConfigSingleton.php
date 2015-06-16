<?php

/**
 * ConfigSingleton используется для хранения информации о конфигурации 
 * которая будет получена из файлов конфигурации
 *
 * @author Администратор
 */
class ConfigSingleton 
{
    /**
     *
     * @var $props массив который хранит информацию 
     * массив двух мерный 
     *    первый уровень TypeConfig тип конфигурации 
     *    второй уровень массив ключ = значение 
     */
    private $props = array();
    private static $instance;

    private function __construct() { }

    public static function init() {
        if ( empty( self::$instance ) ) {
            self::$instance = new ConfigSingleton();
        }
        return self::$instance;
    }

    /**
     * 
     * @param type $TypeConfig тип конфигурации
     * @param type $key параметр конфигурции
     * @param type $val значение параметра конфигурации 
     */
    public function setValue( $TypeConfig, $key, $val ) 
    {
        /** 
         * TODO 
         * написать проверку на запрет сохранения значения под одиним и тем же $key_
         * проводить очистку $val от "левых" значений 
         */
               
        $key_=$TypeConfig."_".$key;
        $this->props [$key_] = $val;
    }

    public function getValue( $TypeConfig, $key ) 
    {
        $key_=$TypeConfig."_".$key;
        // array_key_exists — Проверяет, присутствует ли в массиве указанный ключ или индекс
        if (!array_key_exists ($key_,$this->props)) {
            $message = "Key  $key_  not found to ConfigSingleton !! ";
           throw new Exception($message);
        }
        return $this->props[$key_]; 
    }
}
