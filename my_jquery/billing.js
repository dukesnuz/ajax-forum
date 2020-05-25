/**
 * @author David
 */
/*
$(function(){
	$('#billing_form').submit(function(){
	//});
//});

		
var error= false;
$('input[type-submit]',this).attr('disabled','disabled');
var cc_number=$('#cc_number').val(),
    cc_cvv=$('#cc_cvv').val(),
    cc_exp_month('#cc_exp_month').val(),
    cc_exp_year('#cc_exp_year').val();

	
		  
    if(!Stripe.validateCardNumber(CC_number)){
    	error=true;
    	reportError('The credit card number appears to be invalis');
    }

    if(!Stripe.validateCVC(cc_cvv)){
    	error=true;
    	reportError('The CVV number appears to be invalid.');
    }
    
    if(!Stripe.validateExpiry(cc_exp_month, cc_exp_year)){
    	error=true;
    	reportError('The expiration date appears to be invalid');
    }
    
    if(!error){
    	Stripe.createToken({
    		number: cc_number,
    		cvc: cc_cvv,
    		exp_month: cc_exp_month,
    		exp_year: cc_exp_year
    	}, stripeResponseHandler);
    }

		
    return false;
    }); //form submission
    }); //document ready
    
    function reportError(msg){
    	$('#error_span').text(msg);
    	$('input[type=submit]', this).attr('disabled', false);
    	return false;
    }
    
    
    function stripeResponseHandler(status, response){
    	if(response.error){
    		reportError(response.error.message);
    	}else{
    		var billing_form =$('#billing_form');
    		var token = response.id;
    		billing_form.append("<input type='hidden' name='token' value='"+token+"'/>");
    		billing_form.get(0).submit();
           }
          }
          


function reportError(msg){
	$('#error_span').text(msg);
    $('input[type=submit]', this).attr('disabled',false);
	return false;
}
*/

$(function() {

  $('#billing_form').submit(function() {
		var error = false;

		// disable the submit button to prevent repeated clicks:
		$('input[type=submit]', this).attr('disabled', 'disabled');

		// Get the values:
		var cc_number = $('#cc_number').val(), cc_cvv = $('#cc_cvv').val(), cc_exp_month = $('#cc_exp_month').val(), cc_exp_year = $('#cc_exp_year').val();
		
		// Validate the number:
		if (!Stripe.validateCardNumber(cc_number)) {
			error = true;
			reportError('The credit card number appears to be invalid.');
		}

		// Validate the CVC:
		
		// Validate the expiration:
		if (!Stripe.validateExpiry(cc_exp_month, cc_exp_year)) {
			error = true;
			reportError('The expiration date appears to be invalid.');
		}
		if (!error) {
			// Get the Stripe token:
			Stripe.createToken({
				number: cc_number,
				cvc: cc_cvv,
				exp_month: cc_exp_month,
				exp_year: cc_exp_year
			}, stripeResponseHandler);
		}

		// prevent the form from submitting with the default action
		return false;

	}); // form submission
	
}); // document ready.

// Function handles the Stripe response:
function stripeResponseHandler(status, response) {

	// Check for an error:
	if (response.error) {
		reportError(response.error.message);
	} else { // No errors, submit the form.
	  var billing_form = $('#billing_form');
	  // token contains id, last4, and card type
	  var token = response.id;
	  // insert the token into the form so it gets submitted to the server
	  billing_form.append("<input type='hidden' name='token' value='" + token + "' />");
	  // and submit
	  billing_form.get(0).submit();
	}
	
} // End of stripeResponseHandler() function.

function reportError(msg) {
	// Show the error in the form:
	$('#error_span').text(msg);
	// re-enable the submit button:
    $('input[type=submit]', this).attr('disabled', false);
	return false;
}


