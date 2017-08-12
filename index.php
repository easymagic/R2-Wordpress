<?php 

/***
*Plugin Name: r2comp
*Plugin URI: r2comp.com
*Description:  Loading r2component
*Authour:  Akamukali Nnamdi Alexander
***/
 
 require_once('r2.php'); 

function r2_foo(){

	global $obj_app;

	//$obj_app->load_controller('home');

	 return $obj_app->controller->home->index2();


}

function r2_foo2(){
	add_menu_page('Transactions','Manage Transactions',4,'manage_transactions','exec_trx');
}

function exec_trx(){
	
	global $obj_app;

	//$obj_app->load_controller('home');

	 echo $obj_app->controller->home->index();

	//echo '23';

	//echo 'Exec fn';
}


add_shortcode('r2compp','r2_foo');

add_action('admin_menu','r2_foo2');