<?php # Forum - index.php

//require('includes/config.inc.php');//moved to header
$page_title ='What we do @  AjaxForums';
//select which menu to use
$menu_type = "menu_jquery";
//$menu_type = "menu_css";
include('../headers_menus_footers/header17.html');



echo'<h2>What we do</h2>';
echo'
<p class="about">
Welcome to   AjaxForums. A message board. Our internet meeting place to post and read topics related to the 
transportation industry. Feel free to comment on a current thread.  New threads can also
be started if you feel a new topic should be started.  Please no vulgar or inappropriate language.
The moderator reserves the right to delete posting that are on in line with these guidelines.  
The moderator also reserves the right to delete users from posting to this forum if the 
any inappropriate activity shall continue by the poster.  Follow these simple rules and 
have fun!
</p>';

 if(isset($words['about']))
	           {
			    echo '<p class="about">'. $words['about']. '</p>';
			   }
			   
include ('../headers_menus_footers/footer17.html');
?>
