<?php

//verify carrier is up to date on payment
/*
 function redirect_invalid_user($check = 's_expired' , $destination='index.php'){
	//  {
	 	// if(!isset($_SESSION[$check])){
	 	// if (4>2){
	 	  if($_SESSION[$check] ===0){
	     	$url =  BASE_URL . $destination;
		   header("Location: $url");
		   exit();
	 }
}
 */
    if(!isset($_SESSION['c_expired']))
    {
   	include_once('../headers_menus_footers/headerwidemain.html');
	echo '<p class="error">Oops! You have acces this page in error.</p>';
    include_once('../headers_menus_footers/footerwidemain.html');
    exit();
   } 
   // if(!isset($_SESSION['shipper_not_expired']))
   if($_SESSION['c_expired'] < 1)
	 {
     //$url =  '../utilities/index.php';
     //header("Location: $url");
	include_once('../headers_menus_footers/headerwidemain.html');
	echo '<p class="error">Oops! Your account has expired. 
	<a href="../trucks/carrier_preferences.php">Update</a> your subscription.</p>';
    include_once('../headers_menus_footers/footerwidemain.html');
    exit();
	 }
 
 //echo 'session s expired'. $_SESSION['s_expired'];

 // echo BASE_URL. $destination;