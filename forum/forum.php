<?php #forum - forum.php
//include('includes/config.inc.php');//moved to header

$page_title= 'Threads On Forum @ AjaxForums';
//select which menu to use
$menu_type = "menu_jquery";
//$menu_type = "menu_css";
//include('../headers_menus_footers/header17.html');
       include('../headers_menus_footers/header18.html');
//include('../headers_menus_footers/headerwidemain.html');


$display = 100;
//check if # of pages already set
if(isset($_GET['p']) && is_numeric($_GET['p'] ))

   {
   $pages = $_GET['p'];
   }else{
   //count #of records in databse
   $q = "SELECT COUNT(user_id) FROM threads";
   $r= @mysqli_query($dbc, $q);
   $row = @mysqli_fetch_array($r, MYSQLI_NUM);
   $records = $row[0];
   //mathematicaly calculate number pages needed
   if($records > $display)
      {
	  $pages = ceil($records/$display);
	  }else{
	  $pages =1;
	  }
}//end if isset
//determine starting point in databse
if(isset($_GET['s']) && is_numeric($_GET['s']))
      {
	  $start = $_GET['s'];
	  }else{
	  $start = 0;
	  }	  

//determine what dates and times to use
//if(isset($_SESSION['user_tz']))
if(4>6)
   {
   $first = "CONVERT_TZ(p.posted_on, 'UTC', '{$_SESSION['user_tz']}')";
   $last = "CONVERT_TZ(p.posted_on, 'UTC', '{$_SESSION['user_tz']}')";
   }else{
   $first = 'p.posted_on';
   $last ='p.posted_on';
   }
 ////
   //define and execute the query
   //below used wothout pagenation
   /*
   $q = "SELECT t.thread_id, t.subject, username, COUNT(post_id) - 1 AS responses,
   	  	MAX(DATE_FORMAT($last, '%e-%b-%y %1:%i %p')) AS last,
		MIN(DATE_FORMAT($first, '%e-%b-%y %1:%i %p'))AS first
		FROM threads AS t INNER JOIN posts AS p USING (thread_id) INNER JOIN
		users AS u ON t.user_id = u.user_id WHERE t.lang_id = {$_SESSION['lid']}
		GROUP BY (p.thread_id) ORDER BY last DESC";
	*/
	//below used WITH pagenation
	//DESC
	 $q = "SELECT t.thread_id, t.subject, nickname, COUNT(post_id) - 1 AS responses,
   	  	MAX(DATE_FORMAT($last, '%b-%e-%Y @ %h:%i %p')) AS last,
		MIN(DATE_FORMAT($first, '%b-%e-%Y @ %1:%i %p'))AS first
		FROM threads AS t INNER JOIN posts AS p USING (thread_id) INNER JOIN
		users AS u ON t.user_id = u.user_id WHERE t.lang_id = {$_SESSION['lid']}
		GROUP BY (p.thread_id) ORDER BY last ASC LIMIT $start, $display";
		
//
		$r = mysqli_query($dbc, $q);
		if(mysqli_num_rows($r) > 0)
		//if(4>1)
		{
		//create table for results
		echo '<table class="forum" width="100%" >
		      <caption>
			    Threads Started
			  </caption>
			  <colgroup>
			  <col id="subject">
			  <col id="posted_by">
			  <col id="posted_on">
			  <col id="replies">
			  <col id="latest_reply">
			  </colgroup>
		    
			<tr>
			     <th scope="col">' . $words['subject'] . '</th>
			     <th scope="col">' . $words['posted_by'] . '</th>
				 <th scope="col">' . $words['posted_on'] .'</th>
				 <th scope="col">' .$words['replies'] . '</th>
				 <th scope="col">' .$words['latest_reply'] .'</th>
		    </tr>';
			  
			  //fetch and print each returned record
			  while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
			      {
				  
				  echo '<tr>
				  	 <td><a href="read.php?tid=' .$row['thread_id'] . '">' . $row['subject'].'</a></td>
					 <td>'.$row['nickname'] .'</td>
					 <td>'.$row['first'] .'</td>
					 <td>'.$row['responses'].'</td>
					 <td>'.$row['last'].'</td>
					 </tr>';
					}
					echo '</table>';
					
					//Determine what page the script is
					$current_page=($start/$display) +1;
					//if not first page make link
					
					if($current_page !=1)
					{
					echo '<a href="forum.php?s='.($start-$display). '&p='.$pages.' " class="navlink">Previous<a>';
					}
			//make numbered pages
			for($i = 1; $i <= $pages;  $i++)
					 {
					   if($i != $current_page)
					     {
						 echo '<a href="forum.php?s='.(($display*($i - 1))) . '&p='.$pages.'" class="navlink">'.$i.'</a>';
						 }else{
						 echo  '<p>'  .$i . '' .'</p>';
						// echo $i . ' ';
						 }
			  }//end for loop
					
					//if not last page make next button
					 if($current_page !=$pages)
					
					   {
					   echo '<a href="forum.php?s='.($start + $display) . '&p='.$pages.'" class="navlink">Next</a>';
					   //}
					}//end links
					   //end pagenation
					   
					   echo '<h2>Page-'. $current_page.'</h2>' ;
					   
            		}else{
		echo '<h2>There are currently no messages in this forum.</h2>';
		//echo 'session=' .$_SESSION['user_id'];
		//echo 'user time zone'.$_SESSION['user_tz'];
		}
		//echo 'session=' .$_SESSION['user_id'];
		
//include('../headers_menus_footers/footer17.html');	
include('../headers_menus_footers/footer18.html');	