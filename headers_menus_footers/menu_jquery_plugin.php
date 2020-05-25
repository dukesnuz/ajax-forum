<!--
 <style>
#navigation ul, #navigation li {
	margin: 0;
	padding: 0;
	list-style-type: none;
}

#navigation a {
	background-color: #6F0; 
	text-decoration: none;
	font: 16px 'ColaborateLightRegular', Arial, sans-serif;
	text-indent: 10px;
	border-top: 1px solid #ccc;
	border-left:1px solid #ccc;
	border-right:1px solid #999;
	border-bottom:1px solid #999;
	margin: 0px;
	padding: 0px;
	color: #F06;
	font-weight: bold;
}

#navigation a:hover {
	border-top:1px solid #999;
	border-left:1px solid #999;
	border-right:1px solid #ccc;
	border-bottom:1px solid #ccc;
	background-color:#FF6;
	color: #036;
	font-weight: bold;
}

#navigation .stack > a {
	background-image: url(_images/arrow.png);
	background-repeat: no-repeat;
	background-position: 97% 8px;
}
#navigation .stack > a:hover {
	background-position: 97% -78px;	
}

#navigation ul .stack > a {
	background-position: 97% -21px;
}

#navigation ul .stack > a:hover {
	background-position: 97% -54px;
}
</style>
-->

<!--<link rel="stylesheet" media="all" href="styles/styles.css?"<?php time();?>" type="text/css"/>-->
<!--start jQuery nav plug in-->
<!--Below for menu  this plugin for menus is messing up jquery on my_trucks.php and my-drivers.php-->
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
 <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
 <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
 <!--<link rel="stylesheet" href="/resources/demos/style.css">-->


<script src="../jquery_plugins/nav1.1.min.js"></script>

<script>
$(document).ready(function(){
  $("#navigation").navPlugin({
	   'itemWidth':150,
	   'itemHeight':20,
	   'navEffect':'fade',
	   'speed':1500
	});//end plugin
});//end ready
</script>

<!--end jQuery nav plug in-->


