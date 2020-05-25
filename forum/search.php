<?php #My_forum - search.php
//This page dispalys and handles a search form.
//require('includes/config.inc.php');//moved to header
$page_title= 'Forum Search @ AjaxForums';
//select which menu to use
$menu_type = "menu_jquery";
//$menu_type = "menu_css";
include('../headers_menus_footers/header17.html');

// grab user time zone
  if(isset($_SESSION['time_zone']))
  {
  $tz = $_SESSION['time_zone'];
  }else{
  $tz='America/New_York';
  }


//Show search form
echo '<form class="subform" action="search.php" method="get" accept-charset="utf-8">
            <p>
			<label for="search" class="label">Search</label>';
			
		   echo'	<p>Select a search of<span class="input">
          <input type="radio" name="search" value="subject"/>Subject
          <input type="radio" name="search" value="body"/>Body
           </span></p>';
			
	 echo '<input name="terms" type="text" ';
     

     //below line in book I did not use because I did not want to have to add words into language table
     //<p><em>' . $words['search'] . '</em>:<input name="terms" type="text" size="30" maxlength="60" ';
     //I did not add search to words databse
	
	     
//check for existing 
if(isset($_GET['terms']))
   {
   echo 'value="' . htmlspecialchars($_GET['terms']) . '" ';
    
   }
   

 
//complete the form
echo '/><input name="submit" type="submit"
         value="' . $words['submit'] . '"   /></p></form>';
 
if(isset($_GET['terms']))
    {
	     $terms= mysqli_real_escape_string($dbc,htmlentities(strip_tags($_GET['terms'] )) );
		 
		 
          //retrive ip for history input
	     $ip=$_SERVER['REMOTE_ADDR'];
	     $ip = mysqli_real_escape_string($dbc,trim($ip));
		 $in= mysqli_real_escape_string($dbc, trim($terms) );  
		 if(isset($_SESSION['user_id']))
		 {
		 $uid=$_SESSION['user_id'];
		 }else{
		 $uid = 0;
		 }
		 $uid= mysqli_real_escape_string($dbc, trim($uid) );  
         //record correct username of password login attempt
		 $q= "INSERT INTO history(user_input, ip, user_id, web_page_title, event, Date)
		       VALUES('$in','$ip', '$uid', '$page_title','Forum_Search', UTC_TIMESTAMP)";
	     $r=mysqli_query($dbc,$q);
	     //END record correct username of password login attempt
	     
		        
	        //select if search subject or body
	        /* if($_GET['search'] =="subject")
			 {
			//run the query LIKE search
			echo "subject";
			//$q ="SELECT thread_id FROM threads WHERE subject = '$terms' ";
			 $q ="SELECT * FROM posts WHERE MATCH(message) AGAINST('$terms')";
			 }elseif($_GET['search'] =="body")
			//run the query  FULLTEXT search
			{
			echo "body";
	        $q ="SELECT * FROM posts WHERE MATCH(message) AGAINST('$terms')";
	          }else{*/
		   //works without date format
		   //$q ="SELECT * FROM posts WHERE MATCH(message) AGAINST('$terms')";
			// }
			  $q="SELECT thread_id, message, DATE_FORMAT(posted_on, '%m/%d/%y @ %h:%i %p') AS posted_on
			                  FROM posts WHERE MATCH(message) AGAINST('$terms')";
	//SELECT l.load_id, CONVERT_TZ(l.date_posted,'UTC','$tz') AS date_posted,
    //  DATE_FORMAT(l.date_available, '%m/%d/%y') AS date_available,
	   
	   $r = mysqli_query($dbc, $q);
	   if(mysqli_num_rows($r) >0)
	   {
	  // echo '<h2>Search Results</h2>';
	  // echo 'create form here to display results';
	   //
	   //create table for results
       // echo $terms;
		echo '<table class="forum" width="100%">
		      <caption>
			   Search results for:<h2> '.$_GET['terms'].'</h2>
			  </caption>
			  <colgroup>
			  <col id="thread">
			  <col id="search">
			  <col id="posted">
			  </colgroup>
		    
			<tr>
			     <td scope="col">thread</>
				 <th scope="col">message</th>
				 <th scope="col">posted</th>
		    </tr>';

			  //fetch and print each returned record
			  while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
			      {

			 echo '<tr>
					<td><a href="read.php?tid='.$row['thread_id'].' ">Thread</a></td>
				 <td class="search">'.$row['message'] .'</td>
					 <td>'.$row['posted_on'] .'</td>
					 
				</tr>';
					 
					 
					}
					echo '</table>';
					//
					//
	   }else{
	   echo '<p class="error">No results found.</p>';
	   }
  }

  include('../headers_menus_footers/footer17.html');
    
  ?> 