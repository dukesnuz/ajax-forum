<?php
//include('../site_utilities/config.inc.php');
session_start();
//check if user logged in
if(  (isset($_SESSION['carrier_id']))  or (isset($_SESSION['shipper_id'])) )
//if(4>2)
//if(isset($_SESSION['carrier_id']))
{
//end check if logged in
 include('../site_utilities/config.inc.php');
require(MYSQL);
//check if shipper or carrier program
//'1430742813'";
if( $_GET['type'] === "shipper" )
//if(4>6)
//&& is_numeric($_GET['num1']) 
{
$inv = $_GET['num1'];
$sid = $_GET['num2'];
//$inv=1430742813;
//$sid = 740565323;
$q="SELECT d.po, d.payment_amt,d.payment_status,
DATE_FORMAT(d.date_created, '%b %e %Y') as date_created,
DATE_FORMAT(d.date_expires,'%b %e %Y') as date_expires, 
DATE_FORMAT(ADDDATE(d.date_created, INTERVAL 14 DAY),'%b %e %Y') as due_date,
d.po, d.invoice_number, d.description,
s.company_name ,s.mailing_address, s.mailing_city,s.mailing_state, s.mailing_zip,s.dispatch_first_name,s.dispatch_last_name

FROM 
orders AS d
LEFT JOIN shippers AS s USING(shipper_id)
WHERE invoice_number= '$inv'
AND
shipper_id='$sid'";
//ADDDATE(NOW(), INTERVAL 365 DAY) )";
//DATE_FORMAT($posted,'%b %e %Y \n@ %h:%i %p')
//s.company_name as s_company_name ,s.mailing_address as s_mailing_address, s.mailing_city as s_mailing_city, s.mailing_state as s_mailing_state, s.mailing_zip as s_mailing_zip, s.dispatch_first_name as s_dispatch_first_name,s.dispatch_last_name as s_dispatch_last_name,
//c.company_name ,c.mailing_address, c.mailing_city, c.mailing_state, c.mailing_zip,c.dispatch_first_name,c.dispatch_last_name
//s.company_name ,s.mailing_address, s.mailing_city, s.mailing_state, s.mailing_zip,s.dispatch_first_name,s.dispatch_last_name
}
elseif($_GET['type'] =="carrier"  )  
//elseif(4>2)
//&& is_numeric($_GET['num1']) 
{
$inv = $_GET['num1'];
//$inv=1338548364;
$cid = $_GET['num2'];
//$cid =45316778;
$q="SELECT d.po, d.payment_amt,d.payment_status,
DATE_FORMAT(d.date_created, '%b %e %Y') as date_created,
DATE_FORMAT(d.date_expires,'%b %e %Y') as date_expires, 
DATE_FORMAT(ADDDATE(d.date_created, INTERVAL 14 DAY),'%b %e %Y') as due_date,
d.po, d.invoice_number, d.description,
c.company_name ,c.mailing_address, c.mailing_city,c.mailing_state, c.mailing_zip,c.dispatch_first_name,c.dispatch_last_name

FROM 
orders AS d
LEFT JOIN carriers AS c USING(carrier_id)  
WHERE invoice_number='$inv'
AND
carrier_id='$cid'";	

}else{
	echo'<p class="error">Oops sytem error_1</p>';
	die();
}
	   
	   $r= @mysqli_query($dbc, $q);

		if(mysqli_num_rows($r) >0)
		{
		$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
		}else{
	    echo'<p class="error">Oops sytem error2</p>';
	    die();
        }
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Invoice @ LoadedandRolling</title>

<link rel="shortcut icon" type="image/x-icon" href="http://LoadedAndRolling.com/r/images/favicon.ico">
<link rel="stylesheet" media="all" href="../styles/print.css" type="text/css"/>

</head>



<body>
<div class="banner">
<h1>LoadedandRolling.com</h1>
<h2><?php echo "$row[description]"; ?> Invoice</h2>
<?php
echo "<p>Bill to:$row[company_name]</p>
<p>$row[mailing_address]</p>
<p>$row[mailing_city]</p>
<p>$row[mailing_state], $row[mailing_zip]</p>
<p>$row[dispatch_first_name] $row[dispatch_last_name] ||PO Number:.$row[po]||</p>";
//echo'sHip id'. $sid;
//echo 'inv'.$inv;
?>
</div>


<div class="banner_2">
<ul>
	<li>Invoice Date:<?php echo "$row[date_created]";?></li>
	<li>Due Date:<?php echo "$row[due_date]";?></li>
	<li>Expiration Date:<?php echo"$row[date_expires]";?></li>
	<li>Status:<?php echo "$row[payment_status]";?></li>
</ul>
   
      </div>
      
<div class="mainWrapper">

<div class="main">


<div id="column">
<p>Type subscription: <?php echo "$row[description]"; ?></p>


<p>One year subscription $<?php echo "$row[payment_amt]"; ?> per year.</p>

<ul>
	<li>Remit payment to:</li>
	<li>LoadedandRolling.com</li>
	<li>P.O. Box 227</li>
	<li>Memphis, Tn 38101</li>
	<li>Contact us @</li>
	<li>contactus@loadedandrolling.com</li>
</ul>
<p>Thank you for using</p>
<p><a href="index.php">LoadedandRolling</a></p>
</div>

</div>
</div>

<div class="footerWrapper">
<div class="footer">

<p>Remit below with payment. Tear on dotted line</p>
<?php echo "<p>Bill to:$row[company_name]</p>
<p>$row[mailing_address]</p>
<p>$row[mailing_city]</p>
<p>$row[mailing_state], $row[mailing_zip]</p>
<p>$row[dispatch_first_name] $row[dispatch_last_name] ||PO Number:.$row[po]||</p>
<p>Type subscription: $row[description] 
One year subscription $row[payment_amt] per year.</p>"
?>
</div>
</div>
<?php
//end if session
}else{
//$menu_type = "menu_css";
//include('../headers_menus_footers/headerwidemain18.html');
echo '<p class="error">Ooops! We apologize for the error.<a href="index.php">Home</a></p>';
//include('../headers_menus_footers/footer18.html');
header('Location: index.php');

die();
 }

?>
</body>
</html>
