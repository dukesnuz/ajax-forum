<?php // search_city_zip_ajax.php
     //used with page city_zip_search.php
	 //retrieves city zip state info from myql loadedandrolling
//connection to database
//require('../../loadedandrolling_mysqli_connect/mysqli_connect.php');
//include('../includes/mysqli_connect.php');
require('../site_utilities/config.inc.php');
require(MYSQL);
if(isset($_GET['term']))
//if(4>1)
{
$return_arr=array();
			        //$_GET['term']='m';
				    $term=$_GET['term'];
                   
					$stmt="SELECT city, state, zip, latitude, longitude FROM zip_codes
				           WHERE city LIKE '$term%' ORDER BY city ASC, state ASC,zip ASC";
								
					  $r = mysqli_query($dbc, $stmt);
	/* ******
	 * adding to history not working for this page
	 * ******** 			  
	//insert event into database	
//retrive ip for history input
$ip=$_SERVER['REMOTE_ADDR'];
$ip = mysqli_real_escape_string($dbc,trim($ip));
$oc= mysqli_real_escape_string($dbc, trim($oc));
$page_title='zip code search @ LoadedandRolling';
$page_title=mysqli_real_escape_string($dbc, trim($page_title));	
$term=mysqli_real_escape_string($dbc, trim($term));	   
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
		       VALUES('$ip','$term', '$uid', '$page_title','Search_City_State_Zip', UTC_TIMESTAMP)";
	     $r=mysqli_query($dbc,$q);
	     //END record user zip input
 	*/
					
				 //check if records returned			   				   
				      if(mysqli_num_rows($r)>0)
				      {	   
				        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
				        {
		 //below used when not filling in fields with new data
		 //$return_arr[] ='City:'.$row['city_origin'].',State:'.$row['state_origin'].',Zip:'. $row['zip_origin'];
					  $return_arr[] =array(
					  'value'=>'City:'.$row['city'].',State:'.$row['state'].',Zip:'. $row['zip'].',Latitude:'.$row['latitude'].',Longitude:'.$row['longitude'],
					  'city'=>$row['city'],
					  'state'=>$row['state'],
					  'zip'=> $row['zip'],
					  'latitude'=>$row['latitude'],
					  'longitude'=>$row['longitude']
					   );
					    
						
						 //echo $return_arr[] = $row['city_origin'];  
				        }//end while
                
                      
			         //Toss back results as json encoded array.
			         echo json_encode($return_arr);
				   }//end if mysqli_num
}//end if isset
?>
					
					