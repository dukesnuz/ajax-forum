<?php # My_forum forgot_password.php
//require('includes/config.inc.php');//moved to header
$page_title = 'Forgot your password';
//select which menu to use
$menu_type = "menu_jquery";
//$menu_type = "menu_css";
include('../headers_menus_footers/header18.html');//see note at end


//check if form has been submitted include database connection and create flag variable
if($_SERVER['REQUEST_METHOD'] =='POST')
   {
  //do not need to connect to database here as connection is in the header
  // require(MYSQL);
   $uid = FALSE;
   
      //validate submitted email
	  if(!empty($_POST['email']))
	  {
      $e = mysqli_real_escape_string($dbc, trim($_POST['email']) );
	  $q = "SELECT user_id FROM users WHERE email= '$e' ";
	  $r = mysqli_query($dbc, $q) or trigger_error("Query: $q\n<br />MySQL ERROR: " . mysqli_error($dbc) );
	      //retrieve selected id
		  if(mysqli_num_rows($r) ==1)
		     {
			 list($uid) = mysqli_fetch_array($r, MYSQLI_NUM);//see page 596 for list()
			 }else{
			 //No databse match
			 echo '<p class="error">The submiitted email address does not match those on file!</p>';
			 $uid = 0;
			 } 
			 
		  //retrive ip for history input
	     $ip=$_SERVER['REMOTE_ADDR'];
	     $ip = mysqli_real_escape_string($dbc,trim($ip));
	     $user_id =$uid;
	     //record forgot  password attempt
		 $q= "INSERT INTO history(user_input, ip, user_id, web_page_title, event, Date)
		       VALUES('$e','$ip', $uid, '$page_title','Forgot_Password', UTC_TIMESTAMP)";
	     $r=mysqli_query($dbc,$q);
	     //END record forgot  password attempt
	     
	  }else{//no submitted email
	  echo '<p class="error">You forgot to enter your email address!</p>';
}//end of empty($_POST['emai']) if

//create new random password
if($uid)
   {
   $p = substr(md5(uniqid(rand(), true)), 3,10);
   //update password in databse
   $q = "UPDATE users SET pass=SHA1('$p') WHERE user_id=$uid LIMIT 1";
   $r = mysqli_query($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error:" . mysqli_error($dbc));
      if(mysqli_affected_rows($dbc) == 1)
	     {
		 //echo "start";
		 //include('includes/sendmail.inc.php');
		 $url=BASE_URL;
		 $body = "Your password";
		    $body = "Your password to log into $url has been temporarily changed to '$p'.\n
		     Please log in using this password and this email address. \n
			 Then you may change your password to something more familiar.";
			 
		//below line from nook
		//mail ($_POST['email'], 'Your temporary password.', $body, 'From: admin@sitename.com');
		 //works  mail($_POST['email'], 'Your temporary password .', $body, 'From:contactus@loadedandrolling.com');
		 //using below so can yse webpages on another site
		 mail($_POST['email'], 'Your temporary password.', $body, 'From:'.EMAIL);

		 //mail('david@9015272529.com' , 'Contact Form Submission' , 'body', 'From: ');
		// echo New Password which would apprea$p;
		 
		 //echo $p;

		 echo '<h2>Your password has been changed. You will recieve the new temporary password at
		 the email address with which you registered.  Once you have logged in with this password, 
		 you may change it by clicking on the "Change password" link.</h2>';
		
		//echo'<br /><br /><br /><br /><br />'; 
		//echo '<p>My server hosting MySql will not allow me to use php to send emails.</p>';
	    //echo'<p>The following is the message and new password which would appear in your email inbox:</p>';
		//echo '<p>'. $body . '</p>';
		//echo '<br />';
		//echo '<p>'.$p.'</p>';
		//					
	  
	     
		//mysqli_close($dbc);//throught error on page
		//include('../headers_menus_footers/footer18.html');//see note at end
		include('../headers_menus_footers/footerwidemain.html');
		exit();
		
	}else{
	 echo '<p class="error">Your password could not be changed due to a system error. We apologize
	 for any inconvenience.</p>';
	 }
}else{
 echo '<p class="error">Please try again.</p>';
 }
 mysqli_close($dbc);
 }//end main submit
 ?>
 
 
 <h2>Reset Password</h2>
 <h2>Enter your email address below and your password will be reset.</h2>
 
 <form class="subform" action="forgot_password.php" method="post">
    <fieldset>
	   <p>   
	   <label for="email" class="label">Email Address:</label>
	   <input type="text" name="email"
	                           value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" />
      </p>
	</fieldset>
	<input type="submit" name="submit" value="Reset My Password" />
</form>


<?php 
//include('../headers_menus_footers/footer18.html');
//using this footer as the above throughs sidebar error if invalid email address entered
include('../headers_menus_footers/footerwidemain.html');
//Flush buffer
ob_end_flush();//because we are using header18

?>

		 