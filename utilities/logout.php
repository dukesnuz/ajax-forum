<?php # Forum logout.php
//require ('includes/config.inc.php');//moved to header
$page_title= 'Logout LoadedandRolling';
//select which menu to use
$menu_type = "menu_jquery";
//$menu_type = "menu_css";
include('../headers_menus_footers/header18.html');

//redirect user if not logged in
if(!isset($_SESSION['first_name']))
//if(4>1)
   {

   $url = BASE_URL . 'index.php';
   ob_end_clean();
   header("Location : $url");
   exit();

   //logout user if logged in
   }else{
   
         //retrive ip for history input
	     $ip=$_SERVER['REMOTE_ADDR'];
	     $ip = mysqli_real_escape_string($dbc,trim($ip));
		 $uid=$_SESSION['user_id'];
		 $uid = mysqli_real_escape_string($dbc,trim($uid));
         //record correct username of password login attempt
		 $q= "INSERT INTO history( ip, user_id, web_page_title, event, Date)
		       VALUES('$ip', '$uid', '$page_title','Logout', UTC_TIMESTAMP)";
	     $r=mysqli_query($dbc,$q);
	     //END record correct username of password login attempt
	     
	  //keep cookie L_R_ active in case user comes back and logs in or just browses
	  // non logged in pages
	    //check if cookie set ie user logging in after visiting page where
	  //log in  not required
	  if(isset($_COOKIE['L_R_']))
	  {
	  $track_id=  $_COOKIE['L_R_'];
	   $_SESSION = array();
       session_destroy();
       setcookie(session_name(), '',time()-3600);
	   setcookie("L_R_", "$track_id" , time()+31536000);
	  }else{
	  $_SESSION = array();
     session_destroy();
     setcookie(session_name(), '',time()-3600);
	  }
	  /*
   $_SESSION = array();
   session_destroy();
   setcookie(session_name(), '',time()-3600);
   */
       
   }
   echo '<a href="'.BASE_URL.'/utilities/login.php" title="Login to Loaded and Rolling." class="press">Login</a>';
   echo '<p class="error">You are logged out.</p>';
   include('../headers_menus_footers/footer18.html');
   echo 5;
   ?>