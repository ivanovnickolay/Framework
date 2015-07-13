<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoadFromXML
 *
 * @author Администратор
 */
class LoadFromXML {
    
    /**
     * 
     */
    protected $XML; 
    
    /**
     * 
     * @param type $TypeConfig Указание из какой папки в подпапке Config загружать файл
     * @param type $XmlFileName Указание какой конкретно файл закружать 
     * @throws ExceptionBase  вывод ошибок при подключении к файлу
     */
    public function __construct($TypeConfig, $XmlFileName) {
     // $NameFile = '../Config/'.$TypeConfig.'/'.$XmlFileName.'.xml';
       $NameFile='E:\OpenServer522\OpenServer\domains\Task\Config\DB\DB.xml';
       if (file_exists($NameFile)){
        $this->XML= simplexml_load_file($NameFile);
            if ($this->XML === false) {
               //"Ошибка загрузки XML\n";
                foreach(libxml_get_errors() as $error) {
                   $ListErr=$error->message.'';
                   //throw new ExceptionBase($ListErr);
                   echo $ListErr;
                }
            }
       }  else {
           echo 'File not found';    
       }  
    }
    
    public function Load(){
       // $Attr = $this->XML->attributes();
            foreach($this->XML as $key => $value) {
                echo("[".$key ."] ".$value . "<br />");
            }
    }
 }
 
 $obj=new LoadFromXML("DB","DB");
 $obj->Load();
 
