<?php
 class container{
  

   protected $app = null;

   private $data = array();

   function __construct(&$app){
    $this->app =& $app;
   }   

   function __set($k,$v){
    if (!isset($this->data[$k])){
     $this->data[$k] = $v;
    }
   }

   function __get($k){
    if (isset($this->data[$k])){
     return $this->data[$k];
    }else{
     return 'null';
    }
   }

   function all(){
    return $this->data;
   }


   function load_controller($ctrl,$alias=''){
     
     if (empty($alias)){
       $name = $ctrl;
     }else{
       $name = $alias;
     }

     // echo $name;

     $this->$name = $this->app->controller->$ctrl;

   }


   function load_model($mdl,$alias=''){
     if (empty($alias)){
       $name = $mdl;
     }else{
       $name = $alias;
     }

     $this->$name = $this->app->model->$mdl;

   }


   function load_use_case($usecase_parent,$usecase_child,$alias=''){
     if (empty($alias)){
        $name = $usecase_child;
     }else{
        $name = $alias;
     }

     $this->$name = $this->app->$usecase_parent->$usecase_child;

   }


   function load_lib($lib,$alias=''){
     if (empty($alias)){
       $name = $lib;
     }else{
       $name = $alias;
     }

     $this->$name = $this->app->lib->$lib;

   }

   function load_plugin($plg,$alias=''){

     if (empty($alias)){
       $name = $plg;
     }else{
       $name = $alias;
     }

     $this->$name = $this->app->plugin->$plg;

   }
 




 }

?>