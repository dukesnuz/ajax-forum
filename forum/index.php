<?php # Forum - index.php
//require('includes/config.inc.php');//moved to header

$page_title= 'Forum Home @ AjaxForums';
//select which menu to use
$menu_type = "menu_jquery";
//$menu_type = "menu_css";
include('../headers_menus_footers/header18.html');
?>

      <h2>Forum Stats</h2>
<?php
//mysqli connect is in headers to retreive words
// require('includes/mysqli_connect.php');
 //get total threads in this forum
 $q= "SELECT COUNT(thread_id) FROM threads";
 $r= @mysqli_query($dbc, $q);
 $row = @mysqli_fetch_array($r, MYSQLI_NUM);
 $threads = $row[0];
 if($threads >0)
 {
 echo '<h2>Total threads in this forum = '. $threads.'</h2>';
 }else{
 echo '<h2>There are no thredsa found in this forum.</h2>';
 }
 
 //get total posts in all threads
 $q= "SELECT COUNT(post_id) FROM posts";
 $p=@mysqli_query($dbc, $q);
 $rowp = @mysqli_fetch_array($p, MYSQLI_NUM);
 $posts = $rowp[0];
 if($posts >0)
 {
 echo '<h2>Total posts in all threads = '. $posts.'</h2>';
 }else{
 echo '<h2>There are no posts found</h2>';
 }
 
 //get total threads started today
 $q= "SELECT COUNT(thread_id) FROM threads WHERE DATE(date_posted)= DATE(NOW())";
 $rt=@mysqli_query($dbc, $q);
 $rowrt = @mysqli_fetch_array($rt, MYSQLI_NUM);
 $threadstoday = $rowrt[0];
 
 if($threadstoday >0)
 {
 echo '<h2>Total threads started today = '. $threadstoday .'</h2>';
 }else{
 echo '<h2>There are no threads started today.</h2>';
 }
 
 //get total posts posted today
 $q= "SELECT COUNT(post_id) FROM posts WHERE DATE(posted_on) = DATE(NOW())";
 $rp=@mysqli_query($dbc, $q);
 $rowp = @mysqli_fetch_array($rp, MYSQLI_NUM);
 $poststoday= $rowp[0];
 
 if($poststoday >0)
 {
 echo '<h2>Total posts today = ' .$poststoday.'</h2>';
 }else{
 echo '<h2>There are no posts today.</h2>';
 }
 
 
  //get last 1 subject
 //$q= "SELECT subject FROM threads ORDER BY thread_id DESC LIMIT 1 ";
 $q= "SELECT * FROM threads ORDER BY thread_id DESC LIMIT 1 ";
 $rpt=@mysqli_query($dbc, $q);
 $rowpt = @mysqli_fetch_array($rpt, MYSQLI_NUM);
 $lastsubject= $rowpt[3];
 $thread_id=$rowpt[0];
 //if($lastsubject >0)
 if(4>1)
 {
 echo '<h2>Last thread subject started = ' .$lastsubject.' <a href="read.php?tid='.$thread_id.' "> Read Thread</a></h2>';
 }else{
 echo '<h2>There is no last subject.</h2>';
 }
 
 
 //get last 1 posts
 //$q= "SELECT message FROM posts ORDER BY post_id DESC LIMIT 1 ";
 $q= "SELECT * FROM posts ORDER BY post_id DESC LIMIT 1 ";
 $rpp=@mysqli_query($dbc, $q);
 $rowpp = @mysqli_fetch_array($rpp, MYSQLI_NUM);
 $lastpost= $rowpp[3];
 $thread_id=$rowpp[1];
 //if($lastpost >0)
 if(4>1)
 {
 echo '<h2>Last message posted= ' .substr($lastpost, 0, 50).'...<a href="read.php?tid='.$thread_id.' ">Read Thread</a></h2>';
 }else{
 echo '<h2>There is no last message.</h2>';
 }
 
// echo '<p><a class="twitter-timeline"  href="https://twitter.com/LoadedandRollin"  data-widget-id="309383275804233728">Tweets by @LoadedandRollin</a>
//<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
//</p>';
?>
<?php include ('../headers_menus_footers/footer18.html');?>