<script>
$(documnet).ready(function(){
    //$("#navigation").hover({
	//$('#mainNav2').toggle();
	//$("#navigation").hide();
	//)};end hover
)};//end ready
</script>
<!--start old menu links
	<nav class="clear">
	<ul class="mainNav">
       <li><a href="index.php" title="Home Page">Home</a><li />
 /*     <?php
       //if user logged in show logout  and change passord links
       if(isset($_SESSION['user_id']))
       {
	   echo '
	        <li><a href="forum.php" title="Forum">Forum</a></li>
	        <li><a href="post.php" title="Start a new thread.">New Thread</a></li>
			<li><a href="search.php" title="Search the forum">Search</a></li>
	        <li><a href="change_password.php" title="Change your password." class="doubleline">Change Password</a></li>
			<li><a href="contact.php" title="Contact">Contact</a></li>
			<li><a href="about.php" title="About">About</a></li>
			<li><a href="logout.php" title="Logout">Logout</a></li>
			';
	   }else{
	   // not logged in
	    echo '
		      <li><a href="forum.php" title="Forum">Forum</a></li>
			  <li><a href="search.php" title="Search the forum">Search</a></li>
		      <li><a href="register.php" title="Register For The Site">Register</a></li>
		      <li><a href="forgot_password.php" title="Password Retrieval">Retrieve Password</a></li>
			  <li><a href="contact.php" title="Contact">Contact</a></li>
			  <li><a href="about.php" title="About">About</a></li>
			  <li><a href="login.php" title="Login">Login</a></li>
			  ';
        }
	    ?>*/
  </ul>
	</nav>end nav-->
	
	<!--
	<nav class="clear">
	<ul class="mainNav">
       <li><a href="index.php" title="Home Page">Home</a><li />
   /*    <?php
       //if user logged in show logout  and change passord links
       if(isset($_SESSION['user_id']))
	  // if(4>5)
       {
	   echo '
	        <li><a href="forum.php" title="Forum">Forum</a></li>
	        <li><a href="post.php" title="Start a new thread.">New Thread</a></li>
			<li><a href="search.php" title="Search the forum">Search</a></li>
	        <li><a href="change_password.php" title="Change your password.">Change Password</a></li>
			<li><a href="contact.php" title="Contact">Contact</a></li>
			<li><a href="about.php" title="About">About</a></li>
			<li><a href="logout.php" title="Logout">Logout</a></li>
			';
	   }else{
	   // not logged in
	    echo '
		      <li><a href="forum.php" title="Forum">Forum</a></li>
			  <li><a href="search.php" title="Search the forum">Search</a></li>
		      <li><a href="register.php" title="Register For The Site">Register</a></li>
		      <li><a href="forgot_password.php" title="Password Retrieval">Retrieve Password</a></li>
			  <li><a href="contact.php" title="Contact">Contact</a></li>
			  <li><a href="about.php" title="About">About</a></li>
			  <li><a href="login.php" title="Login">Login</a></li>
			  ';
        }
	    ?>*/
  </ul>
	</nav>end nav-->
		<!--<nav class="clear">
	<ul class="mainNav">
       <li><a href="index.php" title="Home Page">Home</a></li>
	   <li><a href="search_city_state_zip.php" title="Search Zip Codes">Zips</a></li>
     /*  <?php
       //if user logged in show logout  and change passord links
       if(isset($_SESSION['user_id']))
       {
	   echo '
			<li><a href="public_profile.php" title="Profiles">Profile</a></li>
			<li><a href="carrier_preferences.php" title="Edit my preferences">Preferences</a></li>
	        <li><a href="my_trucks.php" title="My trucks posted">My Trucks</a></li>
			<li><a href="my_drivers.php" title="My drivers">My Drivers</a></li>
			<li><a href="##" class="press" title="Slide title up and create more screen space." id="headertoggle">Slide Title</a></li>
			';
	   }else{
	   // not logged in
	    echo '
		      
			  ';
        }
	    ?>*/
  </ul>
	</nav>end nav-->
	<!--end old menu-->
 <?php
 /* grab page from history below just here for storage and future use*/
 if(isset($_SERVER["PHP_SELF"]))
	{
	$page = $_SERVER["PHP_SELF"];
	$page= mysqli_real_escape_string($dbc, trim($page));
	}else{
	$page= Null;
	}
 
 ?>
	<!--start new menu with drop down uses jquery plugin--> 
	  <nav class="clear">
	  <ul id="navigation" class="mainNav2">
	     <!--first button-->
	 <?php
	 echo '<li><a href="'.BASE_URL.'/forum/index.php" title="Forum Pages">Forum</a>
	    <ul>';
			
			//if NOT logged in
			echo '<li><a href="'.BASE_URL.'/forum/forum.php" title="Forum">Subjects</a></li>
			      <li><a href="'.BASE_URL.'/forum/search.php" title="Search the forum">Search</a></li>';
		//echo '<li><a href="'.BASE_URL.'/utilities/register.php" title="Register For The Site">Register</a></li>';
		            
          if(isset($_SESSION['user_id']))
		    //if(4>8)
            {
		   	echo '<li><a href="'.BASE_URL.'/forum/post.php" title="Start a new thread.">New Thread</a></li>';
			}else{//not logged in grey outs
			echo '<li><a href="'.BASE_URL.'/utilities/register.php" title="Register For The Site">Register</a></li>';
			echo '<li class="greyout">New Thread</li>';
			  }
			
		echo '</ul>';
		echo '</li>';
		  
				//second button
	/*
		echo '<li><a href="'.BASE_URL.'/trucks/my_trucks.php" title="Carrier Pages">Carriers</a>';
		echo '<ul>';
			
			//if NOT logged in
            //if LOGGED in show logout  and change passord links
        if( (isset($_SESSION['user_id'])) && (isset($_SESSION['carrier_id'])) )
		  //if(4>2)
            {
			  if((isset($_SESSION['user_id']))  && ($_SESSION['carrier_id'] ==0) )
			 //if(4>6)
			   {
		      echo '<li><a href="'.BASE_URL.'/trucks/carrier_preferences.php" title="Edit my preferences">Sign Up</a></li>';
			  echo'<li class="greyout">My Trucks</a></li>
			  <li class="greyout">My Drivers</a></li>
			  <li class="greyout">Profile</a></li>
			  <li class="greyout">Preferences</a></li>
			';
			}else{
 	   echo'<li><a href="'.BASE_URL.'/trucks/public_profile.php" title="Profiles">Profile</a></li>';
	   echo '<li><a href="'.BASE_URL.'/trucks/carrier_preferences.php" title="Edit my preferences">Preferences</a></li>
	        <li><a href="'.BASE_URL.'/trucks/my_trucks.php" title="My trucks posted">My Trucks</a></li>
	        <li><a href="'.BASE_URL.'/trucks/my_drivers.php" title="My drivers">Post Trucks</a></li>
			<li><a href="'.BASE_URL.'/trucks/my_drivers.php" title="My drivers">My Drivers</a></li>
			<li><a href="'.BASE_URL.'/trucks/search_loads.php" title="Search For Posted Loads">Search Loads</a></li>
		       <li><a href="'.BASE_URL.'/trucks/my_booked_loads.php" title="Loads booked with shippers">My Booked Loads</a></li>
		    ';
			     }//end if((issett($_SESSION['user_id']))  && (S_SESSION
			}else{//not logged in greyouts
	
         echo '<li><a href="'.BASE_URL.'/utilities/register.php" title="Register For The Site">Register</a></li>';
			 
	     echo'<li class="greyout">My Trucks</a></li>
			  <li class="greyout">My Drivers</a></li>
			  <li class="greyout">Profile</a></li>
			 <li class="greyout">Preferences</a></li>
			';
			  }//end if issett ($_SESSION['user_id']
		
			?>
  
  
	  	   </ul>
		  </li>
	
	     <!--third button-->
		 <?php

		echo '<li><a href="'.BASE_URL.'/loads/my_loads.php" title="Shipper Pages">Shippers</a>';
		echo '<ul>';
			
			//if NOT logged in
            //if LOGGED in show logout  and change passord links
          if( (isset($_SESSION['user_id'])) && (isset($_SESSION['shipper_id'])) )
		  //if(4>2)
            {
			 if((isset($_SESSION['user_id']))  && ($_SESSION['shipper_id'] ==0) )
			 //if(4>2)
			   {
		      echo '<li><a href="'.BASE_URL.'/loads/shipper_preferences.php" title="Edit my preferences">Sign Up</a></li>';
		 echo'<li class="greyout">My Loads3</a></li>
			  <li class="greyout">Profile</a></li>
			  <li class="greyout">Preferences</a></li>
			';
			}else{
	   echo'<li><a href="'.BASE_URL.'/loads/public_profile.php" title="Profiles">Profile</a></li>';
	   echo '<li><a href="'.BASE_URL.'/loads/shipper_preferences.php" title="Edit my preferences">Preferences</a></li>
	        <li><a href="'.BASE_URL.'/loads/my_loads.php" title="My loads posted">My Loads</a></li>
	        <li><a href="'.BASE_URL.'/loads/post_load.php" title="Post loads">Post Loads</a></li>
	        <li><a href="'.BASE_URL.'/loads/search_trucks.php" title="Search For Posted Trucks">Search Trucks</a></li>
	        <li><a href="'.BASE_URL.'/loads/my_booked_loads.php" title="Loads booked with carriers">My Booked Loads</a></li>
		  
		    ';
			     }//end if((issett($_SESSION['user_id']))  && (S_SESSION
			}else{//not logged in greyouts 
	
         echo '<li><a href="'.BASE_URL.'/utilities/register.php" title="Register For The Site">Register</a></li>';
			 
	     echo'<li class="greyout">My Loads</a></li>
			  <li class="greyout">Profile</a></li>
			  <li class="greyout">Preferences</a></li>
			 ';
			  }//end if issett ($_SESSION['user_id']
*/
			?>
