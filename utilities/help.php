<?php #loaded and rolling -contact.php
//require('includes/config.inc.php');//moved to header
//validate something entered
$page_title='Help @ AjaxForums';
//select which menu to use
$menu_type = "menu_css";
//$menu_type = "menu_css";
include('../headers_menus_footers/header18.html'); 

//echo '<p>Need help</p>';
//echo '<p><a href="contact.php" class="press">Contact</a> us for help.</p>';



//else show other set of help
?>
<script src="../js/jquery-1.7.2.min.js"></script>
<script src="../js/jquery.easing.1.3.js"></script> 
<script>

$(document).ready(function(){
$('.answer').hide();
$('.help h2').toggle(
	function(){
		$(this).next('.answer').fadeIn(300);
		$(this).addClass('close');
	},
	function(){
		$(this).next('.answer').fadeOut(1000);
		$(this).removeClass('close');
	   }
	);//end toggle
}); //end ready
</script>
<style type="text/css">
.help h2 {
	background: url(../images/ArrowDown2.png) no-repeat 0 11px;
	padding: 10px 0 0 025px;
	cursor: pointer;
	background-color:#FFFFFF;
	font-size:.875em;
	margin-top:0px
}
h2.close {
	background-image: url(../images/ArrowUp2.png);
}
.help{
	/* background-color:rgba(156,16,255, .65);*/
}
.answer {
	margin-left: 25px;	
	margin-bottom:50px;
   /* background-color:rgba(156,16,255, .9);*/
}
.help p{
	color:#FFFFFF;
}
.help h3{
	font-size: .750em;
	color:#FFFFFF;
	background-color:#191970;
	width:120px;
	padding:2px;
	margin-top:35px;
	
	
}
#helpInner{
	border: 1px solid #FFFFFF;
	border-bottom: 15px solid #FFFFFF;
	
}
</style>
    <h2><p>Do not see your question? </p><p> <a href="../forum/search.php" class="press">Search</a> or
    	<a href="../forum/read.php?tid=73" class="press">Browse</a> our Forum. 
    	<a href="contact.php" class="press">Contact us</a>to ask a specific question.</p></h2>
    <h2>Faqs of Frequently Asked Questions.</h2>
  
 	<div class="help">
 <?php
 //if  logged in as carrier show 1 set of help
/* if(
 (isset($_SESSION['user_id'])) && ($_SESSION['carrier_id'] > 0) 
 &&(is_numeric($_SESSION['user_id'])) && ($_SESSION['shipper_id'] == 0)
 )
 {
$q= "SELECT catagory, question, answer FROM help 
        WHERE
       (catagory = 'carrier' AND status ='active')
       OR
       (catagory = 'forum' AND status ='active')
       OR
       (catagory = 'general' AND status ='active')
       
       ORDER BY catagory ASC,question ASC";
		
	   	$r =@mysqli_query($dbc, $q);
		   if(mysqli_num_rows($r)>0)
		   //if(4>6)
           {
			   
			   while($rows = mysqli_fetch_array($r,MYSQLI_ASSOC))
			   {
			   echo '<div id=helpInner>';
			   echo "<h3>Catagory: $rows[catagory]</h3>";
			   echo "<h2>Question: $rows[question]</h2>";
			   echo "<p class='answer'>$rows[answer]</p>";
			   echo '</div>';
			    }
		  
		   }else{
           echo '<p class="error">Oopps!..Page error we apologize.</p>';
           }
 //end if logged in as shipper
 }elseif(
 (isset($_SESSION['user_id'])) && ($_SESSION['shipper_id'] >0) 
 &&(is_numeric($_SESSION['user_id'])) && ($_SESSION['carrier_id']==0)
 )

   {  
         //if not logged in 
       $q= "SELECT catagory, question, answer FROM help 
       where 
       (catagory = 'shipper'  AND status ='active')
       OR
       (catagory ='forum'  AND status ='active')
       OR
       (catagory = 'general'  AND status ='active')
      
       ORDER BY catagory ASC,question ASC";
		
	   	$r =@mysqli_query($dbc, $q);
		   if(mysqli_num_rows($r)>0)
		   //if(4>6)
           {
			   
			   while($rows = mysqli_fetch_array($r,MYSQLI_ASSOC))
			   {
			   echo '<div id=helpInner>';
			   echo "<h3>Catagory: $rows[catagory]</h3>";
			   echo "<h2>Question: $rows[question]</h2>";
			   echo "<p class='answer'>$rows[answer]</p>";
			   echo '</div>';
			    }
		  
		   }else{
           echo '<p class="error">Oopps!..Page error we apologize.</p>';
           }
 }elseif(
 (isset($_SESSION['user_id'])) && ($_SESSION['carrier_id'] >0) 
 &&(is_numeric($_SESSION['user_id'])) && ($_SESSION['shipper_id'] >0)
 )

   {  
         //if looded in as carrier and shipper
       $q= "SELECT catagory, question, answer FROM help 
       WHERE
       (catagory = 'carrier'  AND status ='active')
       OR 
       (catagory = 'shipper' AND status ='active')
       OR
       (catagory ='forum' AND status ='active')
       OR
       (catagory = 'general' AND status ='active')
	   
       ORDER BY catagory ASC,question ASC";
		
	   	$r =@mysqli_query($dbc, $q);
		   if(mysqli_num_rows($r)>0)
		   //if(4>6)
           {
			   
			   while($rows = mysqli_fetch_array($r,MYSQLI_ASSOC))
			   {
			   echo '<div id=helpInner>';
			   echo "<h3>Catagory: $rows[catagory]</h3>";
			   echo "<h2>Question: $rows[question]</h2>";
			   echo "<p class='answer'>$rows[answer]</p>";
			   echo '</div>';
			    }
		  
		   }else{
           echo '<p class="error">Oopps!..Page error we apologize.</p>';
           }	
}else{ */
         //if not logged in 
     /*  $q= "SELECT catagory, question, answer FROM help 
       WHERE
       (catagory ='forum' AND status ='active')
       OR
       (catagory= 'general' AND status ='active')
       
       ORDER BY catagory ASC,question ASC";*/
       
        $q= "SELECT catagory, question, answer FROM help 
       WHERE
       (catagory ='forum' AND status ='active')
      
       ORDER BY catagory ASC,question ASC";
       
		
	   	$r =@mysqli_query($dbc, $q);
		   if(mysqli_num_rows($r)>0)
		   //if(4>6)
           {
			   
			   while($rows = mysqli_fetch_array($r,MYSQLI_ASSOC))
			   {
			   echo '<div id=helpInner>';
			   echo "<h3>Catagory: $rows[catagory]</h3>";
			   echo "<h2>Question: $rows[question]</h2>";
			   echo "<p class='answer'>$rows[answer]</p>";
			   echo '</div>';
			    }
		 
		   }else{
           echo '<p class="error">Oopps!..Page error we apologize.</p>';
          }
//}//endselect type log in

//echo $_SESSION['shipper_id'];
//echo $_SESSION['carrier_id'];
?>

  
 <?php
 include('../headers_menus_footers/footer17.html');