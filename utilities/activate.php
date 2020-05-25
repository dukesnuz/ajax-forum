<?php # - activate.php
//require('includes/config.inc.php');
$page_title = "Activate Your Account on AjaxForums";
//select which menu to use
$menu_type = "menu_jquery";
//$menu_type = "menu_css";
//original used 18 but was througinh error in sidebar
//include('../headers_menus_footers/header18.html');
include('../headers_menus_footers/header17.html');
//include('../headers_menus_footers/headerwidemain.html');

//validate values that should be recieved by the page
 if(isset($_GET['x'], $_GET['y'])  && filter_var($_GET['x'], FILTER_VALIDATE_EMAIL)  && (strlen($_GET['y']) ==32))
//if(isset($_GET['x'], $_GET['y'])    && (strlen($_GET['y']) ==32))
 // if(4>1)
   {
   //attempt to activate user account
   //require(MYSQL);
  $q = "UPDATE users SET active=NULL 
   WHERE(email='".mysqli_real_escape_string($dbc, $_GET['x'])."' 
     AND active ='".mysqli_real_escape_string($dbc, $_GET['y'])."') LIMIT 1";
  //$q = "UPDATE users SET active=NULL 
        //WHERE(email='".mysqli_real_escape_string($dbc, $_GET['x'])." ') LIMIT 1";
   
   $r = mysqli_query($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error:" . mysqli_error($dbc));
   
   //report on succes of query
   if(mysqli_affected_rows($dbc) ==1)
   //if(4>1)
    {
	echo '<p class="error">Your account is now active.  You may now log in.</p>';
	}else{
	echo '<p class="error">Your account could not be activated.  Please re-check the link or contact
	the system administrator.</p>';
	//echo  mysqli_real_escape_string($dbc, $_GET['x']);
	//echo '<br />';
	//echo  mysqli_real_escape_string($dbc, $_GET['y']);
	}
	mysqli_close($dbc);
}else{
//redirect
$url = BASE_URL . 'index.php';


ob_end_clean();
header("Location: $url");
exit();
}//end of main if else
//original used 18 but was througinh error in sidebar	
//include('../headers_menus_footers/footer18.html');
//include('../headers_menus_footers/footer17.html');
//include('../headers_menus_footers/footerwidemain.html');
include('../headers_menus_footers/footer.html');
	?>
       