	<?php
   //turn off page history
	if(4>2)
	//if(isset($dbc));
	   {
		
	//check if acessing page alone
	if(!isset($words))
	{
	exit();
	}
	
	// Get the user's browser
	
	function get_user_browser()
	{
		$user_agent = $_SERVER['HTTP_USER_AGENT'];
		if(preg_match('/MSIE/i',$user_agent))
		{
			$Browser = "IE";
		}
		elseif(preg_match('/Firefox/i',$user_agent))
		{
			$Browser = "Firefox";
		}
		elseif(preg_match('/Safari/i',$user_agent))
		{
			$Browser = "Safari";
		}
		elseif(preg_match('/Chrome/i',$user_agent))
		{
			$Browser = "Chrome";
		}
		elseif(preg_match('/Opera/i',$user_agent))
		{
			$Browser = "Opera";
		}
		else
		{
			$Browser = "Other";
		}
	   
		return $Browser;
	} 
	$Browser = get_user_browser();
	
 
   
   //insert int database
    //set variable if null 
    
    if(isset($page_title))
	{
	//$page_title= mysqli_real_escape_string($dbc, trim($page_title));
	$page_title=$page_title;
	}else{
	$page_title= Null;
	}
	
    
	//$Host ='host'. $_SERVER['REMOTE_HOST'];
	if(isset($_SERVER['REMOTE_ADDR']))
	{
	$host =gethostbyaddr($_SERVER['REMOTE_ADDR']);
	//$host= mysqli_real_escape_string($dbc, trim($host));
	}else{
    $host= Null;
	}
	
	if( (isset($_SERVER['HTTP_HOST']))  && (isset($_SERVER['REQUEST_URI'])) )
	{
	$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	//$url= mysqli_real_escape_string($dbc, trim($url));
	}else{
	$url= Null;
	}
	

	if(isset($_SERVER["PHP_SELF"]))
	{
	$page = $_SERVER["PHP_SELF"];
	//$page= mysqli_real_escape_string($dbc, trim($page));
	}else{
	$page= Null;
	}
	
	
	if(isset($_SERVER['REMOTE_ADDR']))
	{
    $ip=$_SERVER['REMOTE_ADDR'];
	//$ip= mysqli_real_escape_string($dbc, trim($ip));
	}else{
	$ip= Null;
	}
	

	
	if(isset($_SERVER['HTTP_REFERER']))
	{
	$page_from=$_SERVER['HTTP_REFERER'];
	//$page_from= mysqli_real_escape_string($dbc, trim($page_from));
	}else{
	$page_from= Null;
	}
	
	
	if(isset($_SERVER['REQUEST_TIME']))
	{
	$page_time = $_SERVER['REQUEST_TIME'];
	//$page_time= mysqli_real_escape_string($dbc, trim($page_time));
	}else{
	$page_time= Null;
	}
	
	if(isset($_SESSION['user_id']))
	{
	$uid = $_SESSION['user_id'];
	//$uid = mysqli_real_escape_string($dbc, trim($_SESSION['user_id']));
	}else{
	$uid = Null;
	}
	

	if(isset($Browser))
	{
	//$Browser = mysqli_real_escape_string($dbc, trim($Browser));
	$Browser=$Browser;
	}else{
	$Browser= Null;
	}
	
	//print data that will be entered
  /*
   echo $ip;
   echo '<br>';
   echo $host;
   echo '<br>';
   echo $url;
   echo '<br>';
   echo $page;
   echo '<br>';
   echo $page_from;
   echo '<br>';
   echo $page_time;
   echo '<br>';
   echo $page_title;
   echo '<br>';
   echo $uid;
   echo '<br>';
   echo $Browser;
   echo '<br>';
   */
   
   
   //insert into DB
  // $track_id is getting its value from config.inc.php page
  $h= "INSERT INTO page_views(user_id,track_id,ip,browser,host,url,page,page_from,page_time,page_title)
             VALUES('$uid','$track_id','$ip','$Browser','$host','$url','$page','$page_from','$page_time','$page_title')";
			 $hr=mysqli_query($dbc, $h);
              
			 if(mysqli_affected_rows($dbc) ==1)
			 {
			 echo 'Thank you for visting';
			 }else{
			 echo 'error';
			 }
			 //mysqli_free_result($hr);
			 //mysqli_close($dbc);
}//END