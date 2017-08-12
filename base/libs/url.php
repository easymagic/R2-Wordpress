<?php 
 class url extends container{


    function redirect($api){
     header("location: " . BASE_URL . $api);
    }

    function refresh($time,$api){
      header("Refresh: $time;url=" . BASE_URL . $api);
    }

 }
?>