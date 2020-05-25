<?php # forum- login.php
//require('includes/config.inc.php');//moves to header
$page_title = 'Login to Ajax Forums';
//select which menu to use
$menu_type = "menu_jquery";
//$menu_type = "menu_css";
include('../headers_menus_footers/header18.html');
//check if form submitted and require database connection
if($_SERVER['REQUEST_METHOD'] == 'POST')
   {
   //do not need to connect to data base here.. now connectin in both headers to get words
   // require(MYSQL);
   //validate data
   if(!empty($_POST['email']))
     {
	 $e = mysqli_real_escape_string($dbc, $_POST['email']);
	 //$e= "buy@ajaxloft.com";
	 }else{
	 $e = FALSE;
	 echo '<p class="error">You forgot to enter your email address</p>';
	 }
	 
	 if(!empty($_POST['pass']))
	  {
	  $p = mysqli_real_escape_string($dbc, $_POST['pass']);
	  //$p= "4444";
	  }else{
	  $p = FALSE;
	  echo '<p class="error">You forgot to enter your password</p>';
	  }
	  
	  
	    //retrive ip for history input
	     $ip=$_SERVER['REMOTE_ADDR'];
	     $ip = mysqli_real_escape_string($dbc,trim($ip));
	  //if both above true retrieve user info
	  //I added email to the $q =SELECT query below
if($e && $p)
    {

	/* origin query
	$q= "SELECT user_id, first_name,last_name, email,nickname, user_level, time_zone, carrier_id, shipper_id
	 FROM users WHERE (email='$e' AND pass=SHA1('$p')) AND active IS NULL ";
	//$q= "SELECT user_id, first_name, user_level FROM users WHERE (email='$e' AND pass=SHA1('$p'))";
	*/
	//maybe use a join to join carrier and shjippers to get payment expiration date
	//NOW() >= s.date_expires
$q= "SELECT u.user_id,u.carrier_id, u.shipper_id, u.address_id, u.first_name,u.last_name, u.email,u.nickname,u.time_zone, 
    IF(NOW() <= c.date_expires , true, false) AS c_expired,
    IF(NOW() <= s.date_expires , true, false) AS s_expired,
    c.company_name AS c_company_name, s.company_name AS s_company_name
    FROM users AS u
    LEFT JOIN carriers AS c USING(carrier_id)
    LEFT JOIN shippers AS s USING(shipper_id)
    WHERE (u.email='$e' AND u.pass=SHA1('$p')) 
    AND u.active IS NULL";
	
	
	$r= mysqli_query($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

	  //if match log in user
	  if(@mysqli_num_rows($r) == 1)
	  //if(4>1)
	  {


	   //check if cookie set ie user logging in after visiting page where
	  //log in  not required
	  if(isset($_COOKIE['L_R_']))
	  {
	  $track_id=  $_COOKIE['L_R_'];
	  $_SESSION = mysqli_fetch_array($r, MYSQLI_ASSOC);
	  setcookie("L_R_", "$track_id" , time()+31536000, "/");
	  }else{
	  $_SESSION = mysqli_fetch_array($r, MYSQLI_ASSOC);
	  }
	  
	   mysqli_free_result($r);
	  //
	    $uid = $_SESSION['user_id'];
	    //record correct username of password login attempt
		 $q= "INSERT INTO history(user_id,user_input, ip, web_page_title, event, Date)
		       VALUES('$uid','$e','$ip', '$page_title','Login_Correct', UTC_TIMESTAMP)";
	     $r=mysqli_query($dbc,$q);
	     //END record correct username of password login attempt
		
		
	  //mysqli_free_result($r);
	  
	  mysqli_close($dbc);
	  
	  //redirect user...note for log in to work correctly redirect user to index page
	  //change to BASE_URL when loaded onto server for live site
	  //$url = BASE_URL . '/utilities/index.php';
	     // $url = BASE_URL . '/utilities/index.php';
	      $url = BASE_URL .'/forum/forum.php';
	  //$url ='http://www.dukesnuz.com:81/forum_loadedandrolling/forum.php';
	  //$url ='http://dukesnuz.com:81/forum_loadedandrolling/index.php';
      
	  ob_end_clean();
	  header("Location: $url");
	  exit();
	  
	  }else{
	   echo '<p class="error">Either the email address and password entered do not match those
	   on file or you have not yet activated your account.</p>
	        <p><a href="forgot_password.php" class="press" target="blank">Forgot Password</a></p>';
	   
	     
	     //record incorrect username of password login attempt
		 $q= "INSERT INTO history(user_input, ip, web_page_title, event, Date)
		       VALUES('$e','$ip', '$page_title','Login_Incorrect', UTC_TIMESTAMP)";
	     $r=mysqli_query($dbc,$q);
	     //END record incorrect username of password login attempt
	   
	   }
	}else{
	  echo '<p class="error">Please try again.</p>';
	  }
	  //below throughing error in side_bar_1 news query if user trys to login with wrong data
	  //moved close to end of page
	  //mysqli_close($dbc);
	  }//end of submit conditional
	  ?>
	 
	
	  <h2>Login</h2>
	  
	  
	  <form class="subform" action="login.php" method="post">
	     <fieldset>
		      <p>
			  <label for="email" class="label">Email Address:</label>
			        <input type="text" name="email" 
			        value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>"/>
			</p>
			  
			  <p>
			  <label for="password" class="label">Password:</label>
			      <input type="text" name="pass" 
			  		value="<?php if (isset($_POST['pass'])) echo $_POST['pass'];?>"/>
			  </p>
			  
			  <div><input type="submit" name="submit" value="Login"/></div>
		 </fieldset>
		  <p><a href="register.php" class="press">Register</a></p>
		  <div id="message">Your browser must allow cookies to login</div>
	 </form>
	
<?php include('../headers_menus_footers/footer18.html');
//below throughing error in side_bar_1 news query if user trys to login with wrong data
	  //moved close to end of page
	  mysqli_close($dbc);
 ?>
	  