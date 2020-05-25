<?php #index.php...landing page if successful login and www.loadedandrolling.inf/com landing page
//select which menu to use
//$menu_type = "menu_jquery";
$page_title ='Home @ AjaxForum';
$menu_type = "menu_css";
include('../headers_menus_footers/header18.html');

?>

<!--<script src="../js/jquery-1.7.2.min.js"></script>
<script src="../js/jquery.easing.1.3.js"></script>-->
<script>/*
	$(document).ready(function(){
  $('.fulltable').hide();
  //$('.shorttable').show();
  $('.open').toggle(
       function(){
       	 // $('.shorttable').fadeOut(300);
		  $('.fulltable').fadeIn(3000);
		  $(this).addClass('close');
	 },
	    function(){
	     // $('.shorttable').fadeIn(3000);
		  $('.fulltable').fadeOut(300);
		   $(this).removeClass('close');
	    }
		 );//end toggle
});//end ready 
*/
</script>

<?php
 /*
 if(isset($_SESSION['user_id'])){
  echo 'user' .$_SESSION['user_id'];
  echo '<br>s id' .$_SESSION['shipper_id'];
  echo '<br>c id' .$_SESSION['carrier_id'];
  echo '<br>c co name' .$_SESSION['c_company_name'];
  echo '<br>s co name' .$_SESSION['s_company_name'];
  echo '<br>c exp' .$_SESSION['c_expired'];
  echo '<br>s exp' .$_SESSION['s_expired'];
  }
  */
  //if user logged in show different message
if(isset($_SESSION['user_id']))
 {
   //if logged in
   echo "<h2>Welcome back $_SESSION[first_name]</h2>";
   //end if logged in
 }else{
 /*echo "<h2>Now for a limited time!
    <a href='register.php'>Register</a> for a free $free_days days FREE trial
          for our truck/load posting and searching application. Registration for our 
         <a href='register.php'>FORUM</a> is always free.</p></h2>";
 */
?>

     <div class="shorttable">
<div class="open">
<!--<span class="press">Our simple straight forward plans and costs.</span>-->
</div>
<!--
<h2>Welcome to the LoadedandRolling web application for the freight industry.</h2>
<h2>Our goal is to allow freight and trucks to be connected seamlessly.</h2>
<h2>Some reasons to use our web application.</h2>
   -->
   <h2>Welcome to AjaxForums</h2> 
   <h3 style="text-align:center"><a href="../forum/forum.php">Enter to Search and read our Forum</a></h3>
   <h3 style="text-align:center"><a href="./login.php">Login</a></h3>
   <h3 style="text-align:center"><a href="./register.php">Register</a></h3>
<!--
<ul>
  <li>Get the jump on booking loads and trucks.</li>
  <li>Truck and load searches automatically updated every 25 seconds.</li>
  <li>Trucks and loads pushed to carriers and brokers as fast as emailing your list out.</li>
  <li>Shippers and brokers,  allow carriers to book your loads online anytime eliminating excess time on the phone.</li>
  <li>Carriers save time on the phone by booking loads online anytime.</li>
  <li>Low yearly subscription rates.</li>
</ul>
-->
  </div>

<!--
  <div class="fulltable">
  	   	<div class="open">
<span class="press">Some reasons to use our web application.</span>
</div>

 <ul>
 	<li>Search and read our <a href="../forum/forum.php">Forum</a>-Cost is free.</li>
 	<li>Post to our forum-Cost is free. Simply <a href="register.php">Register</a></li>
 	<li>Post loads-Cost is free.</li>
 	<li>Post trucks-Cost is free.</li>
 	<li>Search loads, post loads and post to our forum.-Cost is $204.00 per year.</li>
 	<li>Search trucks, post trucks and post to our forum.-Cost is $204.00 per year.</li>
 </ul>
</div>


-->



<!--index page anything slider adverisemet-->
<?php
} //end if isset user id
include('../headers_menus_footers/footer18.html');
?>