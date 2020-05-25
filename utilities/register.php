<?php #- register.php
//require('includes/config.inc.php');//should be moved to heade
$page_title = 'Register for  AjaxForum';
//select which menu to use
$menu_type = "menu_jquery";
//$menu_type = "menu_css";

include('../headers_menus_footers/header18.html');

//echo EMAIL;
//echo BASE_URL;
//mail('dispatch@ajaxtransport.com','User on ajaxforums reg page' ,  'body', "FROM:dispatch@ajaxtransport.com");

//$e="david@ajaxtransport.com";
//contact@ajaxforums.com
//$a = "Activate";
//$url=BASE_URL;
						//$body ="Thank you for registering at $url .\n To activate your account, please click on this link:\n\n";
						//$body .= BASE_URL."/utilities/activate.php?x=".urlencode($e)."&y=$a";
					   // $body .= 'http://www.ajaxforums.com/utilities/activate.php?x='.urlencode($e)."&y=$a";
					   
					   // $body .= "\n\n Thank you";
						//$body .= "\n\n AjaxForums";
                       //  $email = $trimmed['email'];
						//mail(EMAIL,"Registration Confirmation",'$body', "FROM:".EMAIL);
					//	$email = trim($e);
					//	mail("david@ajaxtransport.com","AjaxForums Registration Confirmation","$body","FROM:".EMAIL);
						
		//mail("david@ajaxtransport.com",'User on Ajax forums',"Use on page Register.php", "FROM:contact@ajaxforums.com");					
		//echo $e;
		//echo $body;				
						
			
						
                                                                             
     //mail(EMAIL,'2', "body","From". EMAIL);
	//mail(EMAIL,'1', "body", EMAIL);

//check for form submission and include databse connection
if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
   //do not need to connect to data base here.. now connectin in both headers to get words
   // require(MYSQL);
   //validate data
	
	//trim incoming data and establish flag variables
	
	$trimmed = array_map('trim', $_POST);
	$fn = $ln = $n = $e = $p = $tz =FALSE;
	//above can also be wroitten as below
	//$fn = FALSE;
	//$ln =FALSE;
	//$e = FALSE;
	//$p =FALSE;
     ////////
//validate first and last names
     if(preg_match('/^[A-Z\'.-]{2,20}$/i',$trimmed['first_name'] ))
     //if(4>1)
	 {
	 $fn = mysqli_real_escape_string($dbc, $trimmed['first_name']);
	 }else{
	 echo '<p class="error">Please enter your first name!</p>';
	 }
	 
	 if(preg_match('/^[A-Z\'.-]{2,40}$/i', $trimmed['last_name']))
	 {
	 $ln = mysqli_real_escape_string($dbc, $trimmed['last_name']);
	 }else{
	 echo '<p class="error">Please enter your last name!</p>';
	 }
	 
	 if(preg_match('/^[A-Z\'.-]{2,40}$/i', $trimmed['nickname']))
	 {
	 $n = mysqli_real_escape_string($dbc, $trimmed['nickname']);
	 }else{
	 echo '<p class="error">Please enter your nickname!</p>';
	 }
	 
	 if(isset($_POST['time_zone']))
	 {
	 $tz = mysqli_real_escape_string($dbc, $_POST['time_zone']);
	 }else{
	 echo '<p class="error">Please select your time zone.</p>';
	 }
	 
//validste email address
if(filter_var($trimmed['email'], FILTER_VALIDATE_EMAIL))
   {
   $e = mysqli_real_escape_string($dbc, $trimmed['email']);
   }else{
   echo '<p class="error">Please enter a valid email address!</p>';
   }
   
//validate password
if(preg_match('/^\w{4,20}$/', $trimmed['password1']))
     {
	    //if both passwords are ==
	    if($trimmed['password1'] == $trimmed['password2'])
		{
	    $p = mysqli_real_escape_string($dbc, $trimmed['password1']);
	    }else{
		echo '<p class="error">Your password did not match the confirmed pasword!</p>';
		}
}else{
   echo '<p class="error">Please enter a valid password!</p>';
   }
 //get ip address
  $ip=$_SERVER['REMOTE_ADDR'];
