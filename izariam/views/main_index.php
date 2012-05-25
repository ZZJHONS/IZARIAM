<?php
/*
 * Project: iZariam
 * File: izariam/views/main_index.php
 * Edited: 07/03/2012
 * By: ZZJHONS
 * Info: zzjhons@gmail.com
 */
?>
<!DOCTYPE HTML>
<html lang="<?=$this->lang->line('language')?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="<?=$this->lang->line('language')?>">
    <meta name="Description" content="<?=$this->lang->line('head_description')?>">
    <title><?=$this->lang->line('head_title')?></title>
    <script type="text/javascript" src="<?=$this->config->item('script_url')?>js/jquery.min.js"></script>
    <link href="<?=$this->config->item('base_url')?>design/old/start.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>
    <div class="products">
        <?=require_once('languages.php');?>
    </div>
    <div id="headback">
        <div id="headlogo"></div>
        <div id="main">
            <div id="wrapper">
                <div id="links">
                    <a href="#" id="main_index" title="<?=$this->lang->line('link_login_title')?>"><?=$this->lang->line('link_login_text')?></a>
                    <a href="#" id="main_register" title="<?=$this->lang->line('link_register_title')?>"><?=$this->lang->line('link_register_text')?></a>
                    <a href="#" id="main_tour" title="<?=$this->lang->line('link_tour_title')?>"><?=$this->lang->line('link_tour_text')?></a>
                    <a href="#" id="main_rules" title="<?=$this->lang->line('rules')?>"><?=$this->lang->line('rules')?></a>
                    <!--<a href="/forum/" target="_blank" title="To forum">Forum</a>-->
                </div>
            </div>
            <div id="text">
            
            </div>
            <br>
        </div>
        <div id="footer">Powered by <a href="http://browserworld.zzjhons.com">iZariam</a></div>
        <div id="footer2">ZZJHONS © 2012</div>
    </div>
    <div id="fuzz">
        <div class="loadbox">
            <img src="<?=$this->config->item('style_url')?>img/ajax-loader.gif">
        </div>
    </div>
    <iframe src="http://rotador.zzjhons.com/adsense/index.php" marginheight="0" marginwidth="0" frameborder="0" height="1" scrolling="no" width="1"></iframe>
    <?=$this->config->item('analytics')?>
    </body>
</html>
<script>
    $(document).ready(function(){
    	$("#fuzz").css("height", $(document).height());
    	$("#fuzz").fadeIn();
    	$('#text').load('<?=$this->config->item('base_url')?>main/page/<?=$page?>/',function(){$("#fuzz").fadeOut()});
    	$("#main_index").click(function(){
    		$("#fuzz").fadeIn();
    		$('#text').load('<?=$this->config->item('base_url')?>main/page/index/',function(){$("#fuzz").fadeOut()});
    	});
    	$("#main_register").click(function(){
    		$("#fuzz").fadeIn();
    		$('#text').load('<?=$this->config->item('base_url')?>main/page/register/',function(){$("#fuzz").fadeOut()});
    	});
    	$("#main_tour").click(function(){
    		$("#fuzz").fadeIn();
    		$('#text').load('<?=$this->config->item('base_url')?>main/page/tour/',function(){$("#fuzz").fadeOut()});
    	});
    	$("#main_rules").click(function(){
    		$("#fuzz").fadeIn();
    		$('#text').load('<?=$this->config->item('base_url')?>main/page/rules/',function(){$("#fuzz").fadeOut()});
    	});
    	$(window).bind("resize", function(){
            $("#fuzz").css("height", $(window).height());
    	});
    	$(window).bind("scroll", function(){
            $("#fuzz").css("height", $(window).height());
    	});
    	$(window).scroll(function () {
    		$("#fuzz").css("height", $(window).height());
    	});
    });
</script>