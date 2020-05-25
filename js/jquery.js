$(document).ready(function(){
	$('#form').hide();// hide send text
	//$('#form').hide(); //hide text instructions
	//$('#clear').hide(); // hide box message 3 on page load.. show after sumbit to send text
}); //end ready function





 
$(document).ready(function(){
//$('#form').slideToggle('slow');//	hide form
	$('#formdown').click(function(){
		$('#form').slideToggle(400); //toggle hide show form after submit button clicked
		//$('#form').slideDown('slow');//shows text box moved from below to act on submit below
		//$('#formdown').html('<img src="images/Box Up 1.png" width="75" height="75" alt="" title="" border="0" />');//adds hide show so form can be togles
		//$('#form').slideToggle(400);
		//$('#forminfo').hide();// hide send text
		//$('#form').slideDown('slow');
	});
}); //end ready
$(document).ready(function(){
//$('#form').slideToggle('slow');//	hide form
	$('#formup').click(function(){
		//$('#form').slideToggle(400); //toggle hide show form after submit button clicked
		//$('#form').slideUp('slow');//shows text box moved from below to act on submit below
		//$('#formup').html('<img src="images/Box Down 1.png" width="75" height="75" alt="" title="" border="0" />');//adds hide show so form can be togles
		//$('#form').slideToggle(400);
		//$('#forminfo').hide();// hide send text
		//$('#form').slideDown('slow');
	});
}); //end ready