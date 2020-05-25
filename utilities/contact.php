<?php #loaded and rolling -contact.php
//require('includes/config.inc.php');//moved to header
//validate something entered
$page_title='ContactUs @ AjaxForums';
//select which menu to use
$menu_type = "menu_jquery";
//$menu_type = "menu_css";
include('../headers_menus_footers/header17.html'); 

if($_SERVER['REQUEST_METHOD'] == 'POST'){

//error connecting to databse
//require('includes/mysqli_connect.php');

//

if(isset($_SESSION['user_id']))
{
$uid =mysqli_real_escape_string($dbc, trim($_SESSION['user_id']));
}else{
$uid =0;
}

$errors = array();

// check to make sure fields entered and set variable
if(empty($_POST['name'])){
   $errors[] = 'You forgot to enter yourname.';
   }else{
   $n = mysqli_real_escape_string($dbc, trim($_POST['name']) );
   } 
  //if(empty($_POST['email'])){
  if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
   $e = mysqli_real_escape_string($dbc, trim($_POST['email']) );
   }else{
    $errors[] = 'You forgot to enter your email.';
   }
   if(empty($_POST['subject'])){
   $errors[] = 'You forgot to enter a subject.';
   }else{
   $s= mysqli_real_escape_string($dbc, trim($_POST['subject']) );
   }
   
   if(empty($_POST['comment_type'])){
   $errors[] = 'You forgot to enter a comment type.';
   }else{
   $ct=mysqli_real_escape_string($dbc, trim($_POST['comment_type']));
    }
    
if(empty($_POST['comment'])){
   $errors[] = 'You forgot to enter a comment.';
   }else{
   $c= mysqli_real_escape_string($dbc, trim($_POST['comment']) );
   }
   //get ip address
  $ip=$_SERVER['REMOTE_ADDR'];
//check if ok to register user

if(empty($errors)){

$page ="contact.php";

//http://dukesnuz.com/d/phppercolate6/ch9/includes/mysqli_connect.php
 
$q= "INSERT INTO contact(user_id,name, email,subject, comment, comment_type, ip, comment_date, page)
	VALUES('$uid','$n', '$e', '$s','$c','$ct','$ip', NOW(), '$page' )";

$r= @mysqli_query ($dbc, $q);

if ($r){
   $body ="Thank you for your message! \n We will respond back within 24 hours.\n".BASE_URL;
						//$body .= BASE_URL . ':81/ch18/activate.php?x='.urlencode($e)."&y=$a";
						
						//mail($e,'Your Message Recieved',$body, 'From:www.loadedandrolling.info');
						mail($e,'Your Message Recieved',$body, 'From:'.EMAIL);
						
						echo '<h2>Thank you for your message! We will respond back within 24 hours.</h2>';
				        
						//send email to me
	$body ="From:-". $e ."\n Message:-".$c;
						//mail('contactus@loadedandrolling.com','Message@Loadedandrolling',$body, 'From:www.loadedandrolling.info');
                        mail(EMAIL,'Message@'.BASE_URL,$body, 'From:'.EMAIL);
 
   }else{
  echo '<h1>System Error</h1><p class="error">Your message did not complete. We apologize for any inconvenience.</p>';
  echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
   } //End of if ($r) IF.

//mysqli_close($dbc);throughs error on page_history.php

include('../headers_menus_footers/footer17.html');
exit();

}else{ //Report the errors.
  echo '<h1 class="error">Error!</h1><br><p class="error"> The following error(s) occurred:<br />';
  foreach ($errors as $msg){ //Print each error.
  echo" - $msg<br />\n";
  }
  echo '</p><br><p class="error">Please try again.</p>';
  
  }//End of if (empty($errors)) IF.
  
  //close close mysqli
   mysqli_close($dbc);
  } //End of the main Submit conditional.  
//I added next lines
if(isset($_SESSION['first_name'])) 
   {
   $name = $_SESSION['first_name'];
   }else{
   $name = NULL;
   }
if(isset($_SESSION['email']))
   {
   $email= $_SESSION['email'];
    }else{
	$email = NULL;
	}
		
?>
<h2>Please fill out the form to contact us.</h2>
 <form class="subform" action="contact.php" method="post">
 
 	   	 <p><label for="name" class="label">Name:</label>
		       <input type="text" name="name" 
 		         value="<?php echo $name; ?>"</p>
		  <div id="message">Required</div> 	
		     
		<p><label for="email" class="label">Email:</label>
		          <input  type="text" name="email" 
		  value="<?php echo $email; ?>"</p>
             <div id="message">Required</div>
             
			    <p  class="label"><label>Comment Type</label>
			    	    <select class="formfield140" name="comment_type">
			    	    <option></option>
			    	    <option value="billing_help">Billing Help</option>
			    	    <option value="carrier_help">Carrier Help</option>
			    	    <option value="forum_help">Forum Help</option>
			    	    <option value="general_help">General Help</option>
			    	    <option value="remove_email">Remove Email</option>
			    	    <option value="error_reported">Report an Error</option>
			    	    <option value="send_url">Send Us A Link</option>
			    	    <option value="shipper_help">Shipper Help</option>
			    	    <option value+"user_suggestions">Your Suggestions</option>
			    	    <option value="none_of_the_above">None of the Above</option>
			    	    </select></p> <p> <div id="message">Required</div></p>
		
			            
		   	     
           <p><label for="subject" class="label">Subject:</label>
		          <input  type="text" name="subject" 
		  value="<?php if(isset($_POST['subject'])) echo $_POST['subject']; ?>"</p>
		  <div id="message">Required</div>
		  
	           <p><label for="comment" class="label">Message:</p> <textarea name="comment">
		     <?php if(isset($_POST['comment'])) echo $_POST['comment']; ?></textarea></p>
              <div id="message">Required</div>
  
           <p><input type="submit" name="submit" value="Send!" /></p>
  </form>
  
  <?php include('../headers_menus_footers/footer17.html');
         