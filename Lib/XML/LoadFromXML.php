<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoadFromXML
 * Загрузка и обработка файлов XML
 *  @author Администратор
 */
class LoadFromXML {
    
    /**
     * Хранит загруженный файл 
     */
    protected $XML; 
    
    protected $ArrXML;


    /**
     * @param type $TypeConfig Указание из какой папки в подпапке Config загружать файл
     * @param type $XmlFileName Указание какой конкретно файл закружать 
     * @throws ExceptionBase  вывод ошибок при подключении к файлу и при 
     * отсутствиии файла 
     */
    public function __construct($TypeConfig, $XmlFileName) {
 //   define('PATH_ROOT', $_SERVER['DOCUMENT_ROOT']);
        $NameFile =PATH_ROOT."/Config/$TypeConfig/$XmlFileName.xml";
        if (file_exists($NameFile)){
        $this->XML= simplexml_load_file($NameFile);
            if ($this->XML === false) {
                foreach(libxml_get_errors() as $error) {
                   $ListErr=$error->message.'';
                }
                throw new ExceptionBase($ListErr);
            }
       }  else {throw new ExceptionBase("File $NameFile not found");}  
    }
    /**
     * Загружает данные файла в Хеш-массив ArrXML
     * @return ArrXML атрибут в ключе а значение атрибута в значенни 
     */
    
    public function Load(){
        if(isset($this->XML)){   
            foreach($this->XML as $key => $value) {
                // echo("[".$key ."] ".$value . "<br />");
                $this->ArrXML[$key]=$value;
            }
        }else{echo 'Error'; }    
    return $this->ArrXML;
    }
 }
