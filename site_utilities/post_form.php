<?php #My_forum - post_form.php

//redirect web browser if this page accesed directly
if(!isset($words))
//if(4>1)
{
header("Location:index.php");
exit();
}
//confirm user logged in
if(isset($_SESSION['user_id'])  )  
{
//I added next to hide post form
echo '<div id="formdown">';
echo '<br /><img src="images/arrow.png" width="75" height="75" alt="" title="" border="0" /><h2>Post</h2>';
echo '</div>';


echo '<div id="form">';


echo '<form class="subform" action="post.php" method="post" accept-charset="utf-8">';
//check for a thread id..if thread id post reply...else new thread
	   
if(isset($tid) && $tid)
//if(4>8)
   {
   echo '<h2>' . $words['post_a_reply'] . '</h2>';
   echo '<input name="tid" type="hidden" value="' . $tid .'"/>';
   }else{
   
   //new thread
   echo '<h2>Start a ' . $words['new_thread'] . '</h2>';
             
   echo '<p><label for="subject" class="label">' . $words['subject'] . ':</label>
              <input name="subject" type="text" ' ;
                        if(isset($subject)){ echo "value=\"$subject\" ";}
		                     echo '/></p>';
   } //end of if $tid
   
echo '<p><label for="post" class="label">' . $words['body'] . ':</label>
                <textarea name="body" cols="45" rows="10" id="post">';
                    if(isset($body)){ echo $body; } 
					echo '</textarea></p>';
									 
									 
echo'<input name="submit" type="submit" value="' . $words['submit'] . '"/> </form>';
 
echo '     </div>';	//end show form I added

}else{
echo '<p class="error">You must be logged in to post a message.</p>';
}
?>