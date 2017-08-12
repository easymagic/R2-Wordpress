<?php 
 class httprequest extends container{
   
   public $url = '';
   private $data = array();
   private $data_payload = array();

   private $use_payload = false;
  
    
    function set_data($dt=array()){
     $r = array();
     foreach ($dt as $k=>$v){
      $r[$k] = urlencode($v);
     }	

     $this->data = $r;
    }

    function enable_payload(){
     $this->use_payload = true;
    }

    function disable_payload(){
     $this->use_payload = false;
    }

    function set_data_payload($dt=array()){
     $r = array();
     foreach ($dt as $k=>$v){
      $r[$k] = urlencode($v);
     }	

     $this->data_payload = $r;
    }


    function post(){
     return $this->make_call(CURLOPT_POST);
    }

    function get(){
     return $this->make_call(CURLOPT_GET);
    }
 
    private function get_post_data(){
    	$r = $this->data;
    	$rr = array();
    	foreach ($r as $k=>$v){
          $rr[] = "$k=$v";
    	}

    	return implode('&', $rr);
    }

    private function get_json_data(){
    	return json_encode($this->data);
    }

    private function make_call($type_opt=CURLOPT_POST){

		$ch = curl_init();

		//set the url, number of POST vars, POST data
		curl_setopt($ch,CURLOPT_URL, $this->url);
		curl_setopt($ch,$type_opt, count($this->data));
		

        if ($this->use_payload){

			curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
			    'Content-Type: application/json',                                                                                
			    'Content-Length: ' . strlen($this->get_json_data()))
			);                                         

			curl_setopt($ch, CURLOPT_POSTFIELDS, $this->get_json_data());                                                                          
        }else{

        	curl_setopt($ch,CURLOPT_POSTFIELDS, $this->get_post_data());

        }

		//execute post
		$result = curl_exec($ch);

		//close connection
		curl_close($ch);

		return $result;

    }



 }
?>