<?php
/*
 * Project: iZariam
 * File: izariam/views/lang_bar.php
 * Edited: 07/03/2012
 * By: ZZJHONS
 * Info: zzjhons@gmail.com
 */
$userdata = $this->session->userdata('language');
$item = $this->config->item('language');
$item2 = $this->config->item('base_url');
function langList($lang = 'english', $userdata, $item, $item2){
	if($userdata == $lang or ($userdata == '' and $item == $lang)){
		echo ' class="mmoActive"';
	}
	echo '><a href="'.$item2.'main/language/'.$lang.'/"';
}
?>
<div id="pagefoldtarget"></div>
<script type="text/javascript">
	var mmoCSS = " body {margin:0; padding:0;} #mmonetbar { background:transparent url(<?=$this->config->item('style_url')?>netbar/netbar.bg.png) repeat-x; font:normal 11px Tahoma, Arial, Helvetica, sans-serif; height:32px; left:0; padding:0; position:absolute; text-align:center; top:0; width:100%; z-index:3000; } #mmonetbar #mmoContent { height:32px; margin:0 auto; width:1024px; position: relative; } #mmonetbar .mmosmallbar {width:585px !important;} #mmonetbar .mmosmallbar div.mmoBoxMiddle { width: 290px; } #mmonetbar .mmonewsout {width:800px !important;} #mmonetbar .mmouseronlineout {width:768px !important;} #mmonetbar .mmolangout {width:380px !important;} #mmonetbar .mmolangout .mmoGame { width: 265px; } #mmonetbar #mmoContent.mmoingame { width: 533px; } #mmonetbar #mmoContent.mmoingame .mmoGame { width: auto; } #mmonetbar a { color:#666; font:normal 11px Tahoma, Arial, Helvetica, sans-serif; outline: none; text-decoration:none; white-space:nowrap; } #mmonetbar select { background-color:#bed7e3 !important; border:1px solid #1d707b !important; color:#602b0c !important; font:normal 11px Verdana, Arial, Helvetica, sans-serif; height:18px; margin-top:3px; width:100px; } #mmonetbar .mmoGames select {width:80px;} #mmonetbar option { background-color:#bed7e3 !important; color:#602b0c !important; } #mmonetbar option:hover { background-color:#9ec8dd !important; } #mmonetbar select#mmoCountry {width:120px;} #mmonetbar .mmoSelectbox { background-color:#bed7e3; float:left; margin:3px 0 0 3px; position:relative; } * html #mmonetbar .mmoSelectbox {position:static;} *+html #mmonetbar .mmoSelectbox {position:static;} #mmonetbar #mmoOneGame {cursor:default; height:14px; margin-top:3px; padding-left:5px; width:80px;} #mmonetbar .label {float:left; font-weight:bold; margin-right:4px; overflow:hidden !important;} #mmonetbar #mmoUsers .label {font-size:10px;} #mmonetbar .mmoBoxLeft, #mmonetbar .mmoBoxRight { background:transparent url(<?=$this->config->item('style_url')?>netbar/netbar.sprites.png) no-repeat -109px -4px; float:left; width:5px; height:24px; } #mmonetbar .mmoBoxRight {background-position:-126px -4px;} #mmonetbar .mmoBoxMiddle { background:transparent url(<?=$this->config->item('style_url')?>netbar/netbar.bg.png) repeat-x 0 -36px; color:#602b0c !important; float:left; height:24px; line-height:22px; text-align:left; white-space:nowrap; position: relative; z-index: 10000; } #mmonetbar #mmoGames, #mmonetbar #mmoLangs {margin:0px 4px 0 0;} #mmonetbar #mmoNews, #mmonetbar #mmoUsers, #mmonetbar #mmoGame, #mmonetbar .nojsGame {margin:4px 4px 0 0;} #mmonetbar #mmoLogo { background:transparent url(<?=$this->config->item('style_url')?>netbar/netbar.sprites.png) no-repeat top left; float:left; display:block; height:32px; width:108px; text-indent: -9999px; position: relative; z-index: 1 } #mmonetbar #mmoNews {float:left; width:252px;} #mmonetbar #mmoNews #mmoNewsContent {text-align:left; width:200px;} #mmonetbar #mmoNews #mmoNewsticker {overflow:hidden; width:240px;} #mmonetbar #mmoNews #mmoNewsticker ul { margin: 0; padding: 0; list-style: none; } #mmonetbar #mmoNews #mmoNewsticker ul li { font:normal 11px/22px Tahoma, Arial, Helvetica, sans-serif !important; color:#602b0c !important; padding: 0; margin: 0; background: none; display: none; } #mmonetbar #mmoNews #mmoNewsticker ul li.mmoTickShow { display: block; } #mmonetbar #mmoNews #mmoNewsticker ul li a img {border:0;} #mmonetbar #mmoNews #mmoNewsticker ul li a {color:#602b0c !important;display:block;height:24px;line-height:23px;} #mmonetbar #mmoNews #mmoNewsticker ul li a:hover {text-decoration:underline;} #mmonetbar #mmoUsers {float:left; width:178px;} #mmonetbar #mmoUsers .mmoBoxLeft {width:17px;} #mmonetbar #mmoUsers .mmoBoxMiddle {padding-left:3px; width:150px;} #mmonetbar .mmoGame {display:none; float:left; width:432px;} #mmonetbar .mmoGame #mmoGames {float:left; width:206px;} #mmonetbar .mmoGame #mmoLangs {float:left; margin:0; width:252px;} #mmonetbar .mmoGame label { color:#602b0c !important; float:left; font-weight:400 !important; line-height:22px; margin:0px; text-align:right !important; width:110px; font-size: 11px !important; } #mmonetbar .nojsGame {display:block; width:470px;} #mmonetbar .nojsGame .mmoBoxMiddle {width:450px;} #mmonetbar .nojsGame .mmoSelectbox {margin:0px 0 0 3px;} *+html #mmonetbar .nojsGame .mmoSelectbox {margin:2px 0 0 3px;} * html #mmonetbar .nojsGame .mmoSelectbox {margin:2px 0 0 3px;} #mmonetbar .nojsGame .mmoGameBtn { background:transparent url(<?=$this->config->item('style_url')?>netbar/netbar.sprites.png) no-repeat -162px -7px; border:none; cursor:pointer; float:left; height:18px; margin:3px 0 0 7px; padding:0; width:18px; } #mmonetbar .mmoSelectArea { border:1px solid #1d707b; color:#602b0c !important; display:block !important; float:none; font-weight:400 !important; font-size:11px; height:16px; line-height:13px; overflow:hidden !important; width:90px; } #mmonetbar #mmoLangSelect .mmoSelectArea {width:129px;} #mmonetbar #mmoLangSelect .mmoOptionsDivVisible {min-width:129px;} #mmonetbar .mmoSelectArea .mmoSelectButton { background: url(<?=$this->config->item('style_url')?>netbar/netbar.sprites.png) no-repeat -141px -8px; float:right; width:17px; height:16px; } #mmonetbar .mmoSelectText {cursor:pointer; float:left; overflow:hidden; padding:1px 2px; width:68px;} #mmonetbar #mmoLangSelect .mmoSelectText {width:107px;} #mmonetbar #mmoOneLang {cursor:default; height:14px;} #mmonetbar div.mmoOneLang { background: none; } #mmonetbar div.mmoOneLang #mmoOneLang { border: none; padding: 2px 3px; } #mmonetbar .mmoOptionsDivInvisible, #mmonetbar .mmoOptionsDivVisible { background-color: #bed7e3 !important; border: 1px solid #1d707b; position: absolute; min-width:90px; z-index: 3100; } * html #mmonetbar .mmoOptionsDivVisible .highlight {background-color:#9ec8dd !important} #mmonetbar .mmoOptionsDivInvisible {display: none;} #mmonetbar .mmoOptionsDivVisible ul { border:0; font:normal 11px Tahoma, Arial, Helvetica, sans-serif; list-style: none; margin:0; padding:2px; overflow:auto; overflow-x:hidden; } #mmonetbar #mmoLangs .mmoOptionsDivVisible ul {min-width:125px;} #mmonetbar .mmoOptionsDivVisible ul li { background-color: #bed7e3; height:14px; padding:2px 0; } #mmonetbar .mmoOptionsDivVisible a { color: #602b0c !important; display: block; font-weight:400 !important; height:16px !important; min-width:80px; text-decoration: none; white-space:nowrap; width:100%; } #mmonetbar #mmoContent .mmoLangList a {min-width:102px;} #mmonetbar .mmoOptionsDivVisible li:hover {background-color: #9ec8dd;} #mmonetbar .mmoOptionsDivVisible li a:hover {color: #602b0c !important;} #mmonetbar .mmoOptionsDivVisible li.mmoActive {background-color: #9ec8dd !important;} #mmonetbar .mmoOptionsDivVisible li.mmoActive a {color: #602b0c !important;} #mmonetbar .mmoOptionsDivVisible ul.mmoListHeight {height:240px} #mmonetbar .mmoOptionsDivVisible ul.mmoLangList.mmoListHeight li {padding-right:15px !important; width:100%;} #mmonetbar #mmoGameSelect ul.mmoListHeight a {min-width:85px;} #mmonetbar #mmoLangSelect ul.mmoListHeight a {min-width:105px;} #mmonetbar #mmoFocus {position:absolute;left:-2000px;top:-2000px;} #mmonetbar #mmoLangs .mmoSelectText span, #mmonetbar #mmoLangs .mmoflag { background: transparent url(<?=$this->config->item('style_url')?>netbar/mmoflags.png) no-repeat; height:14px !important; padding-left:23px; } .mmo_AE {background-position:left 0px !important} .mmo_AR {background-position:left -14px !important} .mmo_BE {background-position:left -28px !important} .mmo_BG {background-position:left -42px !important} .mmo_BR {background-position:left -56px !important} .mmo_BY {background-position:left -70px !important} .mmo_CA {background-position:left -84px !important} .mmo_CH {background-position:left -98px !important} .mmo_CL {background-position:left -112px !important} .mmo_CN {background-position:left -126px !important} .mmo_CO {background-position:left -140px !important} .mmo_CZ {background-position:left -154px !important} .mmo_DE {background-position:left -168px !important} .mmo_DK {background-position:left -182px !important} .mmo_EE {background-position:left -196px !important} .mmo_EG {background-position:left -210px !important} .mmo_EN {background-position:left -224px !important} .mmo_ES {background-position:left -238px !important} .mmo_EU {background-position:left -252px !important} .mmo_FI {background-position:left -266px !important} .mmo_FR {background-position:left -280px !important} .mmo_GR {background-position:left -294px !important} .mmo_HK {background-position:left -308px !important} .mmo_HR {background-position:left -322px !important} .mmo_HU {background-position:left -336px !important} .mmo_ID {background-position:left -350px !important} .mmo_IL {background-position:left -364px !important} .mmo_IN {background-position:left -378px !important} .mmo_INTL {background-position:left -392px !important} .mmo_IR {background-position:left -406px !important} .mmo_IT {background-position:left -420px !important} .mmo_JP {background-position:left -434px !important} .mmo_KE {background-position:left -448px !important} .mmo_KR {background-position:left -462px !important} .mmo_LT {background-position:left -476px !important} .mmo_LV {background-position:left -490px !important} .mmo_ME {background-position:left -504px !important} .mmo_MK {background-position:left -518px !important} .mmo_MX {background-position:left -532px !important} .mmo_NL {background-position:left -546px !important} .mmo_NO {background-position:left -560px !important} .mmo_PE {background-position:left -574px !important} .mmo_PH {background-position:left -588px !important} .mmo_PK {background-position:left -602px !important} .mmo_PL {background-position:left -616px !important} .mmo_PT {background-position:left -630px !important} .mmo_RO {background-position:left -644px !important} .mmo_RS {background-position:left -658px !important} .mmo_RU {background-position:left -672px !important} .mmo_SE {background-position:left -686px !important} .mmo_SI {background-position:left -700px !important} .mmo_SK {background-position:left -714px !important} .mmo_TH {background-position:left -728px !important} .mmo_TR {background-position:left -742px !important} .mmo_TW {background-position:left -756px !important} .mmo_UA {background-position:left -770px !important} .mmo_UK {background-position:left -784px !important} .mmo_US {background-position:left -798px !important} .mmo_VE {background-position:left -812px !important} .mmo_VN {background-position:left -826px !important} .mmo_YU {background-position:left -840px !important} .mmo_ZA {background-position:left -854px !important} .mmo_WW {background-position:left -392px !important} div#mmonetbar a:active { top: 0; } div#mmoGamesOverviewPanel { width: 582px; position: absolute; top: 0; right: 0; font: 12px Arial, sans-serif; } div#mmoGamesOverviewPanel h4, div#mmoGamesOverviewPanel h5 { margin: 0; font-size: 12px; font-weight: bold; text-align: left; } div#mmoGamesOverviewPanel a { text-decoration: none; } div#mmoGamesOverviewPanel a img { border: none; } div#mmoGamesOverviewToggle { width: 168px; padding: 4px 0 4px 414px; } div#mmoGamesOverviewToggle h4 { height: 18px; position: relative; background: url(<?=$this->config->item('style_url')?>netbar/netbar.bg.png) repeat-x 0 -36px; top: 0px; padding: 3px 20px; } div#mmoGamesOverviewToggle h4 a { display: block; width: 116px; height: 16px; line-height: 14px; text-align: left; font-weight: normal; outline: none; color: #602b0c !important; font-size: 11px !important; position: relative; border: 1px solid #1d707b; padding: 0 0 0 10px; background: #bed7e3; } div#mmoGamesOverviewToggle h4 a.gameCountZero { cursor: default; text-align: center; padding: 0; width: 126px; } div#mmoGamesOverviewToggle h4 a span.mmoNbPseudoSelect_icon { display: block; position: absolute; top: 0; right: 0; width: 17px; height: 16px; background: url(<?=$this->config->item('style_url')?>netbar/netbar.sprites.png) no-repeat -141px -8px; } span.iconTriangle { display: block; position: absolute; top: 5px; right: 10px; width: 0px; border: 5px solid transparent; border-bottom-color: #602b0c; } div#mmoGamesOverviewToggle h4 a.toggleHidden { } div#mmoGamesOverviewToggle h4 a.toggleHidden span.iconTriangle { top: 10px; border: 5px solid transparent; border-top-color: #602b0c; } div#mmoGamesOverviewToggle h4 span.mmoNbBoxEdge { display: block; width: 5px; height: 24px; background: url(<?=$this->config->item('style_url')?>netbar/netbar.sprites.png) no-repeat -109px -4px; position: absolute; top: 0; } div#mmoGamesOverviewToggle h4 span.mmoNbBoxEdge_left { left: 0; } div#mmoGamesOverviewToggle h4 span.mmoNbBoxEdge_right { right: 0; background-position: -126px -4px; } div#mmoGamesOverviewLists { clear: both; background: #bed7e3; width: 580px; border: 1px solid #1d707b; float: left; position: relative; top: 0px; } div#mmoGamesOverviewLists h5 { clear: both; width: 544px; margin: 0; padding: 0 18px; height: 27px; line-height: 27px; color: #602b0c; border-bottom: 1px solid #1d707b; background: url(<?=$this->config->item('style_url')?>netbar/netbar.bg.png) repeat-x 0 -3px; font-family: inherit; } #mmoGamesOverviewLists #mmoGamesOverview_featured li { width: auto; } #mmoGamesOverviewLists #mmoGamesOverview_featured span { display: block; width: 560px; height: 180px; margin: 0; } #mmoGamesOverviewLists #mmoGamesOverview_featured span.gameName { display: none; } #mmoGamesOverview_featured img { display: block; } div#mmoGamesOverviewLists ul { margin: 0; padding: 5px 5px; list-style: none; width: 570px; float: left; text-align: left; } div#mmoGamesOverviewLists ul li { margin: 0; padding: 0; list-style: none; width: 190px; float: left; background: none; } div#mmoGamesOverviewLists ul li a { display: block; padding: 5px; font-weight: bold; line-height: 1; color: #602b0c !important; font-size: 11px !important; } div#mmoGamesOverviewLists ul li a:focus, div#mmoGamesOverviewLists ul li a:hover { background-color: #9ec8dd; } div#mmoGamesOverviewLists ul li a span.gameImgTarget { display: block; width: 180px; height: 90px; background: none; margin: 0 0 4px 0; } div#mmoGamesOverviewLists ul li a span img { display: block; } div#mmoGamesOverviewLists div#mmoGamesOverviewCountry { width: 20px; height: 14px; position: absolute; top: 6px; right: 12px; background-image: url(<?=$this->config->item('style_url')?>netbar/mmoflags.png); background-repeat: no-repeat; } #mmonetbar div.nojsGame { width: 432px !important; } #mmonetbar div.nojsGame div.mmoBoxMiddle { width: 422px; } #mmonetbar div.nojsGame label { width: 105px; } #pagefoldtarget .nbPF { position: absolute; top: 0; z-index: 999999; text-indent: -9999px; width: 125px; height: 120px; } #pagefoldtarget .nbPFLeft { left: 0px; } #pagefoldtarget .nbPFRight { right: 0px; background-position: right 0px; } #pagefoldtarget .nbPFDark.nbPFRight { background-image: url(<?=$this->config->item('style_url')?>netbar/bg_dark_sprite_rtl.png); _background-image: url(<?=$this->config->item('style_url')?>netbar/bg_dark_sprite_rtl.gif); } #pagefoldtarget .nbPFDark.nbPFLeft { background-image: url(<?=$this->config->item('style_url')?>netbar/bg_dark_sprite.png); _background-image: url(<?=$this->config->item('style_url')?>netbar/bg_dark_sprite.gif); } #pagefoldtarget .nbPFLight.nbPFRight { background-image: url(<?=$this->config->item('style_url')?>netbar/bg_light_sprite_rtl.png); _background-image: url(<?=$this->config->item('style_url')?>netbar/bg_light_sprite_rtl.gif); } #pagefoldtarget .nbPFLight.nbPFLeft { background: url(<?=$this->config->item('style_url')?>netbar/bg_light_sprite.png) no-repeat; _background-image: url(<?=$this->config->item('style_url')?>netbar/bg_light_sprite.gif); } #pagefoldtarget .nbPF a{ text-indent: -9999px; display: block; width: 110px; height: 95px; } #pagefoldtarget .nbPF.nbPFRight a{ float:right; } #pagefoldtarget .nbPF.nbPFHover a{ width:358px; height: 320px; } #pagefoldtarget .nbPF.nbPFHover { background-position: left -129px; width:400px; height: 400px; } #pagefoldtarget .nbPF.nbPFRight.nbPFHover { background-position: right -129px } ";
	var mmostyle = document.createElement('style');
	if (navigator.appName == "Microsoft Internet Explorer") {
		mmostyle.setAttribute("type", "text/css");
		mmostyle.styleSheet.cssText = mmoCSS;
	} else {
		var mmostyleTxt = document.createTextNode(mmoCSS);
		mmostyle.type = 'text/css';
		mmostyle.appendChild(mmostyleTxt);
	}
	document.getElementsByTagName('head')[0].appendChild(mmostyle);
