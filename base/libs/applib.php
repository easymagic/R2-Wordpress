<?php 
 class applib{

  private $data = array();

    function __set($k,$v){
      $this->data[$k] = $v;
    }

    function __get($k){
     if (isset($this->data[$k])){
      return $this->data[$k];  
     }else{
      return 'null';
     }
    }



 }
?>