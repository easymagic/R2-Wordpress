<?php
 class request extends container{
  
  private $bucket;

 
  function __construct(&$app){
   parent::__construct($app); 
   $this->bucket =& $_REQUEST;
  }

 
  function __get($k){
   if (isset($this->bucket[$k])){
    return $this->bucket[$k];
   }else{
    return  '';
   }
  }

  function __set($k,$v){
   $this->bucket[$k] = $v;
  }

  function __isset($k){
   return isset($this->bucket[$k]);
  }
  
  function syncIn($dt){
   foreach ($dt as $k => $v) {
   	$this->$k = $v;
   }
  }


  function all(){
    return $this->bucket;
  }

  function all_array(){
    return array($this);
  }

  function isLive(){//special for sessions
  	return (isset($this->bucket['session']));
  }

  function kill(){
   $this->bucket = array();	
  }

  function clear(){
    foreach ($this->bucket as $k=>$v){
     $this->bucket[$k] = '';
    }
  }
  
  function zip($dt){
   $r = ($this->storeZip == 'null')? array() : $this->storeZip;
   foreach ($dt as $k=>$v){
    $r[$k] = $v;
   }
   $this->storeZip = $r;
  }
  
  
  


 }

?>