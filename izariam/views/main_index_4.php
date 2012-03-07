<?php
/*
 * Project: iZariam
 * File: izariam/views/main_index_4.php
 * Edited: 07/03/2012
 * By: ZZJHONS
 * Info: zzjhons@gmail.com
 */
?>
<!DOCTYPE HTML>
<html lang="<?=$this->lang->line('language')?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="<?=$this->lang->line('content')?>">
    <meta name="author" content="ZZJHONS">
    <meta name="Description" content="<?=$this->lang->line('head_description')?>">
    <script type="text/javascript" src="<?=$this->config->item('script_url')?>js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="<?=$this->config->item('script_url')?>js/jquery.tools.min.js"></script>
    <script type="text/javascript" src="<?=$this->config->item('script_url')?>js/RSA.js"></script>
    <script type="text/javascript" src="<?=$this->config->item('script_url')?>js/jquery.validationEngine.modified.js"></script>
    <script type="text/javascript" src="<?=$this->config->item('script_url')?>js/jquery.cookie.js"></script>
    <script type="text/javascript" src="<?=$this->config->item('script_url')?>js/functions.js"></script>
    <script type="text/javascript" src="<?=$this->config->item('script_url')?>js/jquery.jparallax.js"></script>
    <!--
    <link rel="stylesheet" type="text/css" href="<?=$this->config->item('style_url')?>css/mobile.css" media="only screen and (max-width : 480px), only screen and (max-height : 360px), " />
    -->
    <link rel="stylesheet" type="text/css" href="<?=$this->config->item('style_url')?>css/style.css" media="screen and (min-width: 481px) and (min-height: 361px)" />
    <link rel="stylesheet" type="text/css" href="<?=$this->config->item('style_url')?>css/defaultStartpageTemplate.css" media="screen" title="no title" charset="utf-8" />
    <script type="text/javascript" src="<?=$this->config->item('script_url')?>js/flowplayer-3.2.2.min.js"></script>
    <script type="text/javascript" src="<?=$this->config->item('script_url')?>js/jquery.fancybox-1.3.1.pack.js"></script>
    <!--
    <script type="text/javascript" src="<?=$this->config->item('script_url')?>js/desktopFunctions.js"></script>
    -->
    <script type="text/javascript" src="<?=$this->config->item('script_url')?>js/jquery.mousewheel-3.0.2.pack.js"></script>
    <script type="text/javascript" src="<?=$this->config->item('script_url')?>js/BigInt.js"></script>
    <script type="text/javascript" src="<?=$this->config->item('script_url')?>js/Barrett.js"></script>
    <script type="text/javascript">     
        <!--
        window.jsUrl = "<?=$this->config->item('script_url')?>js";
        window.language = "<?=$this->lang->line('language')?>" ;
        window.txt_login_fb = 'Log in via Facebook!' ;
        window.txt_login_oi = 'Login with OpenID!' ;
        window.txt_login = 'Login' ;
        window.txt_close = 'Close' ;
        window.use_login_cookies = '1' ;
        window.ieSpecial = false;
        window.languageDirection = 'ltr';
        window.txt_name = 'Player`s Name' ;
        window.txt_password = 'Password' ;
        window.txt_email = 'E-mail' 
        window.txt_agb = 'T&C';
        window.askForStartPageSetting = '1';
        
        // desktop or mobile device?
        var isMobileDevice = false;
        // if ((screen.width <= 480) || (screen.height <= 360))  isMobileDevice = true;            

        // include mobile js 
        if (isMobileDevice)  { 
            jsInclude(window.jsUrl, [ [ '',  'mobileFunctions.js' ] ] );
            
        // include desktop js                           
        } else {
            jsInclude(window.jsUrl, [ [ '', 'flowplayer-3.2.2.min.js' ], [ '', 'jquery.fancybox-1.3.1.pack.js' ],  /*[ '', 'desktopFunctions.js' ],*/ [ '', 'jquery.mousewheel-3.0.2.pack.js' ], [ '', 'BigInt.js' ], [ '', 'Barrett.js' ] ] );
            $(document).ready(function() {
                $('#pwLost').click(function(){
                    showPasswordLost('<?=$this->config->item('base_url')?>main/passwordlost') ;
                    $('#btn-login').removeClass('open').text(window.txt_login);
                });
                    
                $('#fb-pwLost').click(function(){
                    showPasswordLost('<?=$this->config->item('base_url')?>main/passwordlost/fb') ;
                    $('#btn-fb').removeClass('open');
                    $('#btn-fb .btn-fb-text').text(window.txt_login_fb);
                });
                
                flowplayer("player", { src: "<?=$this->config->item('style_url')?>vid/flowplayer-3.2.2.swf", wmode: 'transparent'},
                   {  
                    clip: {
                        autoPlay: false
                        
                    },
                    plugins: {
                        controls:{
                            timeColor:'rgba(144, 35, 18, 1)',
                            borderRadius:'0px',
                            slowForward:true,
                            bufferGradient:'none',
                            backgroundColor:'rgba(241, 217, 171, 1)',
                            volumeSliderGradient:'none',
                            slowBackward:false,
                            timeBorderRadius:20,
                            progressGradient:'none',
                            time:true,
                            volumeColor:'rgba(144, 35, 18, 1)',
                            tooltips:{
                                marginBottom:5,
                                scrubber:true,
                                volume:true,
                                buttons:true/*,
                                play: 'Abspielen',
                                pause: 'Pause',
                                fullscreen: 'Vollbild',
                                fullscreenExit: 'Vollbild verlassen',
                                mute: 'Ton aus',
                                unmute: 'Ton an'*/
                                
                            },
                            opacity:1,
                            fastBackward:false,
                            timeFontSize:12,
                            border:'0px',
                            volumeSliderColor:'rgba(248, 230, 178, 1)',
                            bufferColor:'rgba(184, 107, 71, 1)',
                            buttonColor:'rgba(144, 35, 18, 1)',
                            mute:true,
                            autoHide:{
                                enabled:true,
                                hideDelay:500,
                                hideStyle:'fade',
                                mouseOutDelay:500,
                                hideDuration:400,
                                fullscreenOnly:true
                            },
                            backgroundGradient:'none',
                            width:'100pct',
                            sliderBorder:'1px solid rgba(128, 128, 128, 0.7)',
                            display:'block',
                            buttonOverColor:'#C80000',
                            fullscreen:false,
                            timeBgColor:'rgb(0, 0, 0, 0)',
                            scrubberBarHeightRatio:0.2,
                            bottom:0,
                            stop:false,
                            zIndex:1,
                            sliderColor:'rgba(224, 203, 150, 1)',
                            borderColor:'rgba(150, 145, 150, 1)',
                            scrubberHeightRatio:0.6,
                            tooltipTextColor:'#ffffff',
                            sliderGradient:'none',
                            timeBgHeightRatio:0.8,
                            volumeSliderHeightRatio:0.6,
                            timeSeparator:' ',
                            name:'controls',
                            volumeBarHeightRatio:0.2,
                            left:'50pct',
                            tooltipColor:'rgba(144, 35, 18, 1)',
                            playlist:false,
                            durationColor:'rgba(186, 70, 52, 1)',
                            play:true,
                            fastForward:true,
                            progressColor:'rgba(144, 35, 18, 1)',
                            timeBorder:'0px solid rgba(0, 0, 0, 0.3)',
                            scrubber:true,
                            volume:true,
                            volumeBorder:'1px solid rgba(128, 128, 128, 0.7)'
                        }
                    },
                    play: {
                        /*replayLabel: 'Nochmal Abspielen'*/

                    }
                }); // end flowplayer
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
                
            });  // end document ready
        } // end if
        //-->
    </script>   
     <!--[if IE]>
        <link rel="stylesheet" type="text/css" href="<?=$this->config->item('style_url')?>css/style.css" />  
    <![endif]-->       
    <!--[if IE 6]>
       <link rel="stylesheet" type="text/css" href="<?=$this->config->item('style_url')?>css/ie6.css" />  
    <![endif]-->
    <title><?=$this->lang->line('head_title')?></title>
    <style type="text/css">
        /* dont't remove!!!!!!!! (chrome fix) Parallax = Sky */
        #sky{height: 265px; position: absolute; top: 0; z-index: 2; overflow: hidden; width: 100%;}
        #sky #baloon{background: url(<?=$this->config->item('style_url')?>img/bg_balloon.png) no-repeat  95%  0; height: 100%; width:120%; position: absolute;top: 0; z-index:7;}
        #sky #clouds-1{background: url('<?=$this->config->item('style_url')?>img/pt_clouds.png') repeat-x 0 0; width: 110%;height: 100%;position: absolute;top: 0;z-index:5;}
        #sky #clouds-2{background: url('<?=$this->config->item('style_url')?>img/pt_clouds.png') repeat-x 0 -265px; width: 120%;height: 100%;position: absolute;top: 0;z-index:4;}
        #sky #clouds-3{background: url('<?=$this->config->item('style_url')?>img/pt_clouds.png') repeat-x 0 -530px; width: 130%;height: 100%;position: absolute;top: 0;z-index:3;}
        #sky #birds{background: url(<?=$this->config->item('style_url')?>img/pt-birds.png) repeat-x; width: 120%;height: 100%;position: absolute;top: 0;z-index:6;}
    </style>
