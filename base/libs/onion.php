<?php 
 class onion extends container{



    function exec($args){

      //$args = func_get_args();
      $r = '';

      if (count($args) > 1){
       $controller = $args[0];
       $method = $args[1];
       $args = array_slice($args, 2);
       if (is_object($this->app->controller->$controller)){

         if (method_exists($this->app->controller->$controller, $method)){
          $r = call_user_func_array(array($this->app->controller->$controller,$method), $args); 
         }


       }
      }else{
       $r = '';
      }

      return $r;
    }

 }
?>