</script>
<noscript>
	<style type="text/css">
		body {margin:0; padding:0;} #mmonetbar { background:transparent url(<?=$this->config->item('style_url')?>netbar/netbar.bg.png) repeat-x; font:normal 11px Tahoma, Arial, Helvetica, sans-serif; height:32px; left:0; padding:0; position:absolute; text-align:center; top:0; width:100%; z-index:3000; } #mmonetbar #mmoContent { height:32px; margin:0 auto; width:1024px; position: relative; } #mmonetbar #mmoLogo { background:transparent url(<?=$this->config->item('style_url')?>netbar/netbar.sprites.png) no-repeat top left; float:left; display:block; height:32px; width:108px; text-indent: -9999px; } #mmonetbar #mmoNews, #mmonetbar #mmoGame, #mmonetbar #mmoFocus, #pagefoldtarget { display:none !important; } 
	</style>
</noscript>
<div id="mmonetbar" class="mmoikariam">
	<script type="text/javascript">
		var mmoActive_select=null;function mmoInitSelect(){if(!document.getElementById)return false;document.getElementById('mmonetbar').style.display='block';document.getElementById('mmoGame').style.display='block';document.getElementById('mmoFocus').onkeyup=function(e){mmo_selid=mmoActive_select.id.replace('mmoOptionsDiv','');var e=e||window.event;if(e.keyCode)var thecode=e.keyCode;else if(e.which)var thecode=e.which;mmoSelectMe(mmo_selid,thecode);}}
		function mmoSelectMe(selid,thecode){var mmolist=document.getElementById('mmoList'+selid);var mmoitems=mmolist.getElementsByTagName('li');switch(thecode){case 13:mmoShowOptions(selid);window.location=mmoActive_select.url;break;case 38:mmoActive_select.activeit.className='';var minus=((mmoActive_select.activeid-1)<=0)?'0':(mmoActive_select.activeid-1);mmoActive_select=mmoSetActive(selid,minus);break;case 40:mmoActive_select.activeit.className='';var plus=((mmoActive_select.activeid+1)>=mmoitems.length)?(mmoitems.length-1):(mmoActive_select.activeid+1);mmoActive_select=mmoSetActive(selid,plus);break;default:thecode=String.fromCharCode(thecode);var found=false;for(var i=0;i<mmoitems.length;i++){var _a=mmoitems[i].getElementsByTagName('a');if(navigator.appName.indexOf("Explorer")>-1){}
		else{txtContent=_a[0].textContent;}
		if(!found&&(thecode.toLowerCase()==txtContent.charAt(0).toLowerCase())){mmoActive_select.activeit.className='';mmoActive_select=mmoSetActive(selid,i);found=true;}}
		break;}}
		function mmoSetActive(selid,itemid){mmoActive_select=null;var mmolist=document.getElementById('mmoList'+selid);var mmoitems=mmolist.getElementsByTagName('li');mmoActive_select=document.getElementById('mmoOptionsDiv'+selid);;mmoActive_select.selid=selid;if(itemid!=undefined){var _a=mmoitems[itemid].getElementsByTagName('a');var textVar=document.getElementById("mmoMySelectText"+selid);textVar.innerHTML=_a[0].innerHTML;if(selid==1)textVar.className=_a[0].className;mmoitems[itemid].className='mmoActive';}
		for(var i=0;i<mmoitems.length;i++){if(mmoitems[i].className=='mmoActive'){mmoActive_select.activeit=mmoitems[i];mmoActive_select.activeid=i;mmoActive_select.url=(mmoitems[i].getElementsByTagName('a'))?mmoitems[i].getElementsByTagName('a')[0].href:null;}}
		return mmoActive_select;}
		function mmoShowOptions(g){var _elem=document.getElementById("mmoOptionsDiv"+g);if((mmoActive_select)&&(mmoActive_select!=_elem)){mmoActive_select.className="mmoOptionsDivInvisible";document.getElementById('mmonetbar').focus();}
		if(_elem.className=="mmoOptionsDivInvisible"){document.getElementById('mmoFocus').focus();mmoActive_select=mmoSetActive(g);if(document.documentElement){document.documentElement.onclick=mmoHideOptions;}else{window.onclick=mmoHideOptions;}
		_elem.className="mmoOptionsDivVisible";}else if(_elem.className=="mmoOptionsDivVisible"){_elem.className="mmoOptionsDivInvisible";document.getElementById('mmonetbar').focus();}}
		function mmoHideOptions(e){if(mmoActive_select){if(!e)e=window.event;var _target=(e.target||e.srcElement);if((_target.id.indexOf('mmoOptionsDiv')!=-1))return false;if(mmoisElementBefore(_target,'mmoSelectArea')==0&&(mmoisElementBefore(_target,'mmoOptionsDiv')==0)){mmoActive_select.className="mmoOptionsDivInvisible";mmoActive_select=null;}}else{if(document.documentElement)document.documentElement.onclick=function(){};else window.onclick=null;}}
		function mmoisElementBefore(_el,_class){var _parent=_el;do _parent=_parent.parentNode;while(_parent&&(_parent.className!=null)&&(_parent.className.indexOf(_class)==-1))
		return(_parent.className&&(_parent.className.indexOf(_class)!=-1))?1:0;}
		var ua=navigator.userAgent.toLowerCase();var ie6browser=((ua.indexOf("msie 6")>-1)&&(ua.indexOf("opera")<0))?true:false;function highlight(el,mod){if(ie6browser){if(mod==1&&!el.className.match(/highlight/))el.className=el.className+' highlight';else if(mod==0)el.className=el.className.replace(/highlight/g,'');}}
		var mmoToggleDisplay={init:function(wrapper){var wrapper=document.getElementById(wrapper);if(!wrapper)return;var headline=wrapper.getElementsByTagName("h4")[0],link=headline.getElementsByTagName("a")[0];if(link.className.indexOf("gameCountZero")!=-1)return false;var panel=document.getElementById(link.hash.substr(1));mmoToggleDisplay.hidePanel(panel,link);link.onclick=function(e){mmoToggleDisplay.loadImages();mmoToggleDisplay.toggle(this,panel);return false;};mmoToggleDisplay.outerClick(wrapper,link,panel);var timeoutID=null,delay=8000;wrapper.onmouseout=function(e){if(!e){var e=window.event;}
		var reltg=(e.relatedTarget)?e.relatedTarget:e.toElement;if(reltg==wrapper||mmoToggleDisplay.isChildOf(reltg,wrapper)){return;}
		timeoutID=setTimeout(function(){mmoToggleDisplay.hidePanel(panel,link);},delay);};wrapper.onmouseover=function(e){if(timeoutID){clearTimeout(timeoutID);}};},isChildOf:function(child,parent){while(child&&child!=parent){child=child.parentNode;}
		if(child==parent){return true;}else{return false;}},hidePanel:function(panel,link){panel.style.display="none";link.className="toggleHidden";},toggle:function(link,panel){panel.style.display=panel.style.display=="none"?"block":"none";link.className=link.className=="toggleHidden"?"":"toggleHidden";},outerClick:function(wrapper,link,panel){document.body.onclick=function(e){if(!e){e=window.event};if(!(mmoToggleDisplay.isChildOf((e.target||e.srcElement),wrapper))&&panel.style.display!="none"){mmoToggleDisplay.toggle(link,panel);}}},loadImages:function(){var script=document.createElement("script");script.type="text/javascript";var jsonGameData_browser='{"bitefight":"bitefight\/default\/big.png","gladiatus":"gladiatus\/default\/big.png","battleknight":"battleknight\/default\/big.png","ogame":"ogame\/default\/big.png","legend":"legend\/default\/big.png","kingsage":"kingsage\/default\/big.png"}',jsonGameData_client='{"4story":"4story\/default\/big.png","nostale":"nostale\/default\/big.png","metin2":"metin2\/default\/big.png","airrivals":"airrivals\/default\/big.png"}',jsonGameData_featured='{"wizard101":"wizard101\/default\/netbar.teaser.png"}';script.text='';script.text+=' mmoToggleDisplay.callback('+jsonGameData_featured+', "featured");';script.text+=' mmoToggleDisplay.callback('+jsonGameData_client+', "client");';script.text+='mmoToggleDisplay.callback('+jsonGameData_browser+', "browser");';document.getElementsByTagName("head")[0].appendChild(script);mmoToggleDisplay.loadImages=function(){};},callback:function(data,gamesCat){for(var gameName in data){var gameSpan=document.getElementById("gameImgTarget_"+gameName);if(!gameSpan){return false;}
		var gameImg=document.createElement("img");gameImg.src="http://en.gameforge.com/game-img/"+data[gameName];gameImg.alt="";gameSpan.appendChild(gameImg);}}}
		var netbar={onload:function(func){var _super=window.onload;window.onload=function(){if(typeof _super=="function"){_super()}
		func();}},pageFold:{init:function(opts){if(location.href.indexOf("board")!=-1){return}
		this.opts=opts;this.className="nbPF";this.className+=(this.opts.darkBG?' nbPFDark':' nbPFLight');this.className+=(this.opts.alignRight?' nbPFRight':' nbPFLeft');this.paint();this.adjust();},paint:function(){var container=document.createElement("div");container.className=this.className;container.innerHTML='<a onmouseover="netbar.pageFold.over(this)" onmouseout="netbar.pageFold.out(this)" target="_blank" href="http://'+this.opts.langcode+'.gameforge.com?kid='+this.opts.kid+'">Gameforge.com</a>';document.getElementById(this.opts.target).appendChild(container);this.container=container},over:function(link){this.container.className=this.className+" nbPFHover";},out:function(link){this.container.className=this.className;},adjust:function(){var logo=document.getElementById("mmoLogo");logo.parentNode.removeChild(logo);var netbarContent=document.getElementById("mmoContent");switch(netbarContent.className){case"mmonewsout":var newWidth="692px";break;case"mmolangout":var newWidth="272px";break;case"mmosmallbar":var newWidth="477px";break;default:var newWidth="auto";break;}
		if(newWidth!="auto"){netbarContent.style.cssText="width: "+newWidth+" !important";}}}};
	</script>
	<div id="mmoContent" class="mmosmallbar">
		<!-- <a id="mmoLogo" target="_top" href="<?=$this->config->item('base_url')?>" title="iZariam &ndash; Feel free to play">zzjhons.com &ndash; Feel free to play</a> -->
		<div id="mmoGame" class="mmoGame">
			<div class="mmoBoxLeft"></div>
			<div class="mmoBoxMiddle">
				<!--<div id="mmoGames"></div>-->
				<div id="mmoLangs">
					<label><?=$this->lang->line('select_lang')?>:</label>
					<div id="mmoLangSelect" class="mmoSelectbox">
						<div id="mmoSarea1" onclick="mmoShowOptions(1)" class="mmoSelectArea">
							<div class="mmoSelectText" id="mmoMySelectContent1">
								<div id="mmoMySelectText1" class="mmoflag mmo_<?=strtoupper($this->lang->line('content'))?>"><?if($this->session->userdata('language')!=''){?><?=ucfirst($this->session->userdata('language'))?><?}else{?><?=ucfirst($this->config->item('language'))?><?}?></div>
							</div>
							<div class="mmoSelectButton"></div>
						</div>
						<div class="mmoOptionsDivInvisible" id="mmoOptionsDiv1">
							<ul class="mmoLangList mmoListHeight" id="mmoList1">
								<li<?langList('arabic', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_AE">Arabic</a></li>
								<li<?langList('bulgarian', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_BG">Bulgarian</a></li>
								<li<?langList('chinese', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_HK">Chinese</a></li>
								<li<?langList('chinese', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_TW">Chinese</a></li>
								<li<?langList('czech', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_CZ">Czech</a></li>
								<li<?langList('danish', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_DK">Danish</a></li>
								<li<?langList('dutch', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_NL">Dutch</a></li>
								<li<?langList('english', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_EN">English</a></li>
								<li<?langList('english', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_US">English</a></li>
								<li<?langList('finnish', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_FI">Finnish</a></li>
								<li<?langList('french', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_FR">French</a></li>
								<li<?langList('german', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_DE">German</a></li>
								<li<?langList('greek', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_GR">Greek</a></li>
								<li<?langList('hebrew', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_IL">Hebrew</a></li>
								<li<?langList('hungarian', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_HU">Hungarian</a></li>
								<li<?langList('italian', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_IT">Italian</a></li>
								<li<?langList('latvian', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_LV">Latvian</a></li>
								<li<?langList('lithuanian', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_LT">Lithuanian</a></li>
								<li<?langList('norwegian', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_NO">Norwegian</a></li>
								<li<?langList('persian', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_IR">Persian</a></li>
								<li<?langList('polish', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_PL">Polish</a></li>
								<li<?langList('portuguese', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_BR">Portuguese</a></li>
								<li<?langList('portuguese', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_PT">Portuguese</a></li>
								<li<?langList('romanian', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_RO">Romanian</a></li>
								<li<?langList('russian', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_RU">Russian</a></li>
								<li<?langList('serbian', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_RS">Serbian</a></li>
								<li<?langList('slovak', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_SK">Slovak</a></li>
								<li<?langList('slovene', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_SI">Slovene</a></li>
								<li<?langList('spanish', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_AR">Spanish</a></li>
								<li<?langList('spanish', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_CL">Spanish</a></li>
								<li<?langList('spanish', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_CO">Spanish</a></li>
								<li<?langList('spanish', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_MX">Spanish</a></li>
								<li<?langList('spanish', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_PE">Spanish</a></li>
								<li<?langList('spanish', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_ES">Spanish</a></li>
								<li<?langList('spanish', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_VE">Spanish</a></li>
								<li<?langList('swedish', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_SE">Swedish</a></li>
								<li<?langList('turkish', $userdata, $item, $item2)?> target="_top" class="mmoflag mmo_TR">Turkish</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="mmoBoxRight"></div>
			<div id="mmoGamesOverviewPanel">
			    <div id="mmoGamesOverviewToggle">
			        <h4>
			            <a href="#mmoGamesOverviewLists">News<span class="mmoNbPseudoSelect_icon"></span></a>
			            <span class="mmoNbBoxEdge mmoNbBoxEdge_left"></span>
			            <span class="mmoNbBoxEdge mmoNbBoxEdge_right"></span>
			        </h4>
			    </div>
			    <div id="mmoGamesOverviewLists">
			        <div id="mmoGamesOverviewCountry" class="mmo_<?=$this->lang->line('content')?>"></div>
			        <!-- Section: Featured Game -->
			        <h5>Featured New</h5>
			        <ul>
			            <li>We are developing new version (iZariam v0.1.0) and we will release soon.</li>
			        </ul>
			        <!-- Section: Client Games -->
			        <h5>Credits</h5>
			        <ul>
			            <li><a href="mailto:zzjhons@gmail.com?subject=iZariam-bar" title="zzjhons@gmail.com">ZZJHONS</a></li>
			            <li>Haku</li>
			            <li>Nexus (ex-developer)</li>
			            <li>Advocaite (ex-developer)</li>
			            <li>Dzoki (ex-developer)</li>
			        </ul>
			        <!-- Section: Browser Games -->
			        <h5>Links</h5>
			        <ul>
			            <li><a href="http://izariam.spazze.net">Beta Server</a></li>
			            <li><a href="http://forum.spazze.net">Develop Forum</a></li>
			            <li><a href="https://github.com/ZZJHONS/IZARIAM">GitHub Repo</a></li>
			            <li><a href="http://zzjhons.com">ZZJHONS</a></li>
			        </ul>
			    </div>
			</div>
        </div>
        <input id="mmoFocus" type="text" size="5" />
    </div>
</div>
<script type="text/javascript">
	mmoInitSelect();
	mmoToggleDisplay.init("mmoGamesOverviewPanel");
	/*
	netbar.onload(function(){
		netbar.pageFold.init({
				"target": "pagefoldtarget",
				"darkBG": true,
				"langcode": "<?=$this->lang->line('language')?>",
				"kid": "zzjhons-izariam",
				"alignRight": false
			});
	})
	*/
</script>