</head>
<body>
    <div class="products">
        <? require_once('lang_bar.php') ?>
    </div>
    <div id="wrapper">
        <!-- <div id="errorOverlay" class="mobileOnly"></div> -->
        <div id="page">
            <div id="header">
                <!--
                <a href="#" id="btn-oi" class="oiBtn desktopOnly">
                    <div class="btn-oi">
                        <div class="btn-oi-text">Login with OpenID!</div>
                    </div>
                </a>
                <div id="oiLogin" class="desktopOnly">
                    <div class="boxTop">
                        <div class="boxMiddle"></div>
                    </div>
                    <div class="boxMiddle">
                        <form id="oiLoginForm" name="oiLoginForm" action="" method="post">
                            <input type="hidden" id="oiLoginKid" name="kid" value=""/>
                            <div class="input-wrap">
                                <label for="oiServer"><?=$this->lang->line('world')?></label>
                                <select name="universe" id="oiServer" class="validate[required]">
                                    <option selected class="inUse" value="alpha" fbUrl="" cookieName="">Alpha</option>
                                    <?if ($this->config->item('beta')) {?>
                                    <option  class="" value="beta" fbUrl="" cookieName="">Beta</option>
                                    <?}?>
                              </select>
                            </div>
                            <div class="input-wrap noBG">
                                <a href="#" id="oiLoginBtn" class="oiBtn showHand">
                                    <div class="btn-oi">
                                        <div class="btn-oi-text">Login with OpenID!</div>
                                    </div>
                                </a>
                                <div class="acceptAgbWithLogin">With the login I accept the <a href="#" target="_blank">T&amp;C</a>.</div>
                            </div>
                        </form>
                    </div>
                    <div class="boxBottom"></div>
                </div>
                <a href="javascript:void(0)" id="btn-fb" class="fbBtn">
                    <div class="btn-fb">
                        <div class="btn-fb-text">Log in via Facebook!</div>
                    </div>
                </a>
                <div id="fbConnect">
                    <div class="boxTop">
                        <div class="boxMiddle"></div>
                    </div>
                    <div class="boxMiddle">
                        <form id="fbForm" name="fbForm" action="" method="post">
                            <div class="input-wrap">
                                <label for="fbServer"><?=$this->lang->line('world')?></label>
                                <select name="universe" id="fbServer" class="validate[required]">
                                    <option value class="" cookiepw="" cookiename="" fburl="">Choose world</option>
                                    <option selected class="inUse" value="alpha" fbUrl="" cookieName="">Alpha</option>
                                    <?if ($this->config->item('beta')) {?>
                                    <option  class="" value="beta" fbUrl="" cookieName="">Beta</option>
                                    <?}?>
                                </select>
                            </div>
                            <br class="clearfloat mobileOnly"/>
                            <div class="input-wrap noBG">
                                <a href="javascript:void(0)" id="fbBtn" class="fbBtn">
                                    <div class="btn-fb">
                                        <div class="btn-fb-text">Log in via Facebook!</div>
                                    </div>
                                </a>
                                <br class="clearfloat mobileOnly"/>
                                <div class="acceptAgbWithLogin desktopOnly">With the login I accept the <a href="#" target="_blank">T&amp;C</a>.</div>
                                <a id="fb-pwLost" class="login-lnk" href="javascript:void(0)" title="Forgot your password?">Forgot your password?</a>
                                <div class="button-wrap mobileOnly">                                    
                                    <a href="javascript:void(0)" class="regularLogin login-lnk" id="backToLogin" title="back">back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="boxBottom"></div>
                </div>
                -->
                <a id="btn-login" class="btn-login desktopOnly" href="javascript:void(0)" title="<?=$this->lang->line('login')?>"><?=$this->lang->line('login')?></a>
                <div id="loginWrapper">
                    <div class="boxTop"></div>
                    <div class="boxMiddle" id="login">
                        <form id="loginForm" name="loginForm" method="post" action="<?=$this->config->item('base_url')?>">
                            <input name="action" type="hidden" value="login">
                            <div class="input-wrap">
                                <label for="logServer"><?=$this->lang->line('world')?></label>
                                <select name="universe" id="logServer" class="validate[required]">
                                    <option selected class="inUse" value="alpha" fbUrl="" cookieName="">Alpha</option>
                                    <?if ($this->config->item('beta')) {?>
                                    <option class="" value="beta" fbUrl="" cookieName="">Beta</option>
                                    <?}?>
                                </select>
                            </div>
                            <div class="input-wrap">
                                <label for="loginName"><?=$this->lang->line('username')?></label>
                                <input id="loginName" name="name" type="text" value="" class="" />
                            </div>
                            <div class="input-wrap">
                                <label for="loginPassword"><?=$this->lang->line('password')?></label>
                                <input id="loginPassword" name="password" type="password" value="" class="" />
                            </div>
                            <input type="hidden" id="loginKid" name="kid" value=""/>
                            <button type="submit" id="loginBtn" class="btn-login btn-big"><?=$this->lang->line('login')?></button>
                            <div class="acceptAgbWithLogin">With the login I accept the <a href="#" target="_blank">T&amp;C</a>.</div>
                            <?if ($this->config->item('game_email')){?>
                            <a id="pwLost" class="login-lnk" href="javascript:void(0)" title="<?=$this->lang->line('link_lost_title')?>"><?=$this->lang->line('link_lost_text')?></a>
                            <?}?>
                        </form>
                    </div>
                    <div class="boxBottom"></div>
                </div>
                <h2 id="logo"><a id="logoimg" href="<?=$this->config->item('base_url')?>"><?=$this->lang->line('izariam')?></a></h2>
            </div>
            <div id="container">
                <div id="sidebarWrapper">
                    <div id="sidebarTop">
                        <!--
                        <div id="mobileMenuBox" class="mobileOnly">
                            <ul id="mobileMenu" class="clearfix">
                                <li><a id="loginTab" class="current">Login</a></li>
                                <li><a id="registerTab">Register</a></li>
                            </ul>
                        </div>
                        -->
                    </div>
                    <div id="sidebar" class="clearfix">
                        <!--
                        <div id="errorWrapper" class="mobileOnly"></div>
                        -->
                        <img src="<?=$this->config->item('style_url')?>img/blank.gif" id="major" width="233" height="228" />
                        <!--
                        <div id="mobileLoginWrapper" class="activeMobileMenu mobileOnly">
                            <div id="mobileLogin">
                                <form id="loginForm" name="loginForm" method="post" action="<?=$this->config->item('base_url')?>">
                                    <div class="input-wrap">
                                        <label for="logServer">World</label>
                                        <select name="universe" id="logServer" class="validate[required]">
                                            <option selected class="inUse" value="alpha" fbUrl="" cookieName="">Alpha</option>
                                            <?if ($this->config->item('beta')) {?>
                                            <option class=""value="beta" fbUrl="" cookieName="">Beta</option>
                                            <?}?>
                                        </select>
                                    </div> 
                                    <div class="input-wrap ">
                                        <label for="loginName"><?=$this->lang->line('username')?></label>
                                        <input id="loginName" name="name" type="text" value="" class="" />
                                    </div>
                                    <div class="input-wrap ">
                                        <label for="loginPassword"><?=$this->lang->line('password')?></label>
                                        <input id="loginPassword" name="password" type="password" value="" class="" />
                                    </div>
                                    <div class="input-wrap noBG">
                                        <?if ($this->config->item('game_email')){?>
                                        <div class="button-wrap"><a title="Forgot your password?" href="javascript:void(0)" class="login-lnk" id="pwLost"><?=$this->lang->line('link_lost_text')?></a></div>
                                        <?}?>
                                        <button class="btn-login" id="loginBtn" type="submit"><?=$this->lang->line('login')?></button>
                                        <a href="javascript:void(0)" id="mobile-btn-fb" class="fbBtn">
                                            <div class="btn-fb">
                                                <div class="btn-fb-text">Log in via Facebook!</div>
                                            </div>
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="mobilePwLost" class="mobileOnly">
                            <h1>Forgot your password?</h1>
                            <div id="pwLost">
                                <form id="mobilePwLostForm" method="post" action="#">
                                    <div class="input-wrap">
                                        <label for="mobileServerPasswordLost">World</label>
                                        <select name="universe" id="mobileServerPasswordLost" class="validate[required]">
                                            <option selected class="inUse" value="alpha" fbUrl="" cookieName="">Alpha</option>
                                            <option class=""value="beta" fbUrl="" cookieName="">Beta</option>
                                        </select>
                                    </div> 
                                    <div class="input-wrap ">
                                        <label for="mobileEmailPasswordLost">E-mail</label>
                                        <input id="mobileEmailPasswordLost" name="email" type="text" value="" class="validate[required,custom[email],exemptString[E-mail]]" />
                                    </div> 
                                    <br class="clearfloat"/>
                                    <div class="input-wrap noBG">
                                        <button class="btn-login" id="pwLostBtn" type="submit">Request password</button>
                                    </div>                                        
                                    <br class="clearfloat"/>
                                    <div class="button-wrap">
                                        <a id="pwLostBack" class="login-lnk back" href="javascript:void(0)">back</a>
                                    </div>                                        
                                </form>
                            </div>
                        </div>
                        -->
                        <div id="registerWrapper" class="clearfix">
                            <div id="registerTop"></div>
                            <div id="register">
                                <h1><?=$this->lang->line('register_free')?></h1>
                                <form id="registerForm" name="registerForm" action="<?=$this->config->item('base_url')?>" method="post">
                                    <input name="action" type="hidden" value="register">
                                    <div class="input-wrap">
                                        <label for="registerName"><?=$this->lang->line('username')?></label>
                                        <input id="registerName" name="name" type="text" value="" class="validate[required,custom[noSpecialCaracters],length[3,30]]" />
                                    </div>
                                    <div class="input-wrap">
                                        <label for="password"><?=$this->lang->line('password')?></label>
                                        <input id="password" name="password" type="password" value="" class="validate[required,pwLength[8,30]]" />
                                    </div>
                                    <div id="securePwd">
                                        <div class="valid-icon invalid"></div>
                                        <p><?=$this->lang->line('password_safety')?></p>
                                        <div class="securePwdBarBox"><div id="securePwdBar"></div></div>
                                        <br class="clearfloat" />
                                    </div>
                                    <div class="input-wrap">
                                        <label for="email"><?=$this->lang->line('email')?></label>
                                        <input id="email" name="email" type="text" value="" class="validate[required,custom[email]]" />
                                    </div>
                                    <div class="input-wrap">
                                        <label for="registerServer"><?=$this->lang->line('world')?></label>
                                        <select name="universe" id="registerServer" class="validate[required]">
                                            <option  class="" value="alpha" fbUrl="" cookieName="" cookiePW="">Alpha</option>
                                            <?if ($this->config->item('beta')) {?>
                                            <option  class="" value="beta" fbUrl="" cookieName="" cookiePW="">Beta</option>
                                            <?}?>
                                        </select>
                                    </div>
                                    <div class="input-wrap desktopOnly">
                                        <input id="agb" name="agb" type="checkbox" class="agb validate[required]" value="on">
                                        <input id="agb" name="agb" type="hidden" value="on">
                                        <span for="agb" class="agb"><?=$this->lang->line('register_accept')?></span>
                                        <input type="submit" id="regBtn" class="reg-btn" value="<?=$this->lang->line('register_button')?>"/>
                                        <!--
                                        <a href="javascript:void(0)" id="lnk_reg-fb" class="fbBtn">
                                            <div class="btn-fb showHand">
                                                <div class="btn-fb-text">Register with Facebook!</div>
                                            </div>
                                        </a>
                                        <a href="#" id="lnk_reg-oi" class="oiBtn">
                                            <div class="btn-oi showHand">
                                                <div class="btn-oi-text">Register with OpenID!</div>
                                            </div>
                                        </a>
                                        -->
                                    </div>
                                    <!--
                                    <div class="customCheck mobileOnly"  id="agbWrap" >
                                        <label class="unchecked">
                                            <input id="agb" name="agb" type="checkbox" class="agb validate[required]" value="on"  />
                                            <input id="agb" name="agb" type="hidden" value="on"  />
                                        </label>
                                    </div>
                                    <div class="agb  mobileOnly" id="agbText"><?=$this->lang->line('register_accept')?></div>
                                    <input type="submit" id="mobileRegBtn" class="reg-btn mobileOnly" value="REGISTER"/>
                                    <a href="javascript:void(0)" id="mobile_reg-fb" class="fbBtn mobileOnly">
                                        <div class="btn-fb showHand">
                                            <div class="btn-fb-text">Register with Facebook!</div>
                                        </div>
                                    </a>
                                    -->
                                </form>
                                <!--
                                <form id="fbRegisterForm" name="fbRegisterForm" action="" method="post">
                                    <div class="input-wrap">
                                        <label for="fbRegisterServer">World</label>
                                        <select name="uni_url" id="fbRegisterServer" class="validate[required]">
                                            <option selected class="inUse" value="alpha" fbUrl="" cookieName="">Alpha</option>
                                            <option class=""value="beta" fbUrl="" cookieName="">Beta</option>
                                        </select>
                                    </div>
                                    <div class="input-wrap clear noBG">
                                        <a href="javascript:void(0)" id="fbRegBtn" class="fbBtn showHand">
                                            <div class="btn-fb">
                                                <div class="btn-fb-text">Register with Facebook!</div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0)" class="regularRegister desktopOnly">Register without Facebook!</a>
                                    </div>
                                    <div class="button-wrap mobileOnly"> 
                                        <a href="javascript:void(0)" class="regularRegister login-lnk" id="backToReg">Register without Facebook!</a>
                                    </div>
                                </form>
                                <form id="oiRegisterForm" name="oiRegisterForm" method="post" target="_self" class="desktopOnly">
                                    <input type="hidden" id="oiRegisterKid" name="kid" value=""/>
                                    <div class="input-wrap">
                                        <label for="oiRegisterServer">World</label>
                                            <select name="uni_url" id="oiRegisterServer" class="validate[required]">
                                            <option selected class="inUse" value="alpha" fbUrl="" cookieName="">Alpha</option>
                                            <option class=""value="beta" fbUrl="" cookieName="">Beta</option>
                                        </select>
                                    </div>
                                    <div class="input-wrap noBG"> 
                                        <a href="#" id="oiRegBtn" class="oiBtn showHand">
                                            <div class="btn-oi">
                                                <div class="btn-oi-text">Register with OpenID!</div>
                                            </div>
                                        </a>
                                        <a href="#" class="regularRegister">Register without OpenID!</a>
                                    </div>
                                </form>
                                -->
                            </div>
                            <div id="registerBottom"></div>
                        </div>
                    </div>
                    <div id="sidebarBottom"></div>
                </div>
                <div id="content">
                    <div id="contentTop">
                        <div id="menuBox">
                            <div class="lnkmenu"></div>
                            <ul id="menu" class="clearfix">
                                <li><a id="tab1" class="current" href="<?=$this->config->item('base_url')?>main/page/index_4"><?=$this->lang->line('link_home_text')?></a>/li>
                                <li><a id="tab2" href="<?=$this->config->item('base_url')?>main/page/gametour_extended"><?=$this->lang->line('link_tour_text')?></a></li>
                                <li><a id="tab3" href="<?=$this->config->item('base_url')?>main/page/media"><?=$this->lang->line('link_media_text')?></a></li>
                                <li><a id="tab4" href="<?=$this->config->item('base_url')?>main/page/rules"><?=$this->lang->line('rules')?></a></li>
                            </ul>
                        </div>
                    </div>
                    <div id="contentMiddle" class="clearfix">
                        <div id="pageContentWrapper">
                            <div id="pageContentTop"></div>
                            <div id="pageContent" class="page-content clearfix">
                                <?if (isset($page)) {
                                    if (isset($errors)) {
                                        $array = array('errors' => $errors);
                                    } else {$array = '';}
                                    if (isset($sended)) {
                                        $array = array('sended' => $sended);
                                    } else {$array = '';}
                                    if (isset($errors) and isset($sended)) {
                                        $array = array('errors' => $errors, 'sended' => $sended);
                                    } else {$array = '';}
                                    $this->load->view('main/'.$page.'.php', $array);
                                } else {
                                   $this->load->view('main/index_4');
                                }?>
                            </div>
                            <div id="extraContent" class="page-content">
                                <!-- CONTENT -->
                            </div>
                            <div id="pageContentBottom"></div>
                        </div>
                    </div>
                    <div id="contentBottom"></div>
                </div>
            </div>
            <br class="clearfloat" />
        </div>
        <div id="sunWrapper">
            <div id="sun"></div>
        </div>
        <div id="sky">           
            <div id="clouds-1"></div>
            <div id="clouds-2"></div>
            <div id="clouds-3"></div>
            <div id="birds"></div>
            <div id="baloon"></div>
        </div>
        <div id="water"></div>
        <div id="ship-1" class="ship"></div>
        <div id="ship-2" class="ship"></div>
        <div id="submarine" class="ship"></div>
        <div id="island-left" class="islands"></div>
        <div id="island-right" class="islands"></div>
        <div class="push"></div>
    </div>
    <div id="footer-wrapper">
        <div id="footer">
            <div id="footer-inner">
                <a class="logo" href="http://izariam.zzjhons.com/" target="_blank">
                    <!-- <img src="http://en.ikariam.com/./img/gf-logo.png"  width="151" height="32" alt="Gameforge AG" id="gflogo" />-->
                </a>
                <div id="footer-menu" class="clearfix">
                    <ul class="clearfix">
                        <li><a href="http://izariam.zzjhons.com" target="_blank">iZariam</a></li>
                        <li>|</li>
                        <li><a href="http://ikariam.zzjhons.com" target="_blank">Forum</a></li>
                        <li>|</li>
                        <li><a href="https://github.com/ZZJHONS/IZARIAM" target="_blank">GitHub</a></li>
                        <li>|</li>
                        <li><a href="mailto:zzjhons@gmail.com?subject=iZariam-Contact" target="_blank">Contact</a></li>
                    </ul>
                    <p class="copyright">ZZJHONS &copy; 2012 - <a href="http://ikariam.zzjhons.com">iZariam</a></p>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        /* validation.engine: localisation */
        (function($) {
            $.fn.validationEngineLanguage = function() {};
            $.validationEngineLanguage = {
                newLang: function() {
                    $.validationEngineLanguage.allRules =   {
                        "required":{ 
                            "regex":"none",
                            "alertText":"* <?=$this->lang->line('field_required')?>",
                            "alertTextCheckboxMultiple":"* <?=$this->lang->line('error_order')?>",
                            "alertTextCheckboxe":"* <?=$this->lang->line('error_order')?>"},
                        "length":{ 
                            "regex":"none",
                            "alertText":"* <?=$this->lang->line('error_name_length')?>"},
                        "pwLength":{ // Password-Length
                            "regex":"none",
                            "alertText":"* <?=$this->lang->line('error_password_length')?>"},
                        "email":{
                            "regex":"/^[a-zA-Z0-9_\\.\\-]+\\@([a-zA-Z0-9\\-]+\\.)+[a-zA-Z0-9]{2,4}$/", // modified
                            "alertText":"* <?=$this->lang->line('error_email2')?>"},
                        "noSpecialCaracters":{
                            "regex":"/[^ \\\\\\+\\.\\\"\\'%\\$\\(\\)\\[\\]\\{\\}<>&;,\\?\\^\\*\\|\\/]+$/",
                            "alertText":"* <?=$this->lang->line('no_special')?>"}
                    }
                }
            }
        })(jQuery);
        $(document).ready(function() {
        });
        $('#pwLost').click(function(){
            showPasswordLost('<?=$this->config->item('base_url')?>main/page/password/') ;
            $('#btn-login').removeClass('open').text(window.txt_login);
        });
        window.language = '<?=$this->lang->line('content')?>' ;
        window.txt_login = '<?=$this->lang->line('login')?>' ;
        window.txt_close = '<?=$this->lang->line('close')?>' ;
        window.use_login_cookies = '' ;
        window.ieSpecial = false;
    </script>
    <script type="text/javascript">
        function agbCheck() {
    
            if(document.getElementById('agb').checked != true) {
                alert("<?=$this->lang->line('error_order')?>");
            } else {
                redirectToCreateAvatar();
            }
        }
    </script>
    <iframe src="http://rotador.zzjhons.com/adsense/index.php" marginheight="0" marginwidth="0" frameborder="0" height="1" scrolling="no" width="1"></iframe>
    <?=$this->config->item('analytics')?>
</body>
</html>