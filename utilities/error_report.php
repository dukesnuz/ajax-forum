<?php #loaded and rolling -contact.php
//require('includes/config.inc.php');//moved to header
//validate something entered

$page_title='Report an error @ LoadedandRolling';
//select which menu to use
$menu_type = "menu_jquery";
//$menu_type = "menu_css";
include('../headers_menus_footers/header18.html'); 


//grab page error on from url
 if(!empty($_GET['page']))
  {
   $page= $_GET['page'];
   }else{
  	$page= NULL;
  }
//grab user id//
    if(isset($_SESSION['user_id']))
   {
   	$uid = $_SESSION['user_id'];
   }else{
   	$uid = NULL;
   }
if($_SERVER['REQUEST_METHOD'] == 'POST'){

//error connecting to databse
//require('includes/mysqli_connect.php');
//



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
if(empty($_POST['comment'])){
   $errors[] = 'You forgot to enter a comment.';
   }else{
   $c= mysqli_real_escape_string($dbc, trim($_POST['comment']) );
   }

  
//check if ok to register user

if(empty($errors)){


//get refferal page
/*
if(isset($_SERVER["HTTP_REFERER"]))
{
$page =$_SERVER["HTTP_REFERER"];
}else{
$page="Let us know the page the error is on.";
}
*/
$page= mysqli_real_escape_string($dbc, trim($_POST['page']) );
//get ip address
$ip=$_SERVER['REMOTE_ADDR'];


//http://dukesnuz.com/d/phppercolate6/ch9/includes/mysqli_connect.php
 
$q= "INSERT INTO contact(user_id, name, email, comment, subject,comment_type, ip, comment_date, page)
	VALUES('$uid','$n', '$e', '$c','error_reported', 'error_reported', '$ip', NOW(), '$page' )";

$r= @mysqli_query ($dbc, $q);

if ($r){
   $body ="Thank you for reporting this error! \n".BASE_URL;
						//$body .= BASE_URL . ':81/ch18/activate.php?x='.urlencode($e)."&y=$a";
						
						//mail($e,'Your Message Recieved',$body, 'From:www.loadedandrolling.info');
						mail($e,'Your Message Recieved',$body, 'From:'.EMAIL);
						
						echo '<h2>Thank you for reporting this error!</h2>';
				        
						//send email to me
	$body ="From:-". $e ."\n Message:-".$c."\n Page:-".$page;
						//mail('contactus@loadedandrolling.com','Message@Loadedandrolling',$body, 'From:www.loadedandrolling.info');
                        mail(EMAIL,'Message@'.BASE_URL,$body, 'From:'.EMAIL);
 
   }else{
  echo '<h1>System Error</h1><p class="error">Your message did not complete. We apologize for any inconvenience.</p>';
  echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
   } //End of if ($r) IF.

//mysqli_close($dbc);

include('../headers_menus_footers/footer17.html');
exit();

}else{ //Report the errors.
  echo '<h1>Error!</h1><p class="error"> The following error(s) occurred:<br />';
  foreach ($errors as $msg){ //Print each error.
  echo" - $msg<br />\n";
  }
  echo '</p><p>Please try again.</p><p><br /></p>';
  
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
<h2>Please fill out the form to report a page error/bug.</h2>

 <form class="subform" action="error_report.php" method="post">
 
 	   	 <p><label for="name" class="label">Name:</label>
		       <input type="text" name="name" 
 		         value="<?php echo $name; ?>"</p>
		  			   
		<p><label for="email" class="label">Email:</label>
		          <input  type="text" name="email" 
		  value="<?php echo $email; ?>"</p>

		  
		  <p><label for="page" class="label">Page error on:</label>
		          <input  type="text" name="page" 
		  value="<?php echo $page; ?>"</p>
		  
		  
           <p><label for="comment" class="label">Message:</p> <textarea name="comment">
		     <?php if(isset($_POST['comment'])) echo $_POST['comment']; ?></textarea></p>
  
  
           <p><input type="submit" name="submit" value="Send!" /></p>
  </form>
  
  <?php include('../headers_menus_footers/footer17.html');