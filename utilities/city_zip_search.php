<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="generator" content="CoffeeCup HTML Editor (www.coffeecup.com)">
    <meta name="dcterms.created" content="Fri, 20 Dec 2013 14:14:16 GMT">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title></title>

	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 

 
 
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
	 this.form.state_origin.value=ui.item.state_origin;
	 this.form.zip_origin.value=ui.item.zip_origin;
	 }//end select
  });//end autocomplete
}); //end function
</script>
     </head>
  <body>
  
<form action='' method='post'>
<p><label>city:</label><input type='text' name="city_origin" value='' class='auto'></p>
<p><label>state:</label><input type='text' name="state_origin" value='' class='auto'></p>
<p><label>zip:</label><input type='text' name="zip_origin" value='' class='auto'></p
</form>

  </body>
</html>