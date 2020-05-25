<?php
    //check if updating subscriptions of just adding their email address to our database
    if($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['id'])) )
      {
//add sql query here
//connect to database
require_once('../loadedandrolling_mysqli_connect/mysqli_connect.php');
//require_once('../loadedandrolling_mysqli_connect/local_mysqli_connect.php');
$id = $_POST['id'];
//grab current setting to input if none selected
$address_id = $id;
    $q= "SELECT campaign_type_1, campaign_type_2,campaign_type_3
         FROM emails WHERE address_id = '$address_id' ";
    $e= @mysqli_query($dbc,$q);
	   if(mysqli_num_rows($e) ==1)
	   {
	   $row = mysqli_fetch_array($e,MYSQLI_NUM);
	   //$row=mysqli_fetch_array($r, MYSQLI_ASSOC))
	   //echo 'ok';
       }else{
  	   echo '<p class="error">OOPS System error.</p>';
	   die();
       }
//end grab current settings	   
//check if radio button selected if not checked get value from database
if(isset($_POST['campaign_type_1']))
{
$campaign_type_1=$_POST['campaign_type_1'];
$campaign_type_1= mysqli_real_escape_string($dbc, trim($campaign_type_1));
}else{
$campaign_type_1=$row[0];
$campaign_type_1= mysqli_real_escape_string($dbc, trim($campaign_type_1));
}
/////**********************
if(isset($_POST['campaign_type_2']))
{
$campaign_type_2=$_POST['campaign_type_2'];
$campaign_type_2=mysqli_real_escape_string($dbc, trim($campaign_type_2));
}else{
$campaign_type_2=$row[1];
$campaign_type_2= mysqli_real_escape_string($dbc, trim($campaign_type_2));
}
//////**********************
if(isset($_POST['campaign_type_3']))
{
$campaign_type_3=$_POST['campaign_type_3'];
$campaign_type_3=mysqli_real_escape_string($dbc, trim($campaign_type_3));
}else{
$campaign_type_3=$row[2];
$campaign_type_3= mysqli_real_escape_string($dbc, trim($campaign_type_3));
}

$update = "UPDATE emails 
       SET campaign_type_1 = '$campaign_type_1', campaign_type_2 = '$campaign_type_2', campaign_type_3 = '$campaign_type_3'
       WHERE address_id= '$id' LIMIT 1";
		 
		 	
			 $r=@mysqli_query($dbc,$update);
			
			      if(mysqli_affected_rows($dbc) ==1)
			      {
			      //echo 'ok';
				   //return to original page
				 /*  if(!headers_sent()){
	                header("location:../utilities/email_subscriptions.php?id=$id");
				    //exit();
				    die();
				   }else{
				   //echo "<meta http-equiv='location' content='../utilities/email_subscriptions.php?id=$id'";
				    echo "<a href='http://www.loadedandrolling.info/utilities/email_subscriptions.php?id=$id'>Head Back</a>";
					die();
				   	}*/
				   	$error='pass';
			    }else{
			      //echo '<p class="error">OOPS! system error please contact us. Possible cause is no changes where made.</p>';
				  //echo "<a href='http://www.loadedandrolling.info/utilities/email_subscriptions.php?id=$id'>Head Back</a>";
				  //die();
				  $error='fail';
				  //echo $campaign_type_1;
				  //echo $campaign_type_2;
				  //echo $campaign_type_3;
				}//end if mysqli ==1
	           echo $error;
  }else{
  	
	 echo '<p class="error">OOPS System error. You accessed this page in error.</p>';
	 die();
  }
  	//end if isset $_GET
  	
