 /*this page ids for javascript in forms for postin loads edit loads post trucks edit trucks*/
 /*search loads search trucks*/
  $(document).ready(function(){
      //$(':text:first').val('Required');
	 // $('#datepicker').val('Required');
	  $('#city_origin, #state_origin').val('Req. City State origin');
	  $(':text:first, #city_origin, #state_origin').css('font-style', 'italic');
	  $('#size').attr('disabled', true);
	  $('#weight').attr('disabled', true) ; 
	 
	     //display required date on page load
		 //use html for message so it is easy to change on multiple pages
	  	 $('.date').html('Required');
		 $('.date').css('font-style', 'italic');
         $('.date').css('color','#FF062C');
         $('.date').css('font-size', '1em');
         $('.date').css('padding','1px');
         $('.date').css('margin-top','1px'); 
	     $('.date').css('margin-left','50px'); 
	     $('.date').css('margin-bottom','15px'); 
	  
	        //displays message and styles for message type 
			//use html for message so it is easy to change on multiple pages
	         $('.message_type').html('Required equip type');
	  		 $('.message_type').css('font-style', 'italic');
             $('.message_type').css('color','#FF062C');
             $('.message_type').css('font-size', '1em');
             $('.message_type').css('padding','1px');
             $('.message_type').css('margin-top','1px'); 
			 $('.message_type').css('margin-left','50px'); 
			 $('.message_type').css('margin-bottom','15px'); 
			 
			 
			 
      //$('.message').hide();
       $('#sizeweight').hide(100);
	   //$('#sizeweight').show(1000);
	          
	         $('#type').hover(function(){
		    //$('#edittrucktable').hover(function(){
			
		     if( $('#type').val().length>0 ) 
	         {
	         $('#sizeweight').show();
			// $('#weight').css('color','red');
			 $('#size').attr('disabled', false)
	         $('#weight').attr('disabled', false)
			
			 //display message
			 // $('#size').css('margin-bottom','5px');
		   	 $('#weight').css('margin-top','5px');
			 $('.label_size_weight').css('margin-top','5px');
			 $('.message_size').html('Requird 2 digits');
		     $('.message_weight').html('Requird 3 digits');
			
			 $('.message_size , .message_weight, .message_type').css('font-style', 'italic');
             $('.message_size , .message_weight, .message_type').css('color','#FF062C');
             $('.message_size , .message_weight, .message_type').css('font-size', '1em');
             $('.message_size , .message_weight, .message_type').css('padding','1px');
             $('.message_size , .message_weight, .message_type').css('margin-top','1px'); 
			 $('.message_size , .message_weight, .message_type').css('margin-left','50px'); 
			 $('.message_size , .message_weight, .message_type').css('margin-bottom','15px'); 
		
			 
			 }else if( $('#type').val().length ==0 ){
			 $('#sizeweight').hide();
			 $('#size').attr("disabled", true);
             $('#weight').attr("disabled", true);
			// $('#weight').css('color','green');
			 //$('#weight').val("");
			// $('#size').val("");
			 $('.message_size , .message_weight').html('');
			 }else{
			 $('.message_size , .message_weight').html('Oopps. Error.Please contact us.');
			 $('#sizeweight').show(1000);
			 }
	   });
      //$('#weight').hide(1000);  
	  
	// if( ('#type').val().length>0) ;
	 // {
	 // $('#sizeweight').fadein(1000);
	  //}
      
     // $('#size').blur(function(){
       //  })  
	   // .focus(function(){
		  //check if 2 digits entered in size and 3 digits entered in weight
		  //for post edit loads
		   $('#size').hover(function(){
				if($('#size').val().length>2)
				{
				$('.message_size').text("Please 2 digits");
				var size = $('#size').val().slice(0,2);
				$('#size').val(size);
				}
			 });
			    $('#weight').hover(function(){
				if($('#weight').val().length > 3)
				{
				$('.message_weight').text("Please 3 digits"); 
				var weight = $('#weight').val().slice(0,3);
				$('#weight').val(weight);
				}
		 
		
				
			 });
				/*
      $('#size').attr("disabled", false);
      $('#weight').attr("disabled", false);
      $('.message').fadeIn(2000);
     // $('#sizeweight').fadeIn(2000);
     // $('#weight').fadein(1000);
     // $('.message').html('Requird');
      $('.message').css('font-style', 'italic');
      $('.message').css('color','green');
      $('.message').css('font-size', '1em');
      $('.message').css('padding','1px');
      $('.message').css('border','1px solid red');
      $('.message').css('margin-top','10px');   */
	 //  });
	 
	//clear cityorigin on hover
	 $('#city_origin').click(function(){
	  $('#city_origin').val('');
	  $('#state_origin').val('');
	  });
 
   //reset form
	
	$("#clear_form").click(function(e){
	  $("form").get(0).reset();
	  $(':text:first').val('Required');
	  $('#city_origin, #state_origin').val('Req. City State origin');
	  $(':text:first, #city_origin, #state_origin').css('font-style', 'italic');
	  $('#size').attr('disabled', true)
	  $('#weight').attr('disabled', true)  
	   });
	});//end ready
