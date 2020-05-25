<?php
//for dev
//require_once('../loadedandrolling_mysqli_connect/local_mysqli_connect.php');
//echo '	   <link rel="stylesheet" media="all" href="../styles/styles.css" type="text/css"/>';
//end for dev
   //email_subscriptions.php used for email subscription and campain selections
$page_title = 'email subscriptions';
//select menu
//$menu_type = "menu_jquery";
$menu_type = "menu_css";
include('../headers_menus_footers/header17.html'); 
//include('../headers_menus_footers/headerwidemain.html');
//include('../headers_menus_footers/headerwidemain.html'); 


  //check if email id is in url if not show page error and die
  if(isset($_GET['id']))
    {
    	
		
?>
 
<script>
$(document).ready(function() {
	$('#email_settings').submit(function(){
	var formData = $(this).serialize();
	$.post('../site_utilities/email_subscriptions_update_ajax.php',formData,processData);
		function processData(data){
			if(data=='pass'){
				//$('#content').html('<p class="error">Your email settings have been updated.</p>');
				//$('#content').html('<p class="error">Your email settings have been updated.</p>');
				$('#content').text('Your email settings have been updated.');
			}else{	
			   // if ($('#emptyfield').length==0){
				 //	$('#content').html('<p class="error">Fill in required fields. Please try again.</p>');
				// }; //end #fail
				
			   if ($('#fail').length==0){
					//$('#content').append('<p class="error">System error proccess not completed. Please try again.</p>');
					$('#content').text('No changes were selected. System error. Proccess not completed.');
				}; //end #fail
		} //end process data
		} //end if
		$(window).scrollTop(0);
		return false;
		});// end submit
}); // end ready
</script>

<?php
  	//echo 'id in url good to go';
  //check if submit clicked
  //grab email info from database
  //if subscriber show all campains
  //if not subscriber only show advertiesement campaign
  //
  
  //grab current settings
    $address_id= $_GET['id'];
	//$address_id = 1;
    $q= "SELECT address, campaign_type_1, campaign_type_2,campaign_type_3 address_id FROM emails 
             WHERE address_id = '$address_id' ";

	   $e= @mysqli_query($dbc,$q);
	   if(mysqli_num_rows($e) ==1)
	   {
	   $row = mysqli_fetch_array($e,MYSQLI_NUM);
	   //echo 'ok';
       }else{
  	   	echo '<p class="error">OOPS, We apologize. Please 
  	    <a href="contact.php">contact</a> us to have your email removed</p>';
		//include('../headers_menus_footers/footerwidemain.html');
		include('../headers_menus_footers/footer17.html');
		die();
       }

		 
		 // check if incorrect id is enetered ion url
   }else{
  	echo '<p class="error">OOPS, We apologize. Please
  	     <a href="contact.php">contact</a> us to have your email removed</p>';
		 //include('../headers_menus_footers/footerwidemain.html');
		 include('../headers_menus_footers/footer17.html');
		 die();
   } 

	//mysqli_close();
	
?>
       
     <!--create form to select email campaigns signed up for-->
     <!--<p>in side bar have palce to add email address</p>
     <p>Email subscriptions for...email address show</p>
     <p>Current email settings for..<?php echo $row[0];?></p>
     <h2>Advertisements h2</h2>-->
     	<h2>Current subscription settings for: <?php echo $row[0];?></h2>
     	<div id="content" class="error">Check your preferences.</div>
     <!--class="formfield80" class="formfield30"-->
    <form class="subform" id="email_settings" action='../site_utilities/email_subscriptions_update_ajax.php' method='post' >
        <div class="email_settings">
    
     	<h4>List of emails we send once in a while.</h4>
     	</div>
     	
     	<div class="email_settings">
     	<p>We sometimes advertise our web app.</p>
        <p><label class="label">Currently set to: <span class="orange_875em"><?php echo $row[1] ;?></span></label></p>
        <p><label class="label">Subscribe:<input type="radio" name="campaign_type_1" value="subscribed"  /></label>
     	<label class="label">Unsubscribe:<input type="radio" name="campaign_type_1" value="unsubscribed"  /></label></p>
     	</div>
  
         
     	
     	<?php //if a subscriber showw rest of campaigns  ?>
    
        <div class="email_settings">
        <p>If you are a carrier, We may want to send you posted loads.</p>
        <p>If you are a shipper, We may want to send you posted trucks.</p>
        
        <p><label class="label">Currently set to: <span class="orange_875em"><?php echo $row[2] ;?></span></label></p>
        <p><label class="label">Subscribe:<input type="radio" name="campaign_type_2" value="subscribed"  /></label>
     	<label class="label">Unsubscribe:<input type="radio" name="campaign_type_2" value="unsubscribed"  /></label></p>
     	</div>
     	
        <?php 
		//if(isset($_SESSION['user_id'])){
		?>
        <div class="email_settings">
        <p>We may want to send our subscribers a newsletter or notice.</p>
        <p><label class="label">Currently set to: <span class="orange_875em"><?php echo $row[3] ;?></span></label></p>
        <p><label class="label">Subscribe:<input type="radio" name="campaign_type_3" value="subscribed"  /></label>
     	<label class="label">Unsubscribe:<input type="radio" name="campaign_type_3" value="unsubscribed"  /></label></p>
     
        <?php
        if(!isset($_SESSION['user_id'])){
        echo '<p>You must be <a href="register.php">registered</a> to recieve these emails.</p>';
		}?>
		</div>
			
     	<input type="hidden" name="id" value="<?php echo $address_id; ?>" />
     	<input type="submit" name="submit" value="Submit Changes" />
     </form>






   <?php    
		 //include('../headers_menus_footers/footerwidemain.html');
		 include('../headers_menus_footers/footer17.html');
  ?>