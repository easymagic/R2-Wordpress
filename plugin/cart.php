<?php 
 class cart extends container{

   const CART_ID = 'cart_bucket';
    
    private function init_cart(){
    	if (!isset($_SESSION[self::CART_ID])){
          $_SESSION[self::CART_ID] = array();
    	}
    }

    private function get_cart_keys(){
      $r = $_SESSION[self::CART_ID];	
      return array_keys($r);
    }

    function get_cart(){
    	return $_SESSION[self::CART_ID];
    }

    private function item_exists($id){
     $this->init_cart();
     if (in_array($id, $this->get_cart_keys())){
        return true;
     }else{
        return false;
     }
    }

    function add_to_cart($id,$price,$qty=1){
      if ($this->item_exists($id)){
        $this->update_cart($id,$qty);  //update with increment.
      }else{
        $_SESSION[self::CART_ID][$id] = array("id"=>$id,"qty"=>$qty,"price"=>$price,"price_tot"=>($price * $qty));
      }
    }

    function get_product_ids(){
      return array_keys($this->get_cart());
    }

    /*
      
      id
      qty
      price
      price_tot
 
    */

    function remove_from_cart($id){
     $r = $this->get_cart();
     $new_r = array();
     foreach ($r as $k=>$v){
      if ($k*1 !== $id*1){
        $new_r[$k] = $v;
      }
     }
     $this->reload_cart($new_r);
    }

    function reload_cart($v){
     $_SESSION[self::CART_ID] = $v;
    }

    function clear_cart(){
     $_SESSION[self::CART_ID] = array();	
    }

    function update_cart($id,$qty=1){
      $item = $this->get_cart();
      $tmp = $item;
      $item = $item[$id];

      if ($qty === '+'){
       ++$item['qty'];
      }else{
      	$item['qty'] = $qty;
      }

      $item['price_tot'] = $item['price'] * $item['qty'];

      $tmp[$id] = $item;

      $this->reload_cart($tmp);
    }

    function get_count(){
    	$list = $this->get_cart();
    	$tot = 0;
      $tot_price = 0;
    	foreach ($list as $k=>$v){
           $tot+= $v['qty'];
           $tot_price+=$v['price_tot'];
    	}

      return array("tot"=>$tot,"tot_price"=>$tot_price);
    
     /*
    	if ($tot > 1){
         return $tot;
    	}else if ($tot === 1){
         return $tot;
    	}else{
    	  return 'no item';	
    	}
      */

    	
    }







 }
?>