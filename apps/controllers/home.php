<?php
 class home extends controller{
  
 
   
    function index(){
      $data = array();
      
      $this->load_controller('user');

      $this->load_lib('view','template');

      $this->load_model('home_model');

      $this->load_use_case('user','user_register');

      $this->load_plugin('currency');

      $this->user_register->register();

      //Secho 'called .... 123';


      $data['version'] = '1.0.0';
      $data['author'] = 'Akamukali Nnamdi Alexander ' . $this->user->auth() . $this->home_model->do_stuff() . ' @ ' . $this->currency->get_currency() . ' 2M';
      $data['time_of_release'] = '20 April 2016';
      // print_r($this->template);
      echo $this->template->load('home/index',$data);
    }


    function index2(){
      return 'Running from R2.';
    }

 }

?>