<!--		   </ul>
</li>-->
	
		 
		  
		  <!--fourth button-->
		  <li><a href="##" title="Utilites">Utilities</a>
		    <ul>
			<?php
			//if NOT logged in
            //if LOGGED in show logout  and change passord links
            if(isset($_SESSION['user_id']))
		    //if(4>8)
            {
	   echo'  <li><a href="'.BASE_URL.'/utilities/search_city_state_zip.php" title="Search cities for a zip code">City Search</a></li>
	          <li><a href="'.BASE_URL.'/utilities/search_zip_codes.php" title="Search zip Ccdes for a city">Zip Code Search</a></li>
	          <li><a href="'.BASE_URL.'/utilities/forgot_password.php" title="Password Retrieval">Forgot Password</a></li>
	          <li><a href="'.BASE_URL.'/utilities/change_password.php" title="Change your password." class="doubleline">Change Password</a></li>
			  <li><a href="'.BASE_URL.'/utilities/contact.php" title="Contact">Contact</a></li>
			  <li><a href="'.BASE_URL.'/utilities/help.php" title="Need Help?">Need Help?</a></li>
			  <li><a href="'.BASE_URL.'/utilities/error_report.php?page='.$page.'">Report an Error</a></li>
			  <li><a href="'.BASE_URL.'/utilities/about.php" title="About">What We Do</a></li>
			  <li><a href="##" title="Policy">Policy</a></li>
			  <li><a href="##" title="Privacy">Privacy</a></li>
			';
			}else{//not logged in greyouts
	   echo '<li><a href="'.BASE_URL.'/utilities/search_city_state_zip.php" title="Search cities for a zip code">City Search</a></li>';
	   echo '<li><a href="'.BASE_URL.'/utilities/search_zip_codes.php" title="Search zip Ccdes for a city">Zip Code Search</a></li>';
	   echo '<li><a href="'.BASE_URL.'/utilities/forgot_password.php" title="Password Retrieval">Forgot Password</a></li>';
	   echo ' <li><a href="'.BASE_URL.'/utilities/register.php" title="Register For The Site">Register</a></li>';
	   echo ' <li><a href="'.BASE_URL.'/utilities/contact.php" title="Contact">Contact</a></li>
	          <li><a href="'.BASE_URL.'/utilities/help.php" title="Need Help?">Need Help?</a></li>
			  <li><a href="'.BASE_URL.'/utilities/about.php" title="About">What WE Do</a></li>
			  <li><a href="##" title="Policy">Policy</a></li>
			  <li><a href="##" title="Privacy">Privacy</a></li>
			';
			  }
			?>
		   </ul>
		  </li>
		  
		  	   <!--fifth button-->
		<?php
		echo  '<li><a href="'.BASE_URL.'/utilities/help.php" title="Need Help?">Need Help?</a></li>';
		?>
		   <!--end fifth button-->
		  
		   <!--sixth button-->
		 <li>
		<?php
		if(isset($_SESSION['user_id']))
		  //if(4>5)
            {
	   echo'<a href="'.BASE_URL.'/utilities/logout.php" title="Login">Logout</a>';
			}else{//not logged in greyouts
	   echo '<a href="'.BASE_URL.'/utilities/login.php" title="Login">Login</a>';
			  }
	  echo '</li>';
		?>
		   
	
		   
			   <!--seventh button-->
		<li><a href="##" class="press" title="Slide title up and create more screen space." id="headertoggle">Slide Title</a></li>

	 </ul>
 </nav>

