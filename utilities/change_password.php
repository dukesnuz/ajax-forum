<?php # - change_password.php
//require('includes/config.inc.php');//moved to header
$page_title='Change Your Password on AjaxForums';
//select which menu to use
$menu_type = "menu_jquery";
//$menu_type = "menu_css";
include('../headers_menus_footers/header18.html');

//redirect user if not logged in
if(!isset($_SESSION['user_id']))
//$_SESSION['user_id'] = 18;
   {
   $url= BASE_URL . '/utilities/index.php';
   //$url ='http://www.dukesnuz.com:81/ch18/index1.php';
   ob_end_clean();
   header("Location:$url");
   exit();
   }
       //check if form submitted and include mysqli connection
	   if($_SERVER['REQUEST_METHOD'] =='POST')
	   {
	  //no need to coonect to database herenow connecting on header pages if 
	  //connect here will through error
	  // require(MYSQL);
	   //validate submitted password
	   $p = FALSE;
	   if(preg_match('/^(\w){4,20}$/', $_POST['password1']) )
	     {
		   if($_POST['password1'] == $_POST['password2'])
		     {
			 $p =mysqli_real_escape_string($dbc, $_POST['password1']);
			 }else{
			 echo '<p class="error">Your password did not match the confirmed password!</p>';
			 }
		 }else{
		 echo '<p class="error">Please enter a valid password!</p>';
		 }
		 
		 //update password in database
		 if($p)
		    {
			$q = "UPDATE users SET pass=SHA1('$p') WHERE user_id={$_SESSION['user_id']} LIMIT 1";
			//$q = "UPDATE users SET pass=SHA1('$p') WHERE user_id=18 LIMIT 1";
			$r = mysqli_query($dbc,$q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
			//if query worked complete the page
			if(mysqli_affected_rows($dbc) ==1)
			   {
			   echo '<h2>Your password has been changed.</h2>';
			   
			  //retrive ip for history input
	     $ip=$_SERVER['REMOTE_ADDR'];
	     $ip = mysqli_real_escape_string($dbc,trim($ip));
		 $uid=$_SESSION['user_id'];
         //record correct username of password login attempt
		 $q= "INSERT INTO history( ip, user_id, web_page_title, event, Date)
		       VALUES('$ip', '$uid', '$page_title','Change_Password', UTC_TIMESTAMP)";
	     $r=mysqli_query($dbc,$q);
	     //END record correct username of password login attempt
	   
			  // mysqli_close($dbc);//throughs error
			   include('../headers_menus_footers/footer18.html');
			   exit();
			   }else{
			   echo '<p class="error">Your password was not changed.  Make sure your new password is different
			   than the current password.  Contact the system administrator if you think an error occurred.</p>';
			   }
		 }else{
		   echo '<p class="error">Please try again.</p>';
		   }
		   mysqli_close($dbc);
	}//end of main submit conditinal
?>

<h2>Change Password</h2>

<form class="subform" action="change_password.php" method="post" >
  <fieldset>
     <p>
	 <label for="password" class="label">New Password:</label>
	 <input type="password" name="password1"/>
	 </p>
	 <div id="message">Use only letters, numbers, and the underscore.  Must be between 4 and 20 characters long.</div>
	 
	 <p>             
	 <label for="password2" class="label">Confirm New Password:</label>
	 <input type="password" name="password2"/>
	 </p>
  </fieldset>
 
  <input type="submit" name="submit" value="Change My Password" />
</form>

<?php  include('../headers_menus_footers/footer18.html'); ?>
