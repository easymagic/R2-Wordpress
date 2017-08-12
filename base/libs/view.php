<?php
 class view extends container{
     
     protected $controller = null;

     //function __construct(&$app){
      //parent::__construct($app);
      //$this->controller = $this->app->lib->controller;
      //print_r($app);
     //}

    
     function load($view='',$data=array()){
       $__ = "";
       $file = APP_PATH . "views/$view.php";

       $data2 = $this->app->lib->message->all();
       $request_array = $this->app->lib->request->all_array();
       extract($data2);
       extract($data);
       // echo $file;
       if (file_exists($file)){
         ob_start();
         include($file);
         $__.= ob_get_contents();
         ob_end_clean();           
       }
       return $__;
     } 

 

 }

?>