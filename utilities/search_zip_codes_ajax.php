<?php
//search_zip_codes_ajax.php... ajax page for search_zip_codes.php
if(isset($_POST['zip']))
{
//retrieve user ip
$ip=$_SERVER['REMOTE_ADDR'];
$oc=$_POST['zip'];
//$oc="38104";
require('../loadedandrolling_mysqli_connect/mysqli_connect.php');

 //insert event into database	
$ip= mysqli_real_escape_string($dbc, trim($ip));
$oc= mysqli_real_escape_string($dbc, trim($oc));
$page_title= 'Search Zip Codes For City, State, Longitude, Latitude @ loadedandrolling';
$page_title=mysqli_real_escape_string($dbc, trim($page_title));		   
          session_start();
         // record user zip input
		 if(isset($_SESSION['user_id']))
		 {
		 $uid=$_SESSION['user_id'];
		 }else{
		 $uid = 0;
		 }
         //record correct username of password login attempt
		 $q= "INSERT INTO history( ip,user_input, user_id, web_page_title, event, Date)
		       VALUES('$ip','$oc', '$uid', '$page_title','Search_Zip_Codes', UTC_TIMESTAMP)";
	     $r=mysqli_query($dbc,$q);
	     //END record user zip input


					 
					 
//below testing a search if more than 1 record foound
$sr ="SELECT city, state, zip,latitude, longitude FROM zip_codes WHERE zip = '$oc'";

		    $r=@mysqli_query($dbc,$sr);
		
              if(mysqli_num_rows($r) > 0)
	          {
			 
	         $table="<table class='postings' id='ziptable'>";
			 $table.="<caption>Search Results For Zip Code: $oc</caption";
			 $table.="<tr>";

			 $table.="<th>CITY</th>";
			 $table.="<th>STATE</th>";
			 $table.="<th>ZIP</th>";
			 
			 $table.="<th>LATITUDE</th>";
			 $table.="<th>LONGITUDE</th>";
			 
			 $table.="<tr>";
			 
	         while($row =mysqli_fetch_array($r, MYSQLI_ASSOC))
	          {
             $table.="<tr>";
            
              
             $table.="<td id=\"city\">$row[city]</td>";
			 $table.="<td id=\"state\">$row[state]</td>";
			 $table.="<td id=\"zip\">$row[zip]</td>";
			 
			 $table.="<td id=\"lat\">$row[latitude]</td>";
			 $table.="<td id=\"lon\">$row[longitude]</td>";
			

			 $table.="</tr>";
		  }//end while
               $table.="</table>";
		  echo $table;
		  
		 //echo '<div id="viewmap" class="press">map</div';
     }else{
		  echo 0;
	      }//end if mysqli_num_rows
	  }//end if post
?>

