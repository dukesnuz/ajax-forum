<?php # forum- read.php
//require('includes/config.inc.php');//in header
//select which menu to use
$page_title= 'Forum Read @ AjaxForums';
//$menu_type = "menu_jquery";
$menu_type = "menu_css";
include('../headers_menus_footers/header17.html');

$tid = FALSE;
//prove thread id is valid
//$tid = 1;
       if(isset($_GET['tid']) &&   filter_var($_GET['tid'], FILTER_VALIDATE_INT, array('min_range' =>1) ) )
	   //if(4>1)
	        {
	 $tid = $_GET['tid'];
	     //determiine of dates and times should be adjusted
		    //if(isset($_SESSION['user_tz']))
		    if(4>6)
			{
		    $posted = "CONVERT_TZ(p.posted_on, 'UTC', '{$_SESSION['user_tz']}')";
		    }else{
		    $posted ='p.posted_on';
		    }
		
		   //run query
		   $q = "SELECT t.subject, p.message, nickname, DATE_FORMAT($posted,'%b %e %Y \n@ %h:%i %p')
		   AS posted FROM threads AS t LEFT JOIN posts AS p USING(thread_id) INNER JOIN users AS u ON p.user_id = u.user_id
		  WHERE t.thread_id =$tid ORDER BY p.posted_on ASC";
		   
		    $r=mysqli_query($dbc, $q);
		    if(!(mysqli_num_rows($r) > 0))
			//if(4>1)
			 {
			 $tid = FALSE;
			 }
			 //complete get $_GET['tid'] and checak agian for valid thread id
			 }//end of isset$_GET['tid'] if
			   if($tid)
			  // if(4>1)
			   {
    
		     	//create table for results
		echo '<table class="forum" width="100%">
		     <!--<caption>
			  Replies to this thread.</h2>
			  </caption>-->
			  <colgroup>
			  <col id="nickname">
			  <col id="posted">
			  <col id="message">
			  </colgroup>
		    
			<tr>
			     <th scope="col">Posted by</th>
			     <th scope="col">Posted</th>
		  
				 
		    </tr>
			';
			//
			   //print message fetch results
			   $printed =FALSE;
			   while($messages = mysqli_fetch_array($r, MYSQLI_ASSOC))
			   { 
			          if(!$printed)
				      {
					  echo"<caption>Thread Subject:  {$messages['subject']}</caption>\n";
					  $printed = TRUE;
					  }
					  
					  echo "<tr>
					      
					           <td>{$messages['nickname']}</td>
							   <td>({$messages['posted']})</td> 
						   </tr>
						   <tr>
						       <td class='message'>  {$messages['message']} </td>
						  </tr>";
							  
				} //end while loop
		echo '</table>';			
				}else{
				  //Invalid thread id
			
				
				  echo '<p class="error">This page has been accessed in error.</p>';
}
include('includes/post_form.php');
include('../headers_menus_footers/footer17.html')

?>
				  
					          