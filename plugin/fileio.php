<?php 
 class fileio extends container{
   

     function upload_file($name,$target_path){
       $tmp = $_FILES[$name]['tmp_name'];
       $name = substr(md5(time()), -5) . $_FILES[$name]['name'];
       $target_path = $target_path . '/' . $name;
       if (move_uploaded_file($tmp, $target_path)){
         return true;
       }else{
       	 return false;
       }
     }

     function remove_file($name,$path){
      $name = base64_decode($name);
      $fil = "$path/$name";
      if (file_exists($fil)){
        unlink($fil);
      }
     }

     function scan_dir_for_files($path){
       $hnd = scandir($path);
       $hnd = array_diff($hnd, array('.','..','...'));
       return $hnd;
     }

     function get_select_options($path){
       $arr = $this->scan_dir_for_files($path);
       $r = array();
       foreach ($arr as $k=>$v){
       	$t = explode('.', $v);
       	$t = $t[0];
        $r[] = array("value"=>$v,"label"=>$t); //'<option value="' . $v . '">' . $t . '</option>';
       }
       return $r;
     }


 }
?>