<?php
 if(empty($_POST['address']))
	 {
      	echo 'empty';
		die();
      }
   
   	 
if(isset($_POST['address']))
   //check if field data entered
    
  
{
//get page title
$page_title = 'add_email_ajax.php';
    			
//require('includes/mysqli_connect.php');
		     include('../site_utilities/config.inc.php');
		     require(MYSQL); 

   //check if field data entered
     // add here to check if we have address then echo added die
    //if email address not in database add it else notify person already in
        $e = $_POST['address'];
	    $e= trim($e);
        
		 //start add add to history
		 //retrive ip for history input
	     $ip=$_SERVER['REMOTE_ADDR'];
	     $ip = mysqli_real_escape_string($dbc,trim($ip));
		 $page_title = mysqli_real_escape_string($dbc,trim($page_title));
		 $qe= "INSERT INTO history(user_input, ip, web_page_title, event, Date)
		       VALUES('$e','$ip', '$page_title','subscribe_email_campaign', UTC_TIMESTAMP)";
	     $r=mysqli_query($dbc,$qe);
		 //end add to history
		 
	    $q= "SELECT address FROM emails WHERE address = '$e' ";
		$result = mysqli_query($dbc, $q) or trigger_error("Query:$q\n<br />MySQL Error: ". mysql_error($dbc));
		if(mysqli_num_rows($result) > 0)
		{
		echo 'added';
			die();
		}
			

	//check if valid email address
 if(filter_var($_POST['address'], FILTER_VALIDATE_EMAIL))  
   {
   	$e=isset($_GET['address']) ? $_GET['address'] : $_POST['address'];
     $e = mysqli_real_escape_string($dbc, trim($e));
		   
   }else{
   	echo 'fail';
	die();
   } 
          
 //used subscribe email address to emails table
 //validste email address
 
    //$e =$_POST['address'];
	//$e = mysqli_real_escape_string($dbc, trim($e));
	$address_id =md5(uniqid(rand(), true));
	$email_hash = sha1($e);
	$page = $_SERVER['HTTP_HOST'];
	$emailq = "INSERT INTO emails(address,address_id, email_hash,collected_from,ip)
			 	                   VALUES('$e','$address_id','$email_hash','$page','$ip')";
					
		        $result = mysqli_query($dbc,$emailq);
			    if(mysqli_affected_rows($dbc) == 1)
				{
					$error= 'pass';
				}else{
					$error= 'fail';
				}
				echo $error;
				//echo $e;	
		
}else{

die();

}


				 