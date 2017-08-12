<?php 
 class controller extends container{
   
   protected $view = null;
   protected $model = null;
   protected $controller = null;

   function __construct(&$app){
    parent::__construct($app);
    $this->view = $this->app->lib->view;
    $this->model = $this->app->model;
    $this->controller = $this->app->controller;
   }    


 }
?>