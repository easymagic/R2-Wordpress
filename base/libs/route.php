<?php
 class route extends container{
     
     //protected $controller = null;

     //function __construct(&$app){
      //parent::__construct($app);
      //$this->controller =& $this->app->controller;
      //print_r($this->controller);
     //}

    
     
     function exec($q,$tk='/'){

       $r = explode($tk, $q);
       $args = array();

       if (count($r) > 0){
         //echo 'seen';
        $controller = $r[0];
        if (isset($r[1])){
          $method = $r[1];
          $args = array_slice($r, 2);
        }else{
          $method = 'index';
        }
        
        if ($this->app->controller->$controller !== 'null'){
         if (method_exists($this->app->controller->$controller, $method)){
          return call_user_func_array(array($this->app->controller->$controller,$method), $args);
         }else if (method_exists($this->app->controller->$controller, 'map')){
          //throw new Exception(METHOD_MISSING);
          //return ;
          array_unshift($args, $method);
          return call_user_func_array(array($this->app->controller->$controller,'map'), $args);
         }else{
          return 'no-map-mtd';
         }
        }else if ($this->app->controller->url != 'null'){
          if (method_exists($this->app->controller->url, 'map')){
            return call_user_func_array(array($this->app->controller->url,'map'), $r); //r=>general argument.
          }else{
            return 'no-url-map';
          }
          //echo $this->app->controller->$controller;
          //echo $controller;
          //throw new Exception(CONTROLLER_MISSING);
         //return ;  
        }else{
          return 'no-ctrl';
        }

       }else{
        return 'ar-nf';
        //throw new Exception(NOT_FOUND);
        //return ;
       }


     }
 

 }

?>