//check if ok to register user

 //if above passed check for unique email address
 if($fn && $ln && $n && $e && $ip && $p && $tz)
    {
	         //if email address unsued register user
	          $q= "SELECT user_id FROM users WHERE email='$e'";
	          $r=mysqli_query($dbc,$q) or trigger_error("Query:$q\n<br />MySQL Error: " . mysqli_error($dbc));
			  if(mysqli_num_rows($r) == 0)
			  {
			
			      //duplicate nickname
			       $q= "SELECT user_id FROM users WHERE nickname='$n'";
	               $r=mysqli_query($dbc,$q) or trigger_error("Query:$q\n<br />MySQL Error: " . mysqli_error($dbc));
	                //if email address unsued register user
			        if(mysqli_num_rows($r) == 0)
			        {
				 
				 $a =md5(uniqid(rand(), true));
				 $address_id =md5(uniqid(rand(), true));
				
				 $q = "INSERT INTO users (email, pass, first_name, last_name, nickname, active, address_id, ip, time_zone, registration_date)
				      VALUES('$e', SHA1('$p'), '$fn', '$ln', '$n', '$a', '$address_id', '$ip', '$tz', NOW() )";
					  $r = mysqli_query($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error:". mysqli_error($dbc)); 
					 
					  //send email if query worked
					    if(mysqli_affected_rows($dbc) == 1)
					    {
					   // $url=BASE_URL;
						//$body ="Thank you for registering at $url .\n To activate your account, please click on this link:\n\n";
						//$body .= BASE_URL."/utilities/activate.php?x=".urlencode($e)."&y=$a";
					   // $body .= 'http://www.ajaxforums.com/utilities/activate.php?x='.urlencode($e)."&y=$a";
					   
					   // $body .= "\n\n Thank you";
						//$body .= "\n\n AjaxForums";
                       //  $email = $trimmed['email'];
						//mail(EMAIL,"Registration Confirmation",'$body', "FROM:".EMAIL);
						//$e = trim($e);
						//mail($email,"AjaxForums Registration Confirmation",$body,"FROM:".EMAIL);
						//$e="david@ajaxtransport.com";
                       //$e = trim($e);
                        //$a ="activate1";
                         $url=BASE_URL;
						 $body ="Thank you for registering at $url .\n To activate your account, please click on this link:\n\n";
					     $body .= BASE_URL."/utilities/activate.php?x=".urlencode($e)."&y=$a";
					     //$body .= "http://www.ajaxforums.com/utilities/activate.php?x=".urlencode($e)."&y=$a";
					     //$body .= "http://www.ajaxforums.com/utilities/activate.php?x=david@ajaxtransport.com&y=$a";
					     $body .= "\n\n Thank you";
						 $body .= "\n AjaxForums";
                         $email = $trimmed['email'];
						//mail(EMAIL,"Registration Confirmation",'$body', "FROM:".EMAIL);
						 //mail("david@ajaxtransport.com","AjaxForums Registration Confirmation",$body,"FROM:".CONTACT_EMAIL);
						 mail($trimmed['email'],"Ajax Forums Registration Confirmation",$body,"FROM:".EMAIL);
						
							////////////////////////////////////////////
						/******SEND email to me******/
						mail("david@ajaxtransport.com",'User joined ajax forums',"On Page Register.php this email from line 165.Their email:\r\n$e", "FROM:david@ajaxtransport.com");
			 
					 //mail("david@ajaxtransport.com" ,'User joined ajaxforum' ,$trimmed['email'],"From:david@ajaxtransport.com");
						//-works-mail('contact@ajaxforums.com','13' ,  'body', "FROM:".EMAIL);//when constans is dispatch@ajaxtransport.com
						//tell user what to expect and complete the page
						$message = '<h2>Thank you for registering! A confirmation email has been sent to your address. 
						             Please click on the link in that email in order to activate your account.</h2>';
					   //  echo "<h2>Check email address:". $trimmed['email']."</h2>";
					    //$message ="<p class='error'>Thank you for registering at Ajax Forums.\n To activate your account, please click on this link:</p>";
					    //$message .= '<p class="press"><a href="./activate.php?x='.urlencode($e).'&y='.$a.'">Click</a></p>';
						echo $message;
						//echo $e;
							 
     //add here check if email address in emails
	         //if not add email address and unique address_id
	    
	      $check="SELECT address_id FROM emails WHERE address='$e'";
		
			 $email =mysqli_query($dbc, $check);
		// if(mysqli_num_rows($email) ==1)
		//if email address already in emails then only updates address_id
		if(mysqli_affected_rows($dbc)==1)
		 {
			 	$emailq = "UPDATE emails SET address_id= '$address_id'
			 	   WHERE address = '$e' LIMIT 1";
		
          	 $r = mysqli_query($dbc, $emailq);
			       if(mysqli_affected_rows($dbc) ==1)
		  	      {
		  		  //echo 'address_id entered';
		  	     }else{
		  	      //echo 'address_id entered error';
				  mail(EMAIL,'Registration Page Error',"Registration page error-$e-address_id not entered into emails.", "FROM:".EMAIL);
		  	     }
	         }else{
				//if email address not in emails then enter email address and address_id
			 	$emailq = "INSERT INTO emails(address,address_id)
			 	                   VALUES('$e','$address_id')";
			 	                    //$emailq = "INSERT INTO emails(address_id)
			 	                            //VALUES('$address_id')";
			
					
		        	$result = mysqli_query($dbc,$emailq);
				 	if(mysqli_affected_rows($dbc) == 1)
					{	 
					 //echo 'email & id entered';
					}else{
					 //echo 'email & id entered error';
					 mail(EMAIL,'Registration Page Error',"Registration page error-$e-address & address_id not entered into emails.", "FROM:".EMAIL);
					}
		     	 }
					 
			////////end add to emails table				 
							 
		               //  echo '<p><a href="http://dukesnuz.com:81/forum_loadedandrolling/activate.php?x='.urlencode($e).'&y='.$a.'">Activate</a></p>';
							  include('../headers_menus_footers/footer18.html');
							  exit();
					 		
					  //print errors if query failed if mysqli does not =1
					   }else{
					   echo '<p class="error">You could not be registered due to a system error. We apologize for any 
					   inconvenience.</p>';
				        }//end if(mysqli_affected_rows
					}else{
					  echo '<p class="error">That nickname has already been used.</p>';
			          }
			   }else{
			  echo "<p class='error''>That email address has already been registered. If you you have forgotten your
			  password, <a href='".BASE_URL."/utilities/forgot_password.php'>reteive it.</a>.</p>";
			 }//end if duplicate email
	  }else{//end if($fn && $ln && $n && $e && $p)
	   echo'<p class="error">Please try again.</p>';
	   }
	   mysqli_close($dbc);
	   }
