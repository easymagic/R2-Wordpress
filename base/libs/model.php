<?php
 class model extends container{
  

   
   
   
   protected $db = null;
   protected $request = null;
   protected $model = null;

   function __construct(&$app){
    parent::__construct($app);
    $this->db = $this->app->lib->db;
    $this->model = $this->app->model;
    $this->request = $this->app->request;
   }    



 

 }

?>