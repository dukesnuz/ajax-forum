<?php #search_city_state_zip.php
//$page_title='zip code search @ LoadedandRolling';
//include('includes/config.inc.php');
//include('includes/header17.html');
?>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 

<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>	

<script type="text/javascript">
$(function(){
  //autocomplete
  $(".auto_origin").autocomplete({
  source: "results_post_edit_truck_load_city_state_zip_ajax.php",
  minLength:1 , //leave value at 1 for this to work
      select:function(evt,ui)
	  {
	  //when city selected fill in state and zip fields
	 this.form.origin_city.value=ui.item.city;
	 this.form.origin_state.value=ui.item.state;
	 this.form.origin_zip.value=ui.item.zip;
	 $('.origin_city').html(ui.item.city); 
	 $('.origin_state').html(ui.item.state); 
	 $('.origin_zip').html(ui.item.zip); 
	 //this.form.latitude.value=ui.item.latitude;
	// this.form.longitude.value=ui.item.longitude;
	 }//end select
  });//end autocomplete
}); //end function
</script>

<script type="text/javascript">
$(function(){
  //autocomplete
  $(".auto_destination").autocomplete({
  source: "results_post_edit_truck_load_city_state_zip_ajax.php",
  minLength:1 , //leave value at 1 for this to work
      select:function(evt,ui)
	  {
	  //when city selected fill in state and zip fields
	 this.form.destination_city.value=ui.item.city;
	 this.form.destination_state.value=ui.item.state;
	 this.form.destination_zip.value=ui.item.zip;
	 $('.destination_city').html(ui.item.city); 
	 $('.destination_state').html(ui.item.state); 
	 $('.destination_zip').html(ui.item.zip); 
	// this.form.latitude.value=ui.item.latitude;
	// this.form.longitude.value=ui.item.longitude;
	 }//end select
  });//end autocomplete
}); //end function
</script>

<!--
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
-->
<!--add delete text in origin box-->
<script>
$(document).ready(function(){
     $('.auto_origin').val('Type the city');
	 $('.auto_origin').css('font-style', 'italic');
	 $('.auto_origin').css('border', '1px dotted   #1C10FF');
	 $('.auto_destination').val('Type the city');
	 $('.auto_destination').css('font-style', 'italic');
	 $('.auto_destination').css('border', '1px dotted   #1C10FF');
});//end ready
</script>
<script>
$(document).ready(function(){
   $('.auto_origin').click(function(){
	  $('.auto_origin').val("");
	  $('.auto_origin').css('border','none');

    });//endclick
});//end ready
</script>
<script>
$(document).ready(function(){
   $('.auto_destination').click(function(){
	  $('.auto_destination').val("");
	  $('.auto_destination').css('border','none');
    });//endclick
});//end ready
</script>
<!--end add delete text in origin box-->
<!--
<script>
$(document).ready(function(){
     $(':text:first').click(function(){
     $(':text:first').val("");
	 $(':text:first').css('border', 'none');
	});//end hover function
});//end ready
</script>
-->
<!--
<script>
$(document).ready(function(){
 $('#close').click(function(){
  $('.zip').toggle(900);
 });//endtoggle
});//end ready
</script>
-->
 <!--<h2>Locate a city to find the zip code.</h2>-->
<!--
<div id="close" class="error">open/close1</div>
<form action='' method='post' class='subform'>
<fieldset>
<div id="formtitle" class="label"></div>
<p><label class="label">Complete:</label><input type='text' name="full" value='' class='auto'></p>
</fieldset>
<fieldset class='zip'>
<p><label class="label">City:</label><input type='text' name="origin_city" value='' class='auto'></p>
<p><label class="label">State:</label><input type='text' name="origin_state" value='' class='auto'></p>
<p><label class="label">Zip:</label><input type='text' name="origin_zip" value='' class='auto'></p>

<p><label class="label">Latitude:</label><input type='text' name="latitude" value='' class='auto'></p>
<p><label class="label">Longitude:</label><input type='text' name="longitude" value='' class='auto'></p>
</fieldset>
</form>
-->
	