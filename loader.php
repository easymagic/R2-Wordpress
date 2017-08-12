<?php 
  
  session_start();

  require_once("config.php");


  class xconnection{
    private static $inst = null;
    private $conn;

    private $pdo_obj;

    const DRIVER = 'mysql';


    function __construct(){
      try {
        $this->pdo_obj = new PDO(self::DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME,DB_USER,DB_PASS);  
      } catch (PDOException $e) {
        throw new Exception($e->getMessage());
      }
      
    }

    static function gi(){
      if (self::$inst == null){
        self::$inst = new xconnection();
      }
      return self::$inst;
    }

    function pdo(){
      return $this->pdo_obj;
    }



  }
  
  
  class loader{
    
    private $load_path = 'base';
    private $data = array();
    protected $app = null;

    //function setLoadPath()
    function __construct($load_path='',&$app){
     $this->load_path = $load_path;
     $this->app =& $app;
    }


    function __get($k){
     if (!isset($this->data[$k])){
       $file = dirname(__FILE__) . '/' . $this->load_path . '/' . $k . '.php';
       //echo $file;
       if (file_exists($file)){
        //echo 'seen' . $file;
         
        
        require_once($file);


         $obj = new $k($this->app);
         
         $this->data[$k] = $obj;
         return $this->data[$k];
       }else{
        //echo "null" . $file;
         return 'null';
       }
     }else{
      return $this->data[$k];
     }
    }




  }



  class registry{
    
    private $data = array();


    function __set($k,$v){
      if (!isset($this->data[$k])){
       $this->data[$k] = $v;
      }
    }

    function __get($k){
      if (isset($this->data[$k])){
           return $this->data[$k];
      }else{
        return 'null';
      }
    }


  }


?>