<?php
 class controller extends container{
  

   
   
   protected $model = null;
   protected $db = null;
   protected $view = null;
   protected $controller = null;

   protected $request = null;
   protected $auth = null;
   protected $sess = null;

   protected $plugin =  null;

   function __construct(&$app){
    parent::__construct($app);
    $this->model = $this->app->model;
    $this->controller = $this->app->controller;
    $this->plugin = $this->app->plugin;
    
    $this->request = $this->app->lib->request;
    $this->auth = $this->app->lib->auth;
    $this->sess = $this->app->lib->sess;
    //echo 'Loading view ...';
    //print_r($this->app->lib);
    $this->view = $this->app->lib->view;
    $this->db = $this->app->lib->db;
   }    



 

 }

?>