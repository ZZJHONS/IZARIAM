
$(document).ready(function() {
	
    setUrlPasswordLostForm( $('#serverPasswordLost :selected').val() );
	setUrlLoginForm( $('#logServer :selected').val() );
	
	 // check password and show errors and secure bar
    var ratio = '';
    var pwdMinLen = 6;
    $('#password').keyup(function() {
		 $('#validChar').text('');
		
        //$('#securePwd').fadeIn();
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
                $('#securePwd #securePwdBar').css('background-position', '0 -39px');
            } else if (ratio > 41) {
                $('#securePwd #securePwdBar').css('background-position', '0 -26px');
            } else if (ratio < 41) {
                $('#securePwd #securePwdBar').css('background-position', '0px 0px !important');
            } else {
                $('#securePwd #securePwdBar').css('background-position', '0px 0px');
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
	
    // change behaviour of select dropdowns
    $( '#logServer' ).change( function() {
        var logServer = $( '#logServer :selected' ) ;
        setUrlLoginForm( logServer . val() ) ;
        //Wir setzen keine Namen und PasswÃ¶rter mehr beim Serverwechsel.
        //setNameLoginForm( logServer . attr( 'cookiename' ) ) ;
        //setPWLoginForm( logServer . attr( 'cookiepw' ) ) ;
        //setUrlLoginForm( this.options [ this.selectedIndex ].value ) ; // not supported by IE6/7
    });
	
    $( "#oiServer" ).change( function() {
        setUrlOiLoginForm( $('#oiServer :selected').val() ) ;
    //        setUrlFBRegisterForm( this.options [ this.selectedIndex ] .attributes['fburl'].value ) ;
    });


    // OpenId Registration
    $('#oiRegBtn').click(function(){

        if(window.use_login_cookies) {
            setLoginCookie( {
                server:'#oiRegisterServer',
                remember:true,
                language:window.language
            } ) ;
		 }

        setUrlOiAuthForm( '/auth/oihandler/' );
        $('#oiRegisterForm').submit();
    });
	
	
    $('#oiRegisterForm').submit(function() {
        setUrlOiRegisterForm();
        this.submit();
    });

    // OpenId Login
    $('#oiLoginBtn').click(function(){
        if(window.use_login_cookies) {
            setLoginCookie( {
                server:'#oiServer',
                remember:true,
                language:window.language
            });
        }
        $('#oiLoginForm').submit();
    });
    
	//$('#oiLoginForm').submit(function() {
        //this.submit();
    //});
	
	// Registration
    $('#regBtn').click(function(){
        var success = $('#registerForm').validationEngine({
            returnIsValid:true
        });
        //$('#loginWrapper').fadeOut();
        $('#loginWrapper').hide();
        $('#btn-login').text(window.txt_login);
        $('#fbConnect').hide();
		
        if (success && window.ieSpecial) {
            document.registerForm.submit();
            this.disabled = true; // vgl http://drupal.org/node/138622
        }
    });
            
    // Login
    $('#loginBtn').click(function(){
        var success = $('#loginForm').validationEngine({
            promptPosition: "centerRight",
            returnIsValid: true
        });
        if(window.use_login_cookies) {
            setLoginCookie( {
                server:'#logServer',
                name:'#loginName',
                language:window.language
            });
        }
        if (success) document.forms['loginForm'].submit();
    });

    
    if(!window.ieSpecial) {
        // parallax
        $('#sky div').parallax({
            mouseport: jQuery('#page'),
            xparallax: true,
            yparallax: false,
            xorigin: 'right'
        });
    }

    
    // tabs (jquery tools)
    var tabs = $("ul#menu").tabs("div#pageContent", {
        initialIndex: null,
        effect: 'ajax'
    });
    var api = tabs.data('tabs');

    // open login layer
    $("#btn-login").click(function(){
        $.validationEngine.closePrompt('.formError',true);
        if ($(this).hasClass('open')) {
            $('#loginWrapper').hide();
            $(this).removeClass('open').text(window.txt_login);
        } else {
            $('#loginWrapper').show();
            $(this).addClass('open');
            $(this).text(window.txt_close);

            hideFbLogin();
            hideOiLogin();
        }
        return false;
    });

    // open openId layer
    $("#btn-oi").click(function () {
        $.validationEngine.closePrompt('.formError',true);
        if ($(this).hasClass('open')) {
            $('#oiLogin').hide();
            $(this).removeClass('open').css('z-index', '20');
            $('#btn-oi .btn-oi-text').text(window.txt_login_oi);
        } else {
            $('#oiLogin').show();
            $(this).addClass('open').css('z-index', '201');
            $('#btn-oi .btn-oi-text').text(window.txt_close);
            hideLogin();
            hideFbLogin();
        }
        return false;
    });

	$( "#serverPasswordLost" ).change( function() {
        setUrlPasswordLostForm( $( '#serverPasswordLost :selected' ) . val() ) ;
   }) ;
   
    $("#lnk_reg-fb").click(function() {
        showFbRegistration();
    });
	
    $("#lnk_reg-oi").click(function() {
        showOiRegistration();
    });

    $("a.iframe").fancybox({
        showNavArrows:false,
        onStart: function() {
            $.validationEngine.closePrompt('.formError',true);
        }
    });   	
        // Trailer-Klick-Error-Ausblendung.
    $('#player').click(function(){
        $.validationEngine.closePrompt('.formError',true);
    });
	
	$('.overlay').fancybox({        
		'height' : 500,
		'onStart': function() {
			$.validationEngine.closePrompt('.formError',true);
		}
	});
	
	// FB Login
	$('#fbBtn').click(function() {
		fbLogin();
	});	

    
    /* change registration name onclick */
    $( '#altNames input' ).click( function() {
        $( '#registerName' ) . val( this.value ) ;
    } ) ;

    /* unset altName radio on click */
    $( '#registerName' ) . click ( function() {
        $( 'input[name=altName]:checked' ).removeAttr("checked") ;
    } ) ;

    /* autofill openID url box */

    $("input[name='authService']") . click (function(){
        $("#oiUrl").val(this.value);
    });
	
		// validation stuff
    $.validationEngineLanguage.newLang()
    $("#registerForm").validationEngine({
        validationEventTriggers:"keyup blur focus",
        promptPosition: "centerRight",
        scroll: false
    });

	
	$("#pwLostForm").validationEngine({
        validationEventTriggers:"keyup blur",
        promptPosition: "centerRight",
        scroll: false
    });
	
	$("#fbRegisterForm").validationEngine({
        validationEventTriggers:"keyup blur",
        promptPosition: "centerRight",
        scroll: false
    });
		
    $.validationEngineLanguage.newLang()
    $("#oiRegisterForm").validationEngine({
        validationEventTriggers:"keyup blur focus"
    });
	
    $("#loginForm").validationEngine({
        promptPosition: "centerRight",
        scroll: false
    });
         
	// vertical text align for short headers (e.g. italy)
	if ($('#registerForFree').html().length <= 22) {
			$('#registerForFree').css('line-height', '51px');
	}
});


function hideLogin() {
    $('#loginWrapper').hide();
    $('#btn-login').removeClass('open');
    $('#btn-login').text(window.txt_login);
}

function hideFbLogin() {
    $('#fbConnect').hide();
    $('#btn-fb').css('z-index',20);
    $('#btn-fb').removeClass('open');
    $('#btn-fb .btn-fb-text').text(window.txt_login_fb);
}

function hideOiLogin() {
    $('#oiLogin').hide();
    $('#btn-oi').css('z-index',20);
    $('#btn-oi').removeClass('open');
    $('#btn-oi .btn-oi-text').text(window.txt_login_oi);
}

function showOiRegistration( callback ) {

	 callback = ( callback != null ) ? callback : 'void()' ;
	
	 $.validationEngine.closePrompt('.formError',true);

	 $('form#registerForm').css('display','none');
	 $('form#oiRegisterForm').css('display','block');
	 callback;
}

function showPasswordLost( url, result) {
   
    result = ( result != null ) ? '/?result=' + result : '' ;

    $('#menu .current').removeClass('current');
    $.validationEngine.closePrompt('.formError',true);
    $('#loginWrapper, #pageContent').hide();
    $('#fbConnect, #pageContent').hide();
    $('#extraContent').load(url + result).show();
}


/*function showPasswordLostFb( url, result) {

    result = ( result != null ) ? '/?result=' + result : '' ;

    $('#menu .current').removeClass('current');
    $.validationEngine.closePrompt('.formError',true);
    $('#btn-fb').removeClass('open');
    $('#btn-fb .btn-fb-text').text(window.txt_close);
    $('#extraContent').load(url + result).show();
}*/

function showFbRegistration( callback ) {

    callback = ( callback != null ) ? callback : 'void()' ;

    $.validationEngine.closePrompt('.formError',true);
    /*$('form#registerForm').fadeOut(300, function(){
        $('form#fbRegisterForm').fadeIn(300, function(){
            callback
        });
    });*/
    $('form#registerForm').css('display','none');
    $('form#fbRegisterForm').css('display','block');
    callback;
}


function setUrlOiRegisterForm() {
    url = $("#oiRegisterServer :selected").val();

    oiRegisterUrl = "http://" + url + "/index.php?action=newPlayer&function=createOiAvatar";
    $("#oiRegisterForm") . attr ( "action", oiRegisterUrl ) ;
}

function setUrlLoginForm( url ) {
    $("#loginForm") . attr ( "action", "http://" + url + "/index.php?action=loginAvatar&function=login" ) ;
}

function setUrlOiLoginForm( url ) {
    //$("#oiLoginForm") . attr ( "action", "http://" + url + "/ssoAuthFrame.php?action=loginAvatar&function=login&loginMode=2" ) ;
    $("#oiLoginForm") . attr ( "action", "http://" + url + "/?action=loginAvatar&function=login&loginMode=2" ) ;
}

function setNameLoginForm( name ) {
    if(name != '') {
        $("#loginName") . val(name);
    }
}

function setPWLoginForm( pw ) {
    if(pw != '') {
        $("#loginPassword") . val(pw);
    }
}

function setRememberLoginForm(name) {
    if(name != '') {
        $("#rememberMe").attr('checked','checked');
    }
}

function setUrlPasswordLostForm( url ) {

    $("#pwLostForm") . attr ( "action", "http://" + url + "/index.php?action=newPlayer&function=sendPassword" ) ;
}

function setUrlOiAuthForm( url ) {

    $("#oiRegisterForm") . attr ( "action", url ) ;
}

function setUrlFBLoginHref( url ) {

    $("#fbForm") . attr ( "action", url ) ;
}

function setUrlFBRegisterForm( url ) {

    $("#fbRegisterForm") . attr ( "action", url ) ;
}

function setUrlPasswordLostFormFb( url ) {

    $("#pwLostFormFb") . attr ( "action", url ) ;
}

/**
 * Die Verwendung dieser Funktion ist mÃ¶glicherweise problematisch,
 * da Mobilfunkproxies hier groÃŸen mist bauen und fremde Logindaten cachen!
 */
function setLoginCookie( fieldNames )
{

    // fieldNames sollte so aussehen:
    // { server:'#logServer', name:'#loginName', password:'#loginPassword' };


    // Wir holen die Daten aus dem Login-Formular...
    var server = $(fieldNames.server).val() ;
    var username = $(fieldNames.name).attr('value') ;
    //var password = $(fieldNames.password).attr('value') ;
    //var encryptedPassword = encodePassword( password ) ;

    // Wir bauen einen schÃ¶nen String aus unseren daten
    var cookieString= username /*+ ":" + encryptedPassword*/;

    // Und schreiben das in ein Cookie, das den namen des servers trÃ¤gt.
    $.cookie(server, cookieString, {
        expires: 365,
        path:'/'
    });
    // zusÃ¤tzlich merken wir uns noch den server, auf dem der letzte Login dieser Sprache erfolgt ist
    $.cookie('lastLogin_'+fieldNames.language, server, {
        expires:365,
        path:'/'
    });
}

/**
 * Die Verwendung dieser Funktion ist mÃ¶glicherweise problematisch,
 * da Mobilfunkproxies hier groÃŸen mist bauen und fremde Logindaten cachen!
 */
function setFBLoginCookie( fieldNames )
{
    //  fieldNames sollte so aussehen:
    //  { server:'#fbServer', language:window.language };

    
    // Wir holen die Daten aus dem Login-Formular...
    var server = $(fieldNames.server).val();

    // und wir merken uns den server, auf dem der letzte Login dieser Sprache erfolgt ist
    $.cookie('lastLogin_FB_'+fieldNames.language, server, {
        expires:365,
        path:'/'
    });

    // Wir brauchen auch noch ein Cookie, das den namen des servers trÃ¤gt.
    // Somit kÃ¶nnen wir den Server als verwendeten Facebook-Server markieren.
    $.cookie(server+'_FB', 'FB', {
        expires: 365,
        path:'/'
    });
    
}

function setOiLoginCookie( fieldNames )
{
    //  fieldNames sollte so aussehen:
    //  { server:'#fbServer', language:window.language };


    // Wir holen die Daten aus dem Login-Formular...
    var server = $(fieldNames.server).val();

    // und wir merken uns den server, auf dem der letzte Login dieser Sprache erfolgt ist
    $.cookie('lastLogin_FB_'+fieldNames.language, server, {
        expires:365,
        path:'/'
    });

    // Wir brauchen auch noch ein Cookie, das den namen des servers trÃ¤gt.
    // Somit kÃ¶nnen wir den Server als verwendeten Facebook-Server markieren.
    $.cookie(server+'_FB', 'FB', {
        expires: 365,
        path:'/'
    });

}

function addToServerList( server, serverList ) {

    // ...wenn eine Serverliste vorhanden ist
    if( serverList ) {

        oldServer = true ;

        // ...pruefen ob es nur einer oder mehrere Server sind
        if(serverList.length > 0)
        {
            serverArray = serverList.split( ',' ) ;
        }
        else
        {
            serverArray = serverList ;
        }

        // ...dementsprechend pruefen ob dieser Server dem aktuellen entpsrechen
        if( serverArray instanceof Array )
        {
            oldServer = in_array( server, serverArray ) ;
        }
        else if ( serverArray != server )
        {
            oldServer = false ;
        }

        // ...wenn es keine alter Server ist, an die Serverliste haengen
        if( !oldServer )
        {
            serverList = serverList + ',' + server ;
        }
    }
    // ...ansonsten Serverliste starten...
    else
    {
        serverList = server ;
    }

    return serverList ;
}

function setUrlPasswordLostForm( url ) {
    $("#pwLostForm") . attr ( "action", "http://" + url + "/index.php?action=newPlayer&function=sendPassword" ) ;
}
function setUrlLoginForm( url ) {
    $("#loginForm") . attr ( "action", "http://" + url + "/index.php?action=loginAvatar&function=login" ) ;
}


// diese funktion ist momentan deprecated.
function setCookies( cookieValues ) {

    // values = { 'server':server, 'serverList':serverList, 'name':name, 'password':encryptedPassword, 'remember':remember  } ;

    // ...und schreiben den Spass in die Cookies.
    if(cookieValues.serverValue != '') {
        $.cookie('server_'+cookieValues.language, cookieValues.serverValue, {
            expires: 365,
            path:'/'
        });
    }
    if(cookieValues.serverListValue != '') {
        $.cookie('serverList_'+cookieValues.language, cookieValues.serverListValue, {
            expires: 365,
            path:'/'
        });
    }
    if(cookieValues.nameValue != '') {
        $.cookie('username_'+cookieValues.language, cookieValues.nameValue, {
            expires: 365,
            path:'/'
        });
    }
    if(cookieValues.nameValue != '') {
        $.cookie('password_'+cookieValues.language, cookieValues.passwordValue, {
            expires: 365,
            path:'/'
        });
    }
    if(cookieValues.nameValue != '') {
        $.cookie('remember_'+cookieValues.language, cookieValues.rememberValue, {
            expires: 365,
            path:'/'
        });
    }
}

function encodePassword( password )
{
    // ...codieren das Passwort mit RSA...
    setMaxDigits(35); // Setzt die maximale Stellenzahl der in spÃ¤teren Key-Berechnungen benÃ¶tigten BigInts
    var key = new RSAKeyPair(
        "c0098abb2b4fef0c4a1fb4dbd81e1d00f27276244fe4b6a13b8a3cfc8d8cc0d",
        "",
        "1c6179cbb1c2dc74e038a4a9bc9b01252c0e25adbbbfad93f1b26b14cc915695"
        );
    return encryptedString(key,password+"\x01");
}

/**
* @deprecated
*/
function fetchCookieData() {
    var remember = $.cookie('remember_'+window.language);
    if(remember == 'true') {
        var server = $.cookie('server_'+window.language);
        var username = $.cookie('username_'+window.language);
        var password = $.cookie('password_'+window.language);
        // Felder befÃ¼llen...
        $('#serverLogin').val(server);
        $('#loginForm').attr('action',"http://"+server+"/game/reg/login2.php");
        $('#usernameLogin').attr('value',username);
        $('#passwordLogin').attr('value',password);
    }
}

function clearCookieData() {
    $.cookie('server_'+window.language, null);
    $.cookie('username_'+window.language, null);
    $.cookie('password_'+window.language, null);
    $.cookie('remember_'+window.language,null);
    $.cookie('serverList_'+window.language, null);
}

function in_array(item,arr)
{
    for(p=0;p<arr.length;p++) {
		if (item == arr[p]) return true;
	}
    return false;
}