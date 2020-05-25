<?php
   //email_subscriptions.php used for email subscription and campain selections
   $page_title = 'email subscriptions';
   //select menu
   $menu_type = "menu_jquery";
  //$menu_type = "menu_css";
  include('../headers_menus_footers/header17.html'); 

  //check if email id is in url if not show page error and die
  if(!isset($_GET['id']))
  {
  	echo '<p class="error">OOPS, We apologize. Please 
  	     <a href="contact.php">contact</a> us to have your email removed</p>';
		 die();
  }else{
  	echo 'id in url good to go';
  //check if submit clicked
  //grab email info from database
  //if subscriber show all campains
  //if not subscriber only show advertiesement campaign
  //
  
  //grab current settings
    $address_id= $_GET['id'];
	//$address_id = 1;
    $q= "SELECT address, campaign_1, campaign_2,campaign_3 address_id FROM emails WHERE address_id = '$address_id' ";

    /*  
     $rc = @mysqli_query($dbc,$q);
       if(mysqli_num_rows($rc) ==1)
       {
       $row = mysqli_fetch_array($rc,MYSQLI_NUM);
     
	   
	   //echo  $row[0];
	  //throws error>> mysqli_close($dbc);
	   }else{
	   	echo '<p class="error">Ooops!. System error</p>';
	   }
	 * 
	 * $r=mysqli_query($dbc,$c);
			if(mysqli_num_rows($r) >0 )
			{
			  
	   */
	   $e= @mysqli_query($dbc,$q);
	   if(mysqli_num_rows($e) ==1)
	   {
	   $row = mysqli_fetch_array($e,MYSQLI_NUM);
	   //$row=mysqli_fetch_array($r, MYSQLI_ASSOC))
	   if($row[1] =="subscribed")
	   {
	   $status_subscribed_1 = "checked";
	   $status_unsubscribed_1 = "";
	   }else{
	   $status_subscribed_1 = "";
	   $status_unsubscribed_1 = "checked";
	   }
	   
	   if($row[2] =="subscribed")
	   {
	   $status_subscribed_2 = "checked";
	   $status_unsubscribed_2 = "";
	   }else{
	   $status_subscribed_2 = "";
	   $status_unsubscribed_2 = "checked";
	   }
	   
	   
	   
	   echo 'ok';
       }else{
  	   echo '<p class="error">OOPS System error</p>';
       }
       
} 
	//mysqli_close();
	
?>
       
     <!--create form to select email campaigns signed up for-->
     <p>Email subscriptions for...email address show</p>
     <p>Current email settings for..<?php echo $row[0];?></p>
     <p>List of emails we send once in a while</p>
   
     <form action='../site_utilities/email_subscriptions_update.php' method='post'>
     	<p><label>Advertisement</label>
        Currently set to: <h2><?php echo $row[1] ;?></h2>
     	Subscribe: <input type="radio" name="campaign_1"  <?php echo $status_subscribed_1;?> value="<?php  echo $row[1];?>"/>
     	Unsubscribe: <input type="radio" name="campaign_1" <?php echo $status_unsubscribed_1;?>  value="<?php echo $row[1];?>"/>
      
      
     	</p>
     	
     	
     	<?php //if a subscriber showw rest of campaigns  ?>
    
     	<p><label>2</label>
     	Currently set to: <h2><?php echo $row[2] ;?></h2>
     	Subscribe: <input type="radio" name="campaign_2"  <?php echo $status_subscribed_2;?> value="<?php  echo $row[2];?>"/>
     	Unsubscribe: <input type="radio" name="campaign_2" <?php echo $status_unsubscribed_2;?>  value="<?php echo $row[2];?>"/>
      
     	</p>
     	
   
     	 
     	
     	
     	<input type="text" name="id" value="<?php echo $address_id; ?>" />
     	<input type="submit" name="submit" value="submit changes" />
     </form>






   <?php    
		 include('../headers_menus_footers/footerwidemain.html');
  ?>