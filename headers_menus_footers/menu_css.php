
 <!-- this menu_css.php will only use css and will not use jquery as I have some pages the a jquery 
 plugin menu will not work on-->
 <!--
 <style>
 .greyout{
    background-color: rgba(0,0,0, .33);
    color: rgba(255,0,0, .9);
    font-weight:bold;
     }

  a{
  text-decoration:none; 
  display:inline-block;
  padding: 1px 2px 1px 2px;
  background-color:#FAF4FF;
  font-size: .875em;
  color:#008000;
  }
nav3 ul{
    max-width: 1200px;
    margin: 0 auto;
     }
     
.mainNav3{
   margin: 0;
   padding:0;
   padding-bottom:21px;
   list-style:none;
   border-left: none;
   border-left: 1px dashed #999999;
  /* overflow:hidden;*/
   text-align:center;
 
    }
 .mainNav3 a{
   color:#1B06A0;
   font-size:.8em;
   font-weight:900;
   text-transform:uppercase; 
   text-decoration:none;
   border: 1px solid #FCFF10;
   border-bottom:none;
   border-radius:  10% 10% 10% 10%;
   display:block;
   padding: 1px 2px 1px 2px;
   background-color:#FF592A;

   line-height:16px;
   }
.mainNav3 .doubleline{
    line-height: 16px;
     }
.mainNav3 li{
  float:left;
  width: none;
  

   }
.mainNav3 a{
	-webkit-transition:-webkit-transform .5s,
						background-color 1s ease-in 5s;
  	-moz-transition:-moz-transform .5s,
						background-color 1s ease-in .5s;
	-o-transition:-o-transform .5s,
						background-color 1s ease-in .5s;
	transition: transform .5s,
	                    background-color 1s ease-in .5s;
	 }
.mainNav3 a:hover{
    font-size:1em;
	background-color:#FFF128;
	-webkit-transform:scale(.9);
	-moz-transform:scale(.9);
	-0-transform:scale(.9);
	transform:scale(.9);
	 }
	 
 .mainNav3 li{
   float:left;
   position:relative;
   width: 150px;
   height:20;
   margin-right:2px;
   }
 .mainNav3 ul{
 list-style:none;
 display:none;
 position:absolute;

 z-index:9999;
  }
 .mainNav3 li:hover >ul{
 display:block;
  }
 </style>
 -->
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
	<!--start new menu with drop down--> 
	  <nav class="clear">
	 <ul id="navigation" class="mainNav3">
	     <!--first button-->
		<?php   
	    echo '<li><a href="'.BASE_URL.'/forum/index.php" title="Forum Pages">Forum</a>
		    <ul>';
		    
			//if NOT logged in
			echo '<li><a href="'.BASE_URL.'/forum/forum.php" title="Forum">Subjects</a></li>
			      <li><a href="'.BASE_URL.'/forum/search.php" title="Search the forum">Search</a></li>';
		            
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
		  // if(4>2)
            {
			  if((isset($_SESSION['user_id']))  && ($_SESSION['carrier_id'] ==0) )
			  //if(4>2)
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
			 
	     echo'<li class="greyout">My Loads6</a></li>
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
		   
		   <!--sixth button-->
		 <?php
		echo  '<li><a href="'.BASE_URL.'/utilities/help.php" title="Need Help?">Need Help?</a></li>';
		?>
		   <!--end sxth button-->
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

