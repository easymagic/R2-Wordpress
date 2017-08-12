<?php



 class db{
    

    private $connection;
    private $where_clause = array();
    //private $result;
    private $app = null;

    private $insert_id = '';

    private $pdo_;

    function __construct(&$app){
     $this->app =& $app;
     //$this->connection = xconnection::gi()->get_connection(); // get_connection();
     $this->pdo_ = xconnection::gi()->pdo();//get pdo connection
     //$this->connection = get_connection();
    }

    function pdo(){
      return $this->pdo_;
    }



    function query($sql=''){
      //echo $sql;
      $this->where_clause = array();

      return new Query($this, $this->pdo_->query($sql)); //mysqli_query($this->connection,$sql)
      //return ;
    }

    function exec($sql=''){
      return $this->pdo_->exec($sql);
    }

    function get($table){
     return $this->query("select * from $table");
    }

    function get_where($table,$crit=array()){
      $r = array();
      foreach ($crit as $k=>$v){
        $r[] = "$k='$v'";
      }
      
      $sql = "select * from $table where (" . implode(' and ', $r) . ")";
      
      return $this->query($sql);
    }

    function num_rows($query){
      //print_r($query);
      if ($query->get_current_query()){
       return $query->get_current_query()->rowCount(); //rowCount
      }else{
       return 0; 
      }
     
    }

    function where($dt=array()){
      $this->where_clause = $dt; 
    }

    function get_where_sql(){
      $r = $this->where_clause;
      $rr = array();
      foreach ($r as $k=>$v){
        $rr[] = "$k='$v'";
      } 
      return ' where (' . implode(' and ', $rr) . ')';
    }





    function result($query){
      if ($this->num_rows($query) > 0){
       $r = array();
       //mysql_fetch_object()
       while ($dt = $query->get_current_query()->fetch(PDO::FETCH_ASSOC)){ //mysqli_fetch_assoc($query->get_current_query()) FETCH_ASSOC
         $r[] = $dt;
       }
       return $r;
      }else{
        return array();
      }
    }

    function result_object($query){
      if ($this->num_rows($query) > 0){
       $r = array();
       //mysql_fetch_object()
       while ($dt = $query->get_current_query()->fetch(PDO::FETCH_OBJ)){ //mysqli_fetch_assoc($query->get_current_query()) FETCH_ASSOC
         $r[] = $dt;
       }
       return $r;
      }else{
        return array();
      }
    }


    function insert($table,$data=array()){
     $new_data = $this->filter_from_fields($table,$data);
     $fields = array_keys($new_data);
     $values = array_values($new_data);

     $prepared_values = array();

     foreach ($fields as $k=>$v){
      $prepared_values[] = ":$v";
     }

     $sql = "insert into $table (" . implode(',', $fields) . ") values (" . implode(",", $prepared_values) . ")";
     
     $stmt = $this->pdo()->prepare($sql);

     $stmt->execute($new_data);

     $this->insert_id = $this->pdo()->lastInsertId(); // mysqli_insert_id($this->connection);
     return $this->insert_id;
    }


    function update($table,$data=array()){

     if (count($this->where_clause) > 0){
      $where = $this->get_where_sql();
     }else{
      $where = '';
     }


     $new_data = $this->filter_from_fields($table,$data);
     $r = array();
     $rr = array();
     foreach ($new_data as $k=>$v){
       $r[] = "$k=?"; //'$v'
       $rr[] = $v;
     }


     $sql = "update $table set " . implode(' , ', $r) . " $where";

     //echo $sql;
    // print_r($rr);

     $stmt = $this->pdo()->prepare($sql);
     
     return $stmt->execute($rr);//$this->exec($sql);
     //$sql = "";
    }

    function delete($table){

     if (count($this->where_clause) > 0){
      $where = $this->get_where_sql();
     }else{
      $where = '';
     }

     $sql = "delete from $table $where";
     return $this->exec($sql);
    }

     
    //get_table_fields 

    function filter_from_fields($table,$arr1){
     $r = array();
     $flds = $this->get_table_fields($table);
     foreach ($arr1 as $k=>$v){
        if (in_array($k, $flds)){
          $r[$k] = $v;
        }
     }
     return $r;
    }

    function get_table_fields($table){
      $fields = array();
      $sql = 'show columns from ' . $table;
      $query = $this->query($sql);
      while ($dt = $query->get_current_query()->fetch(PDO::FETCH_ASSOC)){ //mysqli_fetch_assoc($query->get_current_query()) FETCH_ASSOC
      //while ($dt = mysqli_fetch_assoc($query->get_current_query())){
        $fields[] = $dt['Field'];
      }
      //$this->data = array_flip($this->fields);
      return $fields;
    }


    function get_new_id(){
      return $this->insert_id;
    }



 }




 class Query{
   
   private $query = null;
   private $ref = null;

   function __construct($ref,$query){
    // echo 'Called...';
     $this->ref = $ref;
     $this->query = $query;
   }

   function get_current_query(){
    return $this->query;
   }

   function row(){
     $r = $this->ref->result($this);
     if (count($r) > 0){
      return $r[0];
     }else{
      return array();
     }
   }


   function row_object(){
     $r = $this->ref->result_object($this);
     if (count($r) > 0){
      return $r[0];
     }else{
      return array();
     }
   }



   function num_rows(){
    return $this->ref->num_rows($this); 
   }

   function result(){
    return $this->ref->result($this); 
   }

   function result_object(){
    return $this->ref->result_object($this); 
   }

   function insert_id(){
    return $this->ref->get_new_id();
   }



 }


?>
