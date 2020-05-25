<?php #search_city_state_zip.php
$page_title='zip code search @ LoadedandRolling';
//include('../includes/config.inc.php');//moved to header
//select which menu to use
//$menu_type = "menu_jquery";
$menu_type = "menu_css";
include('../headers_menus_footers/header17.html');
?>
<!--leave below link or else there will be a dot next to each cirty-->
<!--
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 
-->
<link rel="stylesheet" type="text/css" href="../styles/my_css/dark-hive/jquery-ui-1.10.4.custom.css">

<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>	

<script type="text/javascript">
$(function(){
  //autocomplete
  $(".auto").autocomplete({
  source: "results_search_city_state_zip_ajax.php",
  minLength:1 , //leave value at 1 for this to work
      select:function(evt,ui)
	  {
	  //when city selected fill in state and zip fields
	 this.form.city.value=ui.item.city;
	 this.form.state.value=ui.item.state;
	 this.form.zip.value=ui.item.zip;
	 this.form.latitude.value=ui.item.latitude;
	 this.form.longitude.value=ui.item.longitude;
	 
	 $('.origin_city').html(ui.item.city); 
	 $('.origin_state').html(ui.item.state); 
	 $('.origin_zip').html(ui.item.zip); 
	 $('.origin_latitude').html(ui.item.latitude);
	 $('.origin_longitude').html(ui.item.longitude);
	 
	// this.form.latitude.value=ui.item.latitude;
	// this.form.longitude.value=ui.item.longitude;
	 }//end select
  });//end autocomplete
}); //end function
</script>
<script>
$(document).ready(function(){
   //  $(':text:first).focus();
     $(':text:first').val('Type the city');
	 $(':text:first').css('font-style', 'italic');
	 $(':text:first').css('border', '3px dotted   #1C10FF');
	// $(':text:first').css('font-style','italic');
	  
     $('.zip').hide();
     $('.auto').keypress(function(){
	 // show city zip fields
	//if($('.auto').val().length >0)
	// {
	$('#formtitle').html('<p>Select a city.</p>');
	  $('.zip').fadeIn(2000);
    //}
	});//end hover function
});//end ready
</script>
<script>
$(document).ready(function(){
     $(':text:first').click(function(){
     $(':text:first').val("");
	 $(':text:first').css('border', 'none');
	});//end hover function
});//end ready
</script>
<script>
$(document).ready(function(){
 $('#close').click(function(){
  $('.zip').toggle(900);
 });//endtoggle
});//end ready
</script>

 <h2>Locate a city to find the zip code.</h2>
<div id="close" class="error">open/close</div>
<form action='' method='post' id="posttruck" class="subform">
<fieldset>
<div id="formtitle" class="label"></div>
<p><label class="label">Complete:</label><input type='text' name="full" value='' class='auto'></p>
</fieldset>
<fieldset class='zip'>
<p><label class="label">City:<span class="origin_city"</span></label>
<input type='hidden' name="city" value='' class='auto'></p>

<p><label class="label">State:<span class="origin_state"</span></label>
<input type='hidden' name="state" value='' class='auto'></p>

<p><label class="label">Zip:<span class="origin_zip"</span></label>
<input type='hidden' name="zip" value='' class='auto'></p>

<p><label class="label">Latitude:<span class="origin_latitude"</span></label>
<input type='hidden' name="latitude" value='' class='auto'></p>

<p><label class="label">Longitude:<span class="origin_longitude"</span></label>
<input type='hidden' name="longitude" value='' class='auto'></p>
<!--
<p><label class="label">Latitude:</label><input type='text' name="latitude" value='' class='auto'></p>
<p><label class="label">Longitude:</label><input type='text' name="longitude" value='' class='auto'></p>
-->
</fieldset>
</form>

<?php

include('../headers_menus_footers/footer17.html');	