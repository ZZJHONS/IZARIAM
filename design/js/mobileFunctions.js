$(document).ready(function() {
	
    setUrlPasswordLostForm( $('#mobileServerPasswordLost :selected').val() );
    setUrlMobileLogin ($( '#mobileLogServer :selected' ).val() );

	// replace facebook login&/register urls with mobile versions
	$('#fbServer > option').each(function(i) {
		//var fbLoginUrl = ($(this).attr('fburl'));
		//$(this).attr('fburl', fbLoginUrl);
	 	setUrlFBLoginHref( $('#fbServer :selected').attr('fburl') ) ;
	});
	$('#fbRegisterServer > option').each(function(i) {
		var fbRegUrl = ($(this).attr('fburl')).replace(/www.facebook.com/, 'touch.facebook.com');
		$(this).attr('fburl', fbRegUrl);	
	 	setUrlFBLoginHref( $('#fbRegisterServer :selected').attr('fburl') ) ;
	});
	

	// menu tabs
	$('a#registerTab').click(function() {
		$('#mobileLoginWrapper').removeClass('activeMobileMenu');	
		$('a#loginTab').removeClass('current');	
		$('form#fbRegisterForm').css('display','none');
		$('#mobilePwLost').hide();
        $('#fbConnect').hide();
		
		$('#registerWrapper').addClass('activeMobileMenu');		
		$('form#registerForm').css('display','block');
		$(this).addClass('current');
		
		var oldSelection = $('#fbRegisterServer option:selected').val();
		$("#registerServer option[value=" + oldSelection + "]").attr('selected', true);

		clearErrorPrompts();	
	});	
	
	$('a#loginTab').click(function() {
		$('#registerWrapper').removeClass('activeMobileMenu');		
        $('#fbConnect').hide();
		$('#mobilePwLost').hide();
		$('a#registerTab').removeClass('current');
		
		$('#mobileLoginWrapper').addClass('activeMobileMenu');		
		$(this).addClass('current');	
		
		var oldSelection = $('#fbRegisterServer option:selected').val();
		$("#registerServer option[value=" + oldSelection + "]").attr('selected', true);
		
		clearErrorPrompts();
	});
	
	$('#errorOverlay').click(function() {
		clearErrorPrompts();
	});

    // fb login 
    $("#mobile-btn-fb").click(function () {		
		var serverSelection =  $('#mobileLogServer option:selected').val();
    	setUrlFBLoginHref( $("#fbServer option[value=" + serverSelection + "]").attr('fburl') );

        fbLogin();
    });  
	
	
    $("#mobile_reg-fb").click(function () {
        showFbRegistration() ;
		
		var oldSelection = $('#registerServer option:selected').val();
		$("#fbRegisterServer option[value=" + oldSelection + "]").attr('selected', true);
    });
	
	$("#mobileLogServer").change( function() {
        setUrlMobileLogin ($( '#mobileLogServer :selected' ).val() );
    }) ;
	
	
	$("#registerName, #mobileLoginName, #password, #mobileLoginPassword, #email, #emailPasswordLost").blur(function(){
		highlightField($(this));
	});	
	$("#registerName, #mobileLoginName, #password, #mobileLoginPassword, #email, #emailPasswordLost").focus(function(){
		removeHighlights($(this));
	});


	// 'password lost' layer
	$('a#pwLost').click(function() {		
		$('#mobileLoginWrapper').removeClass('activeMobileMenu');
		$('#mobilePwLost').show();
		
		var oldSelection = $('#mobileLogServer option:selected').val();
		$("#serverPasswordLost option[value=" + oldSelection + "]").attr('selected', true);
	});

	$('a#fb-pwLost').click(function() {
       // $('#fbConnect').hide();
		$('#mobilePwLost').show();
		
		var oldSelection = $('#fbServer option:selected').val();
		$("#serverPasswordLost option[value=" + oldSelection + "]").attr('selected', true);
	});		

	$('a#pwLostBack').click(function() {
		$('#mobilePwLost').hide();		
		$('#mobileLoginWrapper').addClass('activeMobileMenu');
		
		var oldSelection = $('#serverPasswordLost option:selected').val();
		$("#mobileLogServer option[value=" + oldSelection + "]").attr('selected', true);
	});

	
	$( "#mobileServerPasswordLost" ).change( function() {
        setUrlPasswordLostForm( $( '#mobileServerPasswordLost :selected' ) . val() ) ;
   }) ;
	
	// validation stuff
    $.validationEngineLanguage.newLang()
    $("#registerForm").validationEngine({
        validationEventTriggers:"blur keyup",
        promptPosition: "centerRight",
        scroll: false
    });
	$("#mobileLoginForm").validationEngine({
        validationEventTriggers:"blur keyup",
        promptPosition: "centerRight",
        scroll: false
    });
	$("#pwLostForm").validationEngine({
        validationEventTriggers:"blur keyup",
        promptPosition: "centerRight",
        scroll: false
    });
	$("#fbRegisterForm").validationEngine({
        validationEventTriggers:"blur focus",
        promptPosition: "centerRight",
        scroll: false
    });

	
	// Login
    $('#mobileLoginBtn').click(function() {
        var success = $('#mobileLoginForm').validationEngine({
            returnIsValid: true
        });
        if (success && window.ieSpecial) {
            document.mobileLoginForm.submit();
            this.disabled = true ; // vgl http://drupal.org/node/138622
        } else {
			highlightLoginErrors();	
			handleFormErrors();
		}
    });
	
	// Registration
    $('#mobileRegBtn').click(function(){
        var success = $('#registerForm').validationEngine({
            returnIsValid:true
        });		
        if (success && window.ieSpecial) {
            document.registerForm.submit();
            this.disabled = true ; // vgl http://drupal.org/node/138622
        } else {
			highlightRegisterErrors();	
			handleFormErrors();
		}
    });

	$('#errorWrapper').click(function() {
		clearErrorPrompts();
	});
	
	$('#pwLostBtn').click(function() {	
		handleFormErrors();	
		highlightField("#emailPasswordLost");
	});
	
	$('#fbRegBtn').click(function() {	
		handleFormErrors();
		highlightFbRegisterErrors();
	});
	
	
	function handleFormErrors() {	
		if ($('#errorWrapper:empty').length > 0) {
			appendErrorPrompts();			
		} else {
			clearErrorPrompts();
		}
	}
	
	function appendErrorPrompts(form) {			
		if ($('#mobilePwLost:visible').length > 0) {
			$('.registerNameformError, .passwordformError, .emailformError, .agbformError, .fbAgbformError, .mobileLoginNameformError, .mobileLoginPasswordformError, .fbAgbformError').remove();			
		
		} else if ($('#fbRegisterForm:visible').length > 0) {
			$('.registerNameformError, .passwordformError, .emailformError, .agbformError, .mobileLoginNameformError, .mobileLoginPasswordformError, .emailPasswordLostformError, .emailPasswordLostformError').remove();			
		
		} else if ($('#mobileLoginWrapper').hasClass('activeMobileMenu')) {
			$('.registerNameformError, .passwordformError, .emailformError, .emailPasswordLostformError, .agbformError, .fbAgbformError').remove();
		
		} else if ($('#registerWrapper').hasClass('activeMobileMenu')) {
			$('.mobileLoginNameformError, .mobileLoginPasswordformError, .emailPasswordLostformError, .fbAgbformError').remove();		
		}
	
		$('.formError').appendTo($('#errorWrapper'));			
		
		($('.registerNameformError, .mobileLoginNameformError').children('.formErrorContent')).before('<div class="formErrorHeader">' + window.txt_name + '</div>');
		($('.passwordformError, .mobileLoginPasswordformError').children('.formErrorContent')).before('<div class="formErrorHeader">' + window.txt_password + '</div>');
		($('.emailformError, .emailPasswordLostformError').children('.formErrorContent')).before('<div class="formErrorHeader">' + window.txt_email + '</div>');
		($('.agbformError, .fbAgbformError').children('.formErrorContent')).before('<div class="formErrorHeader">' + window.txt_agb + '</div>');

		$('#errorWrapper').css('display', 'block');
		$('#errorOverlay').css('display', 'block');
	}

	function clearErrorPrompts() {
		$('#errorOverlay').css('display', 'none');
		$('#errorWrapper').empty();		
		$('#errorWrapper').css('display', 'none');
		
	}
	
	function highlightField(field) {
		var fieldId = $(field).attr('id');
		
		if (($('.' + fieldId + 'formError').length) > 0) {		
			$(field).addClass('invalidInput');
			
			if ($('.input' + fieldId).length == 0)  {
				($(field).parent()).prepend('<div class="inputWarning input' + fieldId + '"></div>');
			}
		} else {
			removeHighlights(field);
		}
	}
	
	function removeHighlights(field) {
			var fieldId = $(field).attr('id');
			$(field).removeClass('invalidInput');
			$('.input' + fieldId).remove();
	}
	
	function highlightLoginErrors() {
			highlightField("#mobileLoginName");		
			highlightField("#mobileLoginPassword");
	}
	
	function highlightRegisterErrors() {
			highlightField("#registerName");
			highlightField("#password");	
			highlightField("#email");
			
		if ( $(".agbformError").length > 0 ) {	
			$("#agbText").addClass('invalidInput');
		} else 					
			$("#agbText").removeClass('invalidInput');
			
	}
	
	function highlightFbRegisterErrors() {
		if ( $(".fbAgbformError").length > 0 ) {	
			$("#fbAgbText").addClass('invalidInput');
		} else 					
			$("#fbAgbText").removeClass('invalidInput');
			
	}
	
	function setUrlPasswordLostForm( url ) {
    	$("#mobilePwLostForm") . attr ( "action", "http://" + url + "/index.php?action=newPlayer&function=sendPassword" ) ;
	}
	function setUrlMobileLogin( url ) {
    	$("#mobileLoginForm") . attr ( "action", "http://" + url + "/index.php?action=loginAvatar&function=login" ) ;
	}
			
	// replace agb-checkboxes (the native iPhone boxes are too small)
	$('.customCheck label').click(function(){
			var $this = $(this);
			if( $this.is('.checked') ) {
					$this.removeClass('checked');
					$this.addClass('unchecked');
			}
			else {
					$this.removeClass('unchecked');
					$this.addClass('checked');
			}
			
			var myCheckbox = $(this).children(':checkbox');

		   if(myCheckbox.is(':checked')){
			   myCheckbox.removeAttr('checked');
		   }else{
			   myCheckbox.attr('checked','checked');
		   }
			return false;
    });

    // check password and show errors and secure bar
    var ratio = '';
    var pwdMinLen = 6;
    $('#password').keyup(function(){
        $('#validChar').text('');
		
        $('#securePwd').css('display','block');

        var strPass = $(this).val();
        if (!hasValidChar(strPass)) {
            $('#validChar').text($('#txtInvalidChar').text());
            return;
        }
        if (strPass.length >= 6) {
            $('#securePwd .valid-icon').removeClass('invalid');
            $('#securePwd').closest('.formError').addClass('valid');

        }
        else{
            $('#securePwd .valid-icon').addClass('invalid');
            $('#securePwd').closest('.formError').removeClass('valid');
        }
        ratio = checkPass($(this).val(),pwdMinLen);
        if (ratio) {
            $('#securePwdBar').css({
                width: ratio+'%'
            });
            if (ratio > 69) {
                $('#securePwd #securePwdBar').css('background-position', '0 -119px');
            } else if (ratio > 41) {
                $('#securePwd #securePwdBar').css('background-position', '0 -106px');
            } else if (ratio < 41) {
                $('#securePwd #securePwdBar').css('background-position', '0px -80px !important');
            } else {
                $('#securePwd #securePwdBar').css('background-position', '0px -93px');
            }
        } else {
            $('#securePwdBar').css({
                width: 0
            });
            $('#securePwd .valid-icon').addClass('invalid');
        }
        if ( (ratio > 49) && (strPass.length < 5)) {
            $('#securePwdBar').css({
                'width':'48px',
                'background-position':'0px 0px'
            });
        }
    });
	
	// display security check while typing pwd
	$('#password').blur(function() {
		$('#securePwd').hide();
		$('.formErrorArrow').show();
		$('#mobile_reg-fb').show();
		
	});
	$('#password').focus(function() {
		$('#securePwd').show();
		$('.formErrorArrow').hide();
		$('#mobile_reg-fb').hide();
	});	
	
	
});