//echo "hi";                        
	   ?>
		
<h2>Register</h2>
<!--add alert jQuery popup thank you for registering please check your email to complete the registration-->
<form class="subform" action="register.php" method="post">
    <fieldset>
	  <p>
	  <label for="first_name"class="label">First Name:</label>
	  <input type="text" name="first_name" 
	                   value="<?php if(isset($trimmed['first_name'])) echo $trimmed['first_name']; ?>" />
	 </p>
					   
	 <p>
	 <label for="last_name" class="label">Last name:</label>
	 <input type="text" name="last_name" 
	                   value="<?php if(isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" />
	</p>
	
	<p>
	 <label for="nickname" class="label">Nickname:</label>
	 <input type="text" name="nickname" 
	                   value="<?php if(isset($trimmed['nickname'])) echo $trimmed['nickname']; ?>" />
	</p>
	<div id="message">Use only letters for nickname.</div> 
	  
	<p>
	<label for="email" class="label">Email:</label>
	<input type="text" name="email" 
	                   value="<?php if(isset($trimmed['email'])) echo $trimmed['email']; ?>" />
	</p>
	
	
	
	<!--<p>
	<label for="email" class="label">time_zone</label>
	<input type="text" name="time_zone" 
	                  />-->
	</p>
			
	<p class="label"><label>Time Zone:</label>
	                    <select  class="formfield140" name="time_zone"> 					 			 
						<option value="America/New_York">Eastern</option>
						<option value="America/Chicago">Central</option>
						<option value="America/Salt_Lake_City">Mountain</option>
						<option value="America/Los_Angeles">Pacific</option>
			            </select></p>
					   
	<div id="message">Select your time zone</div> 
						    
	<p>
	<label for="password" class="label">Password:</label>
	<input type="password" name="password1" 
	                   value="<?php if(isset($trimmed['password1'])) echo $trimmed['password1']; ?>" />
	</p>
	
	<div id="message">Use only letters, numbers and the underscore. Must be between 4 and 20 characters long.</div>
	
	<p>
	<label for="password" class="label">Confirm Password:</label>
	<input type="password" name="password2" 
	                   value="<?php if(isset($trimmed['password2'])) echo $trimmed['password2']; ?>" />
	</p>
					   
   </fieldset>
   <input type="submit" name="submit" value="Register" id="submit"/>
   </form>

 <?php include('../headers_menus_footers/footer18.html'); ?> 