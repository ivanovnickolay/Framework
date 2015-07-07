<?php
/**
 * Description of ExceptionBase
 * реализует базовую обработку исключений 
 * расширяет базовый класс Exception PHP
 * @author Администратор
 */
require_once ("./Controller/Error.php");
class ExceptionBase extends Exception{
    public function __construct($message, $code = 0, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }
    public function getArray() {
       $Array['message']=$this->message;
       $Array['code']=  $this->code;
       $Array['file']=  $this->file;
       $Array['line']=  $this->line;
       return $Array;
    }
    public function getError() {
      $View=new Error();
      $View->ViewErrror($this->getArray());
    }
            
    }

