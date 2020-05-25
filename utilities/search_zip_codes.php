<?php // search_loads.php
//include('includes/config.inc.php');//movrd to header
//search_zip_codes_php...  search_zip_codes.php page refereneces search_zip_codes_ajax.php
$page_title= 'Search Zip Codes For City, State, Longitude, Latitude @ loadedandrolling';
//select which menu to use
//$menu_type = "menu_jquery";
$menu_type = "menu_css";
include('../headers_menus_footers/headerwidemain.html');

//redirect web browser if this page accessed directly
//if(!isset($words))
if(4>6)
{
header("Location:index.php");
exit();
}

//check if uers logged in and has use-id BUT needs to set up as carrier with carrier_id
//if(
 //(isset($_SESSION['user_id'])) && ($_SESSION['carrier_id'] ==0) 
 //&&(is_numeric($_SESSION['user_id'])) && (is_numeric($_SESSION['carrier_id']))
 //)
 if(4>6)
 {
 echo '<p class="error">Please complete our <a href="carrier_preferences.php">carrier sign</a>  up form to post trucks and search loads.</p>';
 
include('../headers_menus_footers/footerwidemain.html');
 die();
 }

//confirm user logged in to view postings
 //if(
  //(isset($_SESSION['user_id']))//using just user_id until we set up carrier_idon login page
 //(isset($_SESSION['user_id'])) && ($_SESSION['carrier_id'] > 1) 
 //&&(is_numeric($_SESSION['user_id'])) && (is_numeric($_SESSION['carrier_id']))
//)
if(4>2)
{
//include('../site_utilities/datepicker.html');
//include('search_post_edit_city_state_zip.php');
//$cid=1;
//$cid = $_SESSION['carrier_id'];
//$uid=$_SESSION['user_id'];

//$first_name=$_SESSION['first_name'];
$ip=$_SERVER['REMOTE_ADDR'];
$tz='America/New_York';
//$tz=$_SESSION['time_zone'];

?>
	<!--get data from data base using ajax-->
	<!--referenced this page
     http://www.tutorialspoint.com/ajax/ajax_database.htm
     -->
	 <script language="javascript" type="text/javascript">
			 
function ajaxFunction(){
 var ajaxRequest;  // The variable that makes Ajax possible!
	
   try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
    try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Something in your browser is not working.");
         return false;
      }
   }
 }
//get form data and send to server..used post for searches should usee get
 ajaxRequest.onreadystatechange = function(){
      if(ajaxRequest.readyState == 4){
      var ajaxDisplay = document.getElementById('ajaxDiv');
      ajaxDisplay.innerHTML = ajaxRequest.responseText;
      //display View Map on page
  if(ajaxDisplay.innerHTML == 0)
   // if(4>18)
     {
     // alert(ajaxDisplay.innerHTML);
     // ajaxDisplay.innerHTML = "<div class='error'>No Results, Please try another 4-digit zip code.</div>";
      ajaxDisplay.innerHTML = "";
     document.getElementById('viewmap').innerHTML="";
      document.getElementById('map').innerHTML="<div class='error'>No Results, Please try another 4-digit zip code.</div>";
    }else{
      //alert(ajaxDisplay.innerHTML );
      document.getElementById('viewmap').innerHTML="View Map";
      document.getElementById('map').innerHTML="";
  
    }
       
   }
 }
//get info from form
  var formData = new FormData(document.getElementById("searchform"));
  ajaxRequest.open("POST","search_zip_codes_ajax.php",true );
 ajaxRequest.send(formData); //<<used for var formData line..if using get value in (null)
      
                }
         
			</script>
			 
<!--display data in  a map-->
<style>
#edittrucktable{
	width:400px;
}
#viewmap{
	margin-left:20px;
	
}
#ajaxDiv{
	margin-top:5px;
	margin-left:0px;
}
.postings{
	width:400px;
}
#map{
  height: 400px;
  width: 760px;
  margin-top:2px;
  z-index:-99999;
  margin-top:5px;
}
#map h2 {
	color: #FFFFFF;
	background-color:#630;
	width:200px
}
#map p {
	color: #FFFFFF;
	background-color:#000000;
		
}
#searchform button{
	font-size: 1.2em;
}
</style>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="../js/jquery-1.7.2.min.js"></script>
<script src="../js/jquery.gomap-1.3.2.min.js"></script>

<script>
$(document).ready(function(){
$('#viewmap').click(function(){
        var lat =$('#ziptable #lat').html();
        var lon =$('#ziptable #lon').html();
        var city =$('#ziptable #city').html();
        var state =$('#ziptable #state').html();
        var zip=$('#ziptable #zip').html();

       //alert(lon+lat);
      //alert(lon);
     $('#map').goMap({
        latitude: lat,
        longitude:  lon,
        //latitude: 42.36,
        //longitude: -71.08,
		zoom :10,
		scaleControl : true,
		maptype : 'ROADMAP'
	}); //end goMap



	$.goMap.createMarker({ 
	    latitude : lat,
        longitude : lon,
		//title : 'City,State, Zip, Latitude, Longitude',
	   		html : {
	     	content :'<p>'+city+ ', ' + state+ ', '+zip+', Latitude: '+lat+'.Longitude: '+lon+'</p>',
			 popup : true 
		   }
}); // end createMarker
   $('#map').css('border','4px solid #FF592A' );
 });//endclick					 
}); // end ready
</script>

<!--end display data in a map-->

<!--create search form onsubmit="loadXMLDoc()"-->

	      <div   id="edittrucktable">
	       	 <h4>Enter a zip code and retrieve the City, State, Latitude and Longitude</h4>
<form method="POST" action="search_zip_codes_ajax.php" id="searchform">
	
<p><label class="label">Zip Code 4-digits</label>
	<input type="text" name="zip" class="formfield80"></p>

<button type="button" class="press" onclick="ajaxFunction()">Search</button>
</form>
</div><!--end div posttruck table-->
<div id="viewmap" class="press"></div>
<div id="ajaxDiv"></div>

             <div id="map"></div>  <!-- end div map -->
		
     
         <?php
//end check if user logged in
}else{
echo '<p class="error"> You must be <a href="'.BASE_URL.'/utilities/register.php">registered</a> to access this page.</p>';
echo '<p class="error">If you are registered, <a href="'.BASE_URL.'/utilities/login.php">login</a> to access this page.</p>';
include('../headers_menus_footers/footerwidemain.html');
die();
}
         
include('../headers_menus_footers/footerwidemain.html');
?>