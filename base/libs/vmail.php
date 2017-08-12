<?php 
 class vmail extends container{
 

   public $msg = '';
   public $subject = '';
   public $from = '';
   public $to = '';


   function send(){
     $to = $this->to; // $cfg['to'];
     $subject = $this->subject; // $cfg['subject'];
     $msg = $this->msg; // $cfg['msg'];
     $from = $this->from; // $cfg['from'];

      //echo 'Called 1';
      if (mail(
        $to, 
        $subject, 
        $msg, 
        "From: " . $from . "\n" . 
        "MIME-Version: 1.0\n" .
        "Content-type: text/html; charset=iso-8859-1"
      )){
      	//echo 'Sent ..';
      }else{
        //echo 'Not sent ...';	
      }   

   }

 }
?>