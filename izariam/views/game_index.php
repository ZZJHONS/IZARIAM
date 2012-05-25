<?php
/*
 * Project: iZariam
 * File: izariam/views/game_index.php
 * Edited: 07/03/2012
 * By: ZZJHONS
 * Info: zzjhons@gmail.com
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" lang="<?=$this->lang->line('language')?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="utf-8">
    <meta name="language" content="<?=$this->lang->line('language')?>">
    <meta name="author" content="ZZJHONS" />
    <meta name="publisher" content="ZZJHONS" />
    <meta name="copyright" content="ZZJHONS" />
    <meta name="page-type" content="Browsergame, Browser game" />
    <meta name="page-topic" content="Browser game, strategy game, online game" />
    <meta name="audience" content="all" />
    <meta name="Expires" content="never" />
    <meta name="Keywords" content="Ikariam, antique world, strategy game, play for free, online game, role play game, browser game, game, izariam, ZZJHONS"/>
    <meta name="Description" content="<?=$this->lang->line('head_description')?>">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7">
    <title><?=$this->lang->line('izariam')?> - <?
    if($this->Player_Model->now_town->build_start > 0)
	{
	    $level_text = 'pos'.$this->Player_Model->build_line[$this->Player_Model->town_id][0]['position'].'_level';
	    $type_text = 'pos'.$this->Player_Model->build_line[$this->Player_Model->town_id][0]['position'].'_type';
	    $level = $this->Player_Model->now_town->$level_text;
	    $type = $this->Player_Model->now_town->$type_text;
	    $cost = $this->Data_Model->building_cost($type, $level, $this->Player_Model->research, $this->Player_Model->levels[$this->Player_Model->town_id]);
	    $end_date = $this->Player_Model->now_town->build_start + $cost['time'];
	    $ostalos = $end_date - time();
    ?><?=format_time($ostalos)?> - <?}?><?=$this->lang->line('world')?> <?=ucfirst($this->session->userdata('universe'))?></title>
	<link rel="shortcut icon" href="<?=$this->config->item('base_url')?>favicon.ico" type="image/x-icon">
    <!-- <link href="<?=$this->config->item('style_url')?>skin/ik_common_<?=$this->config->item('style_version')?>.css" rel="stylesheet" type="text/css" media="screen"> -->
    <link href="<?=$this->config->item('style_url')?>skin/ik_common_<?=$this->config->item('new_version')?>.css" rel="stylesheet" type="text/css" media="screen">
    <?if($page != 'island'){?>
    <link href="<?=$this->config->item('style_url')?>skin/ik_<?=$page?>_<?=$this->config->item('style_version')?>.css" rel="stylesheet" type="text/css" media="screen">
    <?}?>
    <link href="<?=$this->config->item('style_url')?>skin/ik_<?=$page?>_<?=$this->config->item('new_version')?>.css" rel="stylesheet" type="text/css" media="screen">
	<?if($this->config->item('easter')){?>
    <link href="<?=$this->config->item('style_url')?>skin/specialsEaster.css" rel="stylesheet" type="text/css" media="screen">
	<?}?>
	<?if($this->config->item('winter')){?>
    <link href="<?=$this->config->item('style_url')?>skin/specialsWinter.css" rel="stylesheet" type="text/css" media="screen">
    <link href="<?=$this->config->item('style_url')?>skin/specialsWinter_premiumIsland.css" rel="stylesheet" type="text/css" media="screen">
	<?}?>
	<?if($this->config->item('christmas')){?>
    <link href="<?=$this->config->item('style_url')?>skin/specialsChristmas.css" rel="stylesheet" type="text/css" media="screen">
	<?}?>
	<?if($this->config->item('halloween')){?>
    <link href="<?=$this->config->item('style_url')?>skin/specialsHalloween.css" rel="stylesheet" type="text/css" media="screen">
	<?}?>
	<!--
    <link href="<?=$this->config->item('style_url')?>css/netbar.css" rel="stylesheet" type="text/css">
    -->
    <link href="<?=$this->config->item('style_url')?>css/new.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="<?=$this->config->item('script_url')?>js/complete-<?=$this->config->item('script_version')?>.js"></script>
    <?if(!$page == 'barracks' or !$page == 'academy' or !$page == 'resource'){?>
	<script type="text/javascript" src="<?=$this->config->item('script_url')?>js/complete-<?=$this->config->item('new_version')?>.js"></script>
    <?}?>
	<script type="text/javascript">
		/* <![CDATA[ */
		var Event = YAHOO.util.Event,
		Dom   = YAHOO.util.Dom,
		lang  = YAHOO.lang;
		// Event.throwErrors = true;
		// var MyTutorial = new Tutorial();
		var LocalizationStrings = {};
		LocalizationStrings['timeunits'] = {};
		LocalizationStrings['timeunits']['short'] = {};
		LocalizationStrings['timeunits']['short']['day'] = '<?=$this->lang->line('d_mini')?>';
		LocalizationStrings['timeunits']['short']['hour'] = '<?=$this->lang->line('h_mini')?>';
		LocalizationStrings['timeunits']['short']['minute'] = '<?=$this->lang->line('m_mini')?>';
		LocalizationStrings['timeunits']['short']['second'] = '<?=$this->lang->line('s_mini')?>';
		LocalizationStrings['language']                     = '<?=$this->lang->line('content')?>';
		LocalizationStrings['decimalPoint']               = '.';
		LocalizationStrings['thousandSeperator']     = ',';
		LocalizationStrings['resources'] = {};
		LocalizationStrings['resources']['wood'] = '<?=$this->lang->line('wood')?>';
		LocalizationStrings['resources']['wine'] = '<?=$this->lang->line('wine')?>';
		LocalizationStrings['resources']['marble'] = '<?=$this->lang->line('marble')?>';
		LocalizationStrings['resources']['crystal'] = '<?=$this->lang->line('crystal')?>';
		LocalizationStrings['resources']['sulfur'] = '<?=$this->lang->line('sulfur')?>';
		LocalizationStrings['resources'][0] = LocalizationStrings['resources']['wood'];
		LocalizationStrings['resources'][1] = LocalizationStrings['resources']['wine'];
		LocalizationStrings['resources'][2] = LocalizationStrings['resources']['marble'];
		LocalizationStrings['resources'][3] = LocalizationStrings['resources']['crystal'];
		LocalizationStrings['resources'][4] = LocalizationStrings['resources']['sulfur'];
		LocalizationStrings['warnings'] = {};
		LocalizationStrings['warnings']['premiumTrader_lackingStorage'] = "Für folgende Rohstoffe fehlt dir Speicherplatz: $res";
		LocalizationStrings['warnings']['premiumTrader_negativeResource'] = "Du hast zuwenig $res f?r diesen Handel";
		LocalizationStrings['warnings']['tolargeText'] = '<?=$this->lang->line('large_text')?>';
		IKARIAM = {
				phpSet : {
						serverTime : "<?=time()?>",
						currentView : "<?=$page?>"
						},
				currentCity : {
						resources : {
								wood: <?=$this->Player_Model->towns[$this->Player_Model->town_id]->wood?>,
								wine: <?=$this->Player_Model->towns[$this->Player_Model->town_id]->wine?>,
								marble: <?=$this->Player_Model->towns[$this->Player_Model->town_id]->marble?>,
								crystal: <?=$this->Player_Model->towns[$this->Player_Model->town_id]->crystal?>,
								sulfur: <?=$this->Player_Model->towns[$this->Player_Model->town_id]->sulfur?>						},
						maxCapacity : {
								wood: <?=$this->Player_Model->capacity[$this->Player_Model->town_id]?>,
								wine: <?=$this->Player_Model->capacity[$this->Player_Model->town_id]?>,
								marble: <?=$this->Player_Model->capacity[$this->Player_Model->town_id]?>,
								crystal: <?=$this->Player_Model->capacity[$this->Player_Model->town_id]?>,
								sulfur: <?=$this->Player_Model->capacity[$this->Player_Model->town_id]?>						}
				},
				view : {
						get : function() {
								return IKARIAM.phpSet.currentView;
								},
						is : function(viewName) {
								return (IKARIAM.phpSet.currentView == viewName)? true : false;
								}
						}
				};
				IKARIAM.time = {
						serverTimeDiff : IKARIAM.phpSet.serverTime*1000-(new Date()).getTime()
				};
		// Switches one item on and the other off.. but only if they share the same groupname.
		selectGroup = {
			groups:new Array(), //[groupname]=item
			getGroup:function(group) {
				if(typeof(this.groups[group]) == "undefined") {
					this.groups[group] = new Object();
					this.groups[group].activeItem = "undefined";
					this.groups[group].onActivate = function(obj) {};
					this.groups[group].onDeactivate = function(obj) {};
					}
				return this.groups[group];
			},
			activate:function(obj, group) {
				g = this.getGroup(group);
				if(typeof(g.activeItem) != "undefined") {
					g.onDeactivate(g.activeItem);
					}
				g.activeItem=obj;
				g.onActivate(obj);
			}
		};
		selectGroup.getGroup('cities').onActivate = function(obj) {
			YAHOO.util.Dom.addClass(obj.parentNode, "selected");
		}
		selectGroup.getGroup('cities').onDeactivate = function(obj) {
			YAHOO.util.Dom.removeClass(obj.parentNode, "selected");
		}
		/*
		 * - Will COPY all child nodes of the source-node that are marked with a CSS class to be child nodes of the target.
		 * - Will purge all children of the TARGET element that are marked the same special CSS class at each call, so previously copied will be deleted before copying new
		 * - Expects either an Id or an object.
		 */
		function showInContainer(source, target, exchangeClass) {
			// Objects or Id-strings, i don't care
			if(typeof source == "string") { source = Dom.get(source); }
			if(typeof target == "string") {target = Dom.get(target); }
			if(typeof exchangeClass != "string") { alert("Error: IKARIAM.showInContainer -> Forgot to add an exchangeClass?"); }
			// Removal?
			for(i=0; i<target.childNodes.length; i++) {
				if(typeof(target.childNodes[i].className) != "undefined" && target.childNodes[i].className==exchangeClass) {
					target.removeChild(target.childNodes[i]);
				}
			}
			// Clone new
			for(i=0; i<source.childNodes.length; i++) {
				if(typeof(source.childNodes[i].className) != "undefined" && source.childNodes[i].className==exchangeClass) {
					clone = source.childNodes[i].cloneNode(true);
					target.insertBefore(clone, target.firstChild.nextSibling);
				}
			}
		}
		selectedCity = -1;
		function selectCity(cityNum, cityId, viewAble) {
		    if(selectedCity == cityNum) {
		        if(viewAble) document.location.href="<?=$this->config->item('base_url')?>game/city/"+cityId;
		        else document.location.href="#";
		    } else {
		        selectedCity = cityNum;
		    }
			showInContainer("cityLocation"+cityNum,"information", "cityinfo");
			showInContainer("cityLocation"+cityNum,"actions", "cityactions");
			var container = document.getElementById("cities");
			var citySelectedClass = "selected";
		}
		function selectBarbarianVillage() {
		  showInContainer("barbarianVilliage","information", "cityinfo");
          showInContainer("barbarianVilliage","actions", "cityactions");
          selectedCity = 0;
          /*
		  if (MyTutorial.getCurrentQuest() == 120) {
			clearInterval(MyTutorial.interval);
			MyTutorial.setArrowPosition(0,30,'barbarianPlundering');
			MyTutorial.animateArrow();
		  }
		  */
		}
		// IE6 CSS Background-Flicker fix
		(function(){
			// Use Object Detection to detect IE6
			var  m = document.uniqueID /*IE*/
			&& document.compatMode  /*>=IE6*/
			&& !window.XMLHttpRequest /*<=IE6*/
			&& document.execCommand ;
			try{
				if(!!m){
					m("BackgroundImageCache", false, true) /* = IE6 only */
				}
			}catch(oh){};
		})();
		/* ]]> */
		function myConfirm(message, target) {
		    bestaetigt = window.confirm (message);
		    if (bestaetigt == true)
              window.location.href = target;
		}

		/* Not tested
		// Hilfe-Mouseover
        function attachHelp(targetDiv, help, xDistance, yDistance) {
            var questionMarkDiv = Dom.get(targetDiv);
            questionMarkDiv.onmouseover= function() { showHelp(targetDiv, help, xDistance, yDistance); };
            questionMarkDiv.onmouseout= function() { hideHelp(help);};
        }
        function showHelp(nameOfHelp, helpDisplay, xDistance, yDistance) {
            var questionMarkDiv = Dom.get(nameOfHelp);
            var infoDiv = Dom.get(helpDisplay);
            var x = Dom.getX(questionMarkDiv);
            var y = Dom.getY(questionMarkDiv);
            infoDiv.style.display='block';
            Dom.setX(infoDiv,x + xDistance);
            Dom.setY(infoDiv,y + yDistance);
        }
        function hideHelp(nameOfHelp) {
            Dom.get(nameOfHelp).style.display='none';
        }		
        function closePopupMessage(popupDivName) {
            var popupMessage = Dom.get(popupDivName);
            popupMessage.style.display = "none";
        }
        function openPopupMessage(popupDivName) {
            var popupMessage = Dom.get(popupDivName);
            popupMessage.style.display = "block";
        }
        // Der Plan hierbei ist, die Nachricht von der Höhe her zentral zu platzieren, unter Beachtung der Höhe des Divs, sowie die Nachricht von der Breite her zentral zum Hauptfenster zu Platzieren.
        function positionMessagePopupDisplay(popupId) {
            var region = Dom.getRegion(popupId);
            if (region == false) { return; } // Vorsicht, display:none fuehrt dazu, siehe API
            var height = region.bottom - region.top;
            var width = region.right - region.left;
            var viewPortHeight = Dom.getViewportHeight();
            var newY = (viewPortHeight-height) / 2;
            if(popupId == 'deleteConfirmPopup') {
                newY += (typeof window.pageYOffset == 'undefined') ? document.documentElement.scrollTop : window.pageYOffset;
            }
            // bei vergroessertem screen nicht zu weit hoch rutschen lassen (insbesondere nicht negativ)
            if (newY < 20) { newY = 20; }
                
            Dom.setY(popupId, newY);
            var mainViewRegion = Dom.getRegion('mainview');
            var mainViewWidth = mainViewRegion.right - mainViewRegion.left;
            Dom.setX(popupId,mainViewRegion.left + (mainViewWidth - width) / 2);

            // Header auf Groesse des Popup anpassen. Ginge zwar auch schon in PHP, aber da die Werte im CSS stehen, kommt man nur in JS ohne Magic Numbers aus...
                var childs = Dom.getChildren(popupId);
            var leftBorder  = 0;
            var rightBorder = 0;
            for (var i in childs) {
                if (Dom.hasClass(childs[i],'headerLeft')) {
                    leftBorder = parseInt(Dom.getStyle(childs[i],'width'),10);
                }
                if (Dom.hasClass(childs[i],'headerRight')) {
                    rightBorder = parseInt(Dom.getStyle(childs[i],'width'),10);
                }
            }
            if (width > 0) {
                for (var j in childs) {
                    if (Dom.hasClass(childs[j],'headerMiddle')) {
                        var result = (width - leftBorder - rightBorder);
                        Dom.setStyle(childs[j],'width', result + "px");
                    }
                }
            }
        }
        */
	</script>
</head>
<body id="<?=$page?>">
    <div id="container">
    	<div id="container2">
    		<? /*
			<?$banner_query = $this->db->query("SELECT * FROM `".$this->session->userdata('universe')."_banners_right` ORDER BY RAND() LIMIT 1")?>
			<?if($banner_query->num_rows > 0){?>
			<?$banner = $banner_query->row()?>
            <div id="banner_container">
                <div id="banner_skyscraper">
					<?if($banner->frame){?>
                    <iframe id="a<?=$banner->id?>" name="a<?=$banner->id?>" src="<?=$banner->frame?>" framespacing="0" frameborder="no" scrolling="no" width="120" height="600" allowtransparency="true"></iframe>
					<?}else{?>
                    <a href="<?=$banner->link?>" target="_blank"><img src="<?=$banner->image?>" border="0"></a>
					<?}?>
				</div>
            </div>
			<?}?>
			<?$banner_query2 = $this->db->query("SELECT * FROM `".$this->session->userdata('universe')."_banners` ORDER BY RAND() LIMIT 1")?>
			<?if($banner_query2->num_rows > 0){?>
			<?$banner2 = $banner_query2->row()?>
            <div id="banner2_container">
                <div id="banner2_skyscraper">
					<?if($banner2->frame){?>
                    <iframe id="a<?=$banner->id?>" name="a<?=$banner->id?>" src="<?=$banner->frame?>" framespacing="0" frameborder="no" scrolling="no" width="120" height="600" allowtransparency="true"></iframe>
					<?}else{?>
                    <a href="<?=$banner2->link?>" target="_blank"><img src="<?=$banner2->image?>" border="0"></a>
					<?}?>
				</div>
            </div>
			<?}?>
			*/ ?>
	        <div id="header">
	            <h1><?=$this->lang->line('izariam')?></h1>
	            <h2><?=$this->lang->line('ansient_world')?></h2>
	        </div>
            <div id="avatarNotes" class="popup_window"></div>
            <div id="chatWindow" class="popup_window"></div>
            <?=$this->View_Model->show_bread($page, $param1, $param2, $param3)?>
            <?=$this->View_Model->show_sidebox($page, $param1, $param2, $param3)?>
            <?=$this->View_Model->show_view($page, $param1, $param2, $param3)?>
			<div id="cityNav">
				<?
					$this->load->helper('form');
					$attributes = array('id' => 'changeCityForm');
					echo form_open('game/'.$page.'/', $attributes);
				?>
			        <fieldset style="display: none;">
						<?
							$data = array(
								'action' => 'header',
								'function' => 'changeCurrentCity',
								'oldView' => $page
							);
							echo form_hidden($data);
						?>
			        </fieldset>
			        <h3><?=$this->lang->line('town_navigation')?></h3>
			        <ul>
						<li>
			                <label for="citySelect"><?=$this->lang->line('current_town')?>:</label>
			                <select	id="citySelect"	class="citySelect smallFont" name="cityId" tabindex="1" onchange="this.form.submit()">
							<?foreach($this->Player_Model->towns as $town){?>
								<?$island = $this->Player_Model->islands[$town->island]?>
								<?$selected = ($this->Player_Model->town_id == $town->id) ? 'selected="selected"' : ''?>
								<?
									switch($this->Player_Model->user->options_select){
										case 0:
								?>
			                    <option class="" value="<?=$town->id?>" <?=$selected?> title="" ><p><?=$town->name?></p></option>
									<?break;?>
									<?case 1:?>
			                    <option class="coords" value="<?=$town->id?>" <?=$selected?> title="<?=$this->lang->line('trade_resource')?>: <?=$this->Data_Model->resource_name_by_type($island->trade_resource)?>" ><p>[<?=$island->x?>:<?=$island->y?>]&nbsp;<?=$town->name?></p></option>
									<?break;?>
									<?case 2:?>
			                    <option class="tradegood<?=$island->trade_resource?>" value="<?=$town->id?>" <?=$selected?> title="[<?=$island->x?>:<?=$island->y?>]" ><p><?=$town->name?></p></option>
									<?break;?>
								<?}?>
							<?}?>
			                </select>
			            </li>
			            <li class="previousCity">
			            	<a href="#changeCityPrevious" tabindex="2" title="Switch to the last town">
			            	<span class="textLabel">Previous Town</span></a>
			            </li>
						<li class="nextCity">
							<a href="#changeCityNext" tabindex="3" title="Switch to the following town">
								<span class="textLabel">Next Town</span>
							</a>
						</li>
			            <li class="viewWorldmap">
			                <a href="<?=$this->config->item('base_url')?>game/worldmap_iso/" tabindex="4" title="<?=$this->lang->line('button_world_title')?>">
			                    <span class="textLabel"><?=$this->lang->line('button_world_name')?></span>
			                </a>
			            </li>
			            <li class="viewIsland">
			                <a href="<?=$this->config->item('base_url')?>game/island/" tabindex="5" title="<?=$this->lang->line('button_island_title')?>">
			                    <span class="textLabel"><?=$this->lang->line('button_island_name')?></span>
			                </a>
			            </li>
			            <li class="viewCity">
			                <a href="<?=$this->config->item('base_url')?>game/city/" tabindex="6" title="<?=$this->lang->line('button_town_title')?>">
			                    <span class="textLabel"><?=$this->lang->line('button_town_name')?></span>
			                </a>
			            </li>
			        </ul>
			    </form>
			</div>
			<div id="facebook_button">
				<a href="https://www.facebook.com/pages/iZariam/103717776418472" alt="iZariam Facebook"
          title="iZariam Facebook"></a>
			</div>
			<div id="globalResources">
			    <h3><?=$this->lang->line('resources_of_empire')?></h3>
			    <ul>
					<li class="ambrosiaNoSpin" title="<?=number_format($this->Player_Model->user->ambrosy)?> <?=$this->lang->line('ambrosy')?>">
			            <a href="<?=$this->config->item('base_url')?>game/premium/">
			                <span class="textLabel"><?=$this->lang->line('ambrosy')?>:</span><span id="accountAmbrosia"><?=number_format($this->Player_Model->user->ambrosy)?></span>
			            </a>
			        </li>
			        <li class="transporters" title="<?=$this->lang->line('button_transporters_title')?>">
			            <a href="<?=$this->config->item('base_url')?>game/merchantNavy/">
			                <span class="textLabel"><?=$this->lang->line('button_transporters_name')?>:</span><span id="accountTransporter"><?=$this->Player_Model->user->transports?> (<?=$this->Player_Model->all_transports?>)</span>
			            </a>
			        </li>
					<li class="gold" title="<?=number_format($this->Player_Model->user->gold)?> <?=$this->lang->line('gold')?>">
			            <a href="<?=$this->config->item('base_url')?>game/finances/">
			                <span class="textLabel"><?=$this->lang->line('gold')?>:</span><span id="value_gold"><?=number_format($this->Player_Model->user->gold)?></span>
			            </a>
			        </li>
			    </ul>
			</div>
			<?$all_peoples = $this->Player_Model->peoples[$this->Player_Model->town_id]?>
			<div id="cityResources">
				<h3><?=$this->lang->line('resources_of_town')?></h3>
			    <ul class="resources">
			        <li class="population" title="<?=$this->lang->line('population')?>">
			            <span class="textLabel"><?=$this->lang->line('population')?>: </span><span id="value_inhabitants" style="display: block; width: 80px;"><?=floor($this->Player_Model->now_town->peoples)?> (<?=floor($all_peoples)?>)</span>
					</li>
					<li class="actions" title="<?=$this->lang->line('points_of_action')?>">
			            <span class="textLabel"><?=$this->lang->line('points_of_action')?>: </span>
			            <span id="value_maxActionPoints"><?=number_format($this->Player_Model->now_town->actions)?></span>
					</li>
					<li class="wood">
			            <span class="textLabel"><?=$this->lang->line('wood')?>: </span>
			            <span id="value_wood" class="<?if(($this->Player_Model->now_town->wood*1.25) > $this->Player_Model->capacity[$this->Player_Model->town_id]){?><?if($this->Player_Model->now_town->wood >= $this->Player_Model->capacity[$this->Player_Model->town_id]){?>storage_full<?}else{?>storage_danger<?}}?>"><?=number_format(floor($this->Player_Model->now_town->wood))?></span>
			            <div class="tooltip">
			                <span class="textLabel">Hourly production <?=$this->lang->line('wood')?>: </span>
			                <?=floor($this->Player_Model->resource_production[$this->Player_Model->town_id]*3600)?><br />
			                <span class="textLabel"><?=$this->lang->line('capacity')?> <?=$this->lang->line('wood')?>: </span><?=number_format($this->Player_Model->capacity[$this->Player_Model->town_id])?>
			                <?if($this->Player_Model->now_town->branch_trade_wood_type == 1 and $this->Player_Model->now_town->branch_trade_wood_count > 0){?>
			                <br /><span class="textLabel"><?=$this->lang->line('market')?>: </span>
			                <?=number_format($this->Player_Model->now_town->branch_trade_wood_count)?>
			                <?}?>
			            </div>
					</li>
					<?$disabled = ($this->Player_Model->research->res2_3 == 0) ? ' disabled' : ''?>
					<?$wealth = ($this->Player_Model->research->res2_3 == 0) ? '<br /><span class="researchNeededWarning">You need to research `wealth` to mine</span>' : ''?>
					<li class="wine<?if($this->Player_Model->now_town->wine==0){?><?=$disabled?><?}?>">
			            <span class="textLabel"><?=$this->lang->line('wine')?>: </span>
			            <span id="value_wine" class="<?if(($this->Player_Model->now_town->wine*1.25) > $this->Player_Model->capacity[$this->Player_Model->town_id]){?><?if($this->Player_Model->now_town->wine >= $this->Player_Model->capacity[$this->Player_Model->town_id]){?>storage_full<?}else{?>storage_danger<?}}?>"><?=number_format(floor($this->Player_Model->now_town->wine))?></span>
			            <div class="tooltip" style="line-height:13px;">
			            	<?if($page == 'island' or $page == 'worldmap_iso' or $page == 'tradegood' or $page == 'resource' or $page == 'plunder' or $page == 'colonize' or $page == 'transport' or $page == 'sendSpy'){?>
			                <?if($this->Island_Model->island->trade_resource==1){?>
			                <span class="textLabel">Hourly production <?=$this->lang->line('wine')?>: </span>
			                <?=floor($this->Player_Model->tradegood_production[$this->Player_Model->town_id]*3600)?><br />
			                <?}}?>
			                <span class="textLabel"><?=$this->lang->line('capacity')?> <?=$this->lang->line('wine')?>: </span><?=number_format($this->Player_Model->capacity[$this->Player_Model->town_id])?>
			                <?if($this->Player_Model->now_town->branch_trade_wine_type == 1 and $this->Player_Model->now_town->branch_trade_wine_count > 0){?>
			                <br /><span class="textLabel"><?=$this->lang->line('market')?>: </span><?=number_format($this->Player_Model->now_town->branch_trade_wine_count)?>
			                <?}?>
			                <?=$wealth?>
			            </div>
					</li>
					<li class="marble<?if($this->Player_Model->now_town->marble==0){?><?=$disabled?><?}?>">
			            <span class="textLabel"><?=$this->lang->line('marble')?>: </span>
			            <span id="value_marble" class="<?if(($this->Player_Model->now_town->marble*1.25) > $this->Player_Model->capacity[$this->Player_Model->town_id]){?><?if($this->Player_Model->now_town->marble >= $this->Player_Model->capacity[$this->Player_Model->town_id]){?>storage_full<?}else{?>storage_danger<?}}?>"><?=number_format(floor($this->Player_Model->now_town->marble))?></span>
			            <div class="tooltip" style="line-height:13px;">
			            	<?if($page == 'island' or $page == 'worldmap_iso' or $page == 'tradegood' or $page == 'resource' or $page == 'plunder' or $page == 'colonize' or $page == 'transport' or $page == 'sendSpy'){?>
			                <?if($this->Island_Model->island->trade_resource==2){?>
			                <span class="textLabel">Hourly production <?=$this->lang->line('marble')?>: </span>
			                <?=floor($this->Player_Model->tradegood_production[$this->Player_Model->town_id]*3600)?><br />
			                <?}}?>
			                <span class="textLabel"><?=$this->lang->line('capacity')?> <?=$this->lang->line('marble')?>: </span><?=number_format($this->Player_Model->capacity[$this->Player_Model->town_id])?>
			                <?if($this->Player_Model->now_town->branch_trade_marble_type == 1 and $this->Player_Model->now_town->branch_trade_marble_count > 0){?>
			                <br><span class="textLabel"><?=$this->lang->line('market')?>: </span><?=number_format($this->Player_Model->now_town->branch_trade_marble_count)?>
			                <?}?>
			                <?=$wealth?>
			            </div>
					</li>
			        <li class="glass<?if($this->Player_Model->now_town->crystal==0){?><?=$disabled?><?}?>">
			            <span class="textLabel"><?=$this->lang->line('crystal')?>: </span>
			            <span id="value_crystal" class="<?if(($this->Player_Model->now_town->crystal*1.25) > $this->Player_Model->capacity[$this->Player_Model->town_id]){?><?if($this->Player_Model->now_town->crystal >= $this->Player_Model->capacity[$this->Player_Model->town_id]){?>storage_full<?}else{?>storage_danger<?}}?>"><?=number_format(floor($this->Player_Model->now_town->crystal))?></span>
			            <div class="tooltip" style="line-height:13px;">
			            	<?if($page == 'island' or $page == 'worldmap_iso' or $page == 'tradegood' or $page == 'resource' or $page == 'plunder' or $page == 'colonize' or $page == 'transport' or $page == 'sendSpy'){?>
			                <?if($this->Island_Model->island->trade_resource==3){?>
			                <span class="textLabel">Hourly production <?=$this->lang->line('crystal')?>: </span>
			                <?=floor($this->Player_Model->tradegood_production[$this->Player_Model->town_id]*3600)?><br />
			                <?}}?>
			                <span class="textLabel"><?=$this->lang->line('capacity')?> <?=$this->lang->line('crystal')?>: </span><?=number_format($this->Player_Model->capacity[$this->Player_Model->town_id])?>
			                <?if($this->Player_Model->now_town->branch_trade_crystal_type == 1 and $this->Player_Model->now_town->branch_trade_crystal_count > 0){?>
			                <br><span class="textLabel"><?=$this->lang->line('market')?>: </span><?=number_format($this->Player_Model->now_town->branch_trade_crystal_count)?>
			                <?}?>
			                <?=$wealth?>
			            </div>
					</li>
			        <li class="sulfur<?if($this->Player_Model->now_town->sulfur==0){?><?=$disabled?><?}?>">
			            <span class="textLabel"><?=$this->lang->line('sulfur')?>: </span>
			            <span id="value_sulfur" class="<?if(($this->Player_Model->now_town->sulfur*1.25) > $this->Player_Model->capacity[$this->Player_Model->town_id]){?><?if($this->Player_Model->now_town->sulfur >= $this->Player_Model->capacity[$this->Player_Model->town_id]){?>storage_full<?}else{?>storage_danger<?}}?>"><?=number_format(floor($this->Player_Model->now_town->sulfur))?></span>
			            <div class="tooltip" style="line-height:13px;">
			            	<?if($page == 'island' or $page == 'worldmap_iso' or $page == 'tradegood' or $page == 'resource' or $page == 'plunder' or $page == 'colonize' or $page == 'transport' or $page == 'sendSpy'){?>
			                <?if($this->Island_Model->island->trade_resource==4){?>
			                <span class="textLabel">Hourly production <?=$this->lang->line('sulfur')?>: </span>
			                <?=floor($this->Player_Model->tradegood_production[$this->Player_Model->town_id]*3600)?><br />
			                <?}}?>
			                <span class="textLabel"><?=$this->lang->line('capacity')?> <?=$this->lang->line('sulfur')?>: </span><?=number_format($this->Player_Model->capacity[$this->Player_Model->town_id])?>
			                <?if($this->Player_Model->now_town->branch_trade_sulfur_type == 1 and $this->Player_Model->now_town->branch_trade_sulfur_count > 0){?>
			                <br><span class="textLabel"><?=$this->lang->line('market')?>: </span><?=number_format($this->Player_Model->now_town->branch_trade_sulfur_count)?>
			                <?}?>
				            <?=$wealth?>
			            </div>
					</li>
			    </ul>
			</div>
			<div id="advisors">
			    <h3><?=$this->lang->line('overviews')?></h3>
			    <ul>
			        <li id="advCities">
			            <a href="<?=$this->config->item('base_url')?>game/tradeAdvisor/" title="<?=$this->lang->line('trade_advisor_title')?>" class="<?if($this->Player_Model->user->premium_account > 0){?>premium<?}else{?>normal<?}?><?if($this->Player_Model->new_towns_messages > 0){?>active<?}?>">
			                <span class="textLabel"><?=$this->lang->line('trade_advisor_name')?></span>
			            </a>
						<?if($this->Player_Model->user->premium_account > 0){?>
			            <a class="pluslink" href="<?=$this->config->item('base_url')?>game/premiumTradeAdvisor/" title="<?=$this->lang->line('to_view')?>">
						<?}else{?>
			            <a class="plusteaser" href="<?=$this->config->item('base_url')?>game/premiumDetails/" title="<?=$this->lang->line('to_view')?>">
						<?}?>
			                <span class="textLabel"><?=$this->lang->line('to_view')?></span>
			            </a>
			        </li>
					<li id="advMilitary">
			            <a href="<?=$this->config->item('base_url')?>game/militaryAdvisorMilitaryMovements/" title="<?=$this->lang->line('military_advisor_title')?>" class="<?if($this->Player_Model->user->premium_account > 0){?>premium<?}else{?>normal<?}?>">
			                <span class="textLabel"><?=$this->lang->line('military_advisor_name')?></span>
			            </a>
						<?if($this->Player_Model->user->premium_account > 0){?>
			            <a class="pluslink" href="<?=$this->config->item('base_url')?>game/premiumMilitaryAdvisor/" title="<?=$this->lang->line('to_view')?>">
						<?}else{?>
			            <a class="plusteaser" href="<?=$this->config->item('base_url')?>game/premiumDetails/" title="<?=$this->lang->line('to_view')?>">
						<?}?>
			                <span class="textLabel"><?=$this->lang->line('to_view')?></span>
			            </a>
			        </li>
					<li id="advResearch">
			            <a href="<?=$this->config->item('base_url')?>game/researchAdvisor/" title="<?=$this->lang->line('research_advisor_title')?>" class="<?if($this->Player_Model->user->premium_account > 0){?>premium<?}else{?>normal<?}?><?if($this->Player_Model->research_advisor){?>active<?}?>">
			                <span class="textLabel"><?=$this->lang->line('research_advisor_name')?></span>
			            </a>
						<?if($this->Player_Model->user->premium_account > 0){?>
			            <a class="pluslink" href="<?=$this->config->item('base_url')?>game/premiumResearchAdvisor/" title="<?=$this->lang->line('to_view')?>">
						<?}else{?>
			            <a class="plusteaser" href="<?=$this->config->item('base_url')?>game/premiumDetails/" title="<?=$this->lang->line('to_view')?>">
						<?}?>
			                <span class="textLabel"><?=$this->lang->line('to_view')?></span>
			            </a>
					</li>
					<li id="advDiplomacy">
			            <a href="<?=$this->config->item('base_url')?>game/diplomacyAdvisor/" title="<?=$this->lang->line('diplomacy_advisor_title')?>" class="<?if($this->Player_Model->user->premium_account > 0){?>premium<?}else{?>normal<?}?><?if($this->Player_Model->new_user_messages > 0){?>active<?}?>">
			                <span class="textLabel"><?=$this->lang->line('diplomacy_advisor_name')?></span>
			            </a>
						<?if($this->Player_Model->user->premium_account > 0){?>
			            <a class="pluslink" href="<?=$this->config->item('base_url')?>game/premiumDiplomacyAdvisor/" title="<?=$this->lang->line('to_view')?>">
						<?}else{?>
			            <a class="plusteaser" href="<?=$this->config->item('base_url')?>game/premiumDetails/" title="<?=$this->lang->line('to_view')?>">
						<?}?>
			                <span class="textLabel"><?=$this->lang->line('to_view')?></span>
			            </a>
					</li>
			    </ul>
			</div>
			<?if($this->config->item('winter')){?>
			<div id="popupMessage_winter" class="popupMessage winterPopup" style="">
				<div class="header headerLeft"></div>
				<div class="header headerMiddle">
					<h3>Winter`s coming!</h3>
				</div>
				<div class="header headerRight"></div>
				<div class="popupContent">
					<p>
						<img src="skin/specials/winter/penguins.jpg" />
						Dear iZariam Players,<br />
						Winter has finally arrived in iZariam. From the 1st of December to the 10th of January your islands and towns will be covered in white snow.<br />
						Even your advisers are shivering in the cold and have taken their warm winter clothing out of the wardrobe to nip Jack Frost in the bud.<br />
						However, if you get fed up of the magnificent white wonderland you can switch the town overview on and off with the click of a button.<br />
						Good luck in the wintry world of iZariam.</p>
					<div class="buttons">
						<div class="buttonLeftBuy">
							<a href="javascript:closePopupMessage('popupMessage_winter')" class="button notice buy">OK</a>
						</div>
						<div class="buttonRight">               		
							<a href="javascript:closePopupMessage('popupMessage_winter')" class="button notice">OK</a>
						</div>
					</div>
				</div>
			</div>
			<script type="text/javascript">
				positionPopupMessage_popupMessage_winter = function() { 
					positionMessagePopupDisplay("popupMessage_winter"); 
				};
				YAHOO.util.Event.onDOMReady(positionPopupMessage_popupMessage_winter);
			</script>
			<?}?>
			<?if($this->config->item('happyhour')){?>
			<div id="popupMessage_happyHourPopup" class="popupMessage specialPromotionMessage" style="display: block; ">
			    <div class="header headerLeft"></div>
			    <div class="header headerMiddle">
			         <h3>Use this unique opportunity!</h3>
			    </div>
			    <div class="header headerRight"></div>
			    <div class="popupContent">
			      	<p class="clearboth"><img src="<?=$this->config->item('style_url')?>skin/promotions/ambrosia20.jpg">The sundial at the marketplace shows what time it is: you have to hurry! Today's your lucky day. Get your bonus of 20 percent when you buy Ambrosia - in Ikariam's Happy Hour now!</p>
		            <div class="buttons">
		          	    <div class="buttonLeft"><a href="javascript:closePopupMessage('popupMessage_happyHourPopup')" class="button notice action_button">Close</a></div>
		               <div class="buttonRight">
		               		<a href="<?=$this->config->item('base_url')?>game/premiumPayment" class="button notice">Acquire Ambrosia</a>
		               </div>
		            </div>
		        </div>
			</div>
			<script type="text/javascript">
				positionPopupMessage_popupMessage_happyHourPopup = function() { 
					positionMessagePopupDisplay("popupMessage_happyHourPopup"); 
				};
				YAHOO.util.Event.onDOMReady(positionPopupMessage_popupMessage_happyHourPopup);
			</script>
			<?}?>
			<?if ($this->Player_Model->capital_id == $this->Player_Model->town_id and $page != 'highscore'){?>
			    <?=$this->View_Model->show_tutorial($page, $param1)?>
			<?}?>
			<div id="friends">
			    <h3><?=$this->lang->line('friends')?></h3>
			    <ul class="friends">
			    	<?for ($fnum = 1; $fnum <= 12; $fnum++){?>
					<li class="slot">
						<div class="slotnum"><?=$fnum?></div>
						<a title="Invite friends" href="<?=$this->config->item('base_url')?>game/friendListEdit/" class="image"></a>
					</li>
					<?}?>
			    </ul>
			    <div id="toggleShowFriends" class="showfriends"><!-- JS powered button--></div>
			    <a title="<?=$this->lang->line('former_friends')?>" href="#up" class="pageup"><span class="textLabel">Former friends</span></a>
			    <a title="<?=$this->lang->line('more_friends')?>" href="#down" class="pagedown"><span class="textLabel">More friends</span></a>
			</div>
			<script>
				Event.onDOMReady( function() {
					var myfriendslist = new friendsList('friends');
					var mainview=Dom.get('mainview');
					var height = Dom.getRegion(mainview);
					height = height.bottom - height.top;
					if(height<400) Dom.setStyle(mainview, 'min-height', '440px');
				});
			</script>
			<div id="footer">
				<span class="copyright">© <a id="gflink" target="_blank" href="http://izariam.zzjhons.com" class="">iZariam</a> 2012 by <a id="gflink" target="_blank" href="http://zzjhons.com" class="">ZZJHONS</a><a href="<?=$this->config->item('base_url')?>game/credits/" style="margin:0px;" class="">.</a> All rights reserved.</span>
				<a target="_blank" href="http://ikariam.zzjhons.com" title="Development Forum" class="">Development Forum</a>
				<a target="_blank" href="https://github.com/ZZJHONS/IZARIAM" title="GitHub repo" class="">GitHub repo</a>
			</div>
			<div id="conExtraDiv1"><span></span></div>
			<div id="conExtraDiv2"><span></span></div>
			<div id="conExtraDiv3"><span></span></div>
			<div id="conExtraDiv4"><span></span></div>
			<div id="conExtraDiv5"><span></span></div>
			<div id="conExtraDiv6"><span></span></div>
        </div>
    </div>
    <div id="GF_toolbar">
        <h3><?=$this->lang->line('other_options')?></h3>
        <ul>
            <li class="help">
                <a href="<?=$this->config->item('base_url')?>game/pedia/" title="<?=$this->lang->line('help')?>">
                    <span class="textLabel"><?=$this->lang->line('help')?></span>
                </a>
            </li>
            <li class="premium">
                <a href="<?=$this->config->item('base_url')?>game/premium/" title="<?=$this->lang->line('izariam_plus')?>">
                    <span class="textLabel"><?=$this->lang->line('izariam_plus')?> (<?=number_format($this->Player_Model->user->ambrosy)?>)</span>
                </a>
            </li>
            <li class="highscore">
                <a href="<?=$this->config->item('base_url')?>game/highscore/" title="<?=$this->lang->line('top_list')?>">
                    <span class="textLabel"><?=$this->lang->line('top_list')?></span>
                </a>
            </li>
            <li class="options">
                <a href="<?=$this->config->item('base_url')?>game/options/" title="<?=$this->lang->line('options')?>">
                    <span class="textLabel"><?=$this->lang->line('options')?></span>
                </a>
            </li>
            <li class="notes">
                <a href="javascript:switchNoteDisplay()" title="<?=$this->lang->line('notes')?>">
                    <span class="textLabel"><?=$this->lang->line('notes')?></span>
                </a>
            </li>
            <li class="forum">
                <a href="http://ikariam.zzjhons.com" title="<?=$this->lang->line('board')?>" target="_blank">
                    <span class="textLabel"><?=$this->lang->line('board')?></span>
                </a>
            </li>
            <li class="logout">
                <a href="<?=$this->config->item('base_url')?>game/logout/" title="<?=$this->lang->line('logout_title')?>">
                    <span class="textLabel"><?=$this->lang->line('logout_name')?></span>
                </a>
            </li>
            <li class="version">
                <a href="<?=$this->config->item('base_url')?>game/version/" title="<?=$this->lang->line('version')?>">
                    <span class="textLabel">v.<?=$this->config->item('game_version')?></span>
                </a>
            </li>
            <li class="serverTime">
                <a>
                    <span class="textLabel" id="servertime"><?=date('d.m.Y H:i:s',time())?></span>
                </a>
            </li>
        </ul>
    </div>
	<div id="extraDiv1"><span></span></div>
    <div id="extraDiv2"><span></span></div>
    <div id="extraDiv3"><span></span></div>
    <div id="extraDiv4"><span></span></div>
    <div id="extraDiv5"><span></span></div>
	<div id="extraDiv6"><span></span></div>
	<script type="text/javascript">
		/*
		kickListmember = function(friendId) {
		    ajaxRequest("<?=$this->config->item('base_url')?>actions/kickFriend/"+friendId, function(response){
	        alert(response);
		    });
		};
		*/
		// Adds a "down" css-class to a supplied element.
		function makeButton(ele) {
		    var Event = YAHOO.util.Event;
		    var Dom = YAHOO.util.Dom;
		    Event.addListener(ele, "mousedown", function() {
		        YAHOO.util.Dom.addClass(ele, "down");
		    });
		    Event.addListener(ele, "mouseup", function() {
		        YAHOO.util.Dom.removeClass(ele, "down");
		    });
		    Event.addListener(ele, "mouseout", function() {
		        YAHOO.util.Dom.removeClass(ele, "down");
		    });
		}

		//removed "childTooltip"-code. Don't duplicate code, just nest normal tooltips!
		// Old function:
		function ToolTips() {
		    var tooltips = Dom.getElementsByClassName ( "tooltip" , "div" , document , function() {
		        Dom.setStyle(this, "display", "none");
		    })
		    for(i=0;i<tooltips.length;i++) {
		        Event.addListener ( tooltips[i].parentNode , "mouseover" , function() {
		            Dom.getElementsByClassName ( "tooltip" , "div" , this , function() {
		                Dom.setStyle(this, "display", "block");
		            });
		        });
		        Event.addListener ( tooltips[i].parentNode , "mouseout" , function() {
		            Dom.getElementsByClassName ( "tooltip" , "div" , this , function() {
		                Dom.setStyle(this, "display", "none");
		            });
		        });
		    }
		}
		// New function
		/*
		function ToolTips() {
		    var tooltips = Dom.getElementsByClassName("tooltip", "div" ,document);
		    for(var i=0, l=tooltips.length;i<l;i++) {
		        Dom.setStyle(tooltips[i], "display", "none");
						
		        Event.addListener ( tooltips[i].parentNode , "mouseover" , function() {
					Dom.setStyle(this, "display", "block");
		        }, tooltips[i], true);
		        Event.addListener ( tooltips[i].parentNode , "mouseout" , function() {
					Dom.setStyle(this, "display", "none");
		        }, tooltips[i], true);
		    }
		}
		*/

		Event.onDOMReady( function() {
		    var links = document.getElementsByTagName("a");
		    for(i=0; i<links.length; i++) {
		        makeButton(links[i]);
		    }
		    ToolTips();
		    replaceSelect(Dom.get("citySelect"));
		});

		/* One for the wood... */
		var woodCounter = getResourceCounter({
			startdate: <?=time()?>,
			interval: 2000,
			available: <?=$this->Player_Model->now_town->wood?>,
			limit: [0, <?=$this->Player_Model->capacity[$this->Player_Model->town_id]?>],
			production: <?=$this->Player_Model->resource_production_bonus[$this->Player_Model->town_id]?>,
			valueElem: "value_wood"
			});
		if(woodCounter) {
			woodCounter.subscribe("update", function() {
				IKARIAM.currentCity.resources.wood = woodCounter.currentRes;
				});
			}

		/* ...one for the tradegood... */
		<?$res_type = $this->Data_Model->resource_class_by_type($this->Player_Model->now_island->trade_resource)?>
		var tradegoodCounter = getResourceCounter({
			startdate: <?=time()?>,
			interval: 2000,
		 	available: <?=$this->Player_Model->now_town->$res_type?>,
			limit: [0, <?=$this->Player_Model->capacity[$this->Player_Model->town_id]?>],
			production: <?=$this->Player_Model->tradegood_production_bonus[$this->Player_Model->town_id]?>,
				valueElem: "value_<?=$res_type?>"
			});
		if(tradegoodCounter) {
			tradegoodCounter.subscribe("update", function() {
				IKARIAM.currentCity.resources.<?=$res_type?> = tradegoodCounter.currentRes;
				});
			}

		var localTime = new Date();
		var startServerTime = localTime.getTime() - (3600000) - localTime.getTimezoneOffset()*60*1000; // GMT+1+Sommerzeit - offset
		var obj_ServerTime = 0;
		Event.onDOMReady(function() {
		    var ev_updateServerTime = setInterval("updateServerTime()", 500);
		    obj_ServerTime = document.getElementById('servertime');
		});
		function updateServerTime() {
		    var currTime = new Date();
		    // New: currTime.setTime((<?=time()?>000-startServerTime)+ currTime.getTime()) ;
		    currTime.setTime(currTime.getTime()) ;
		    str = getFormattedDate(currTime.getTime(), 'd.m.Y G:i:s');
		    obj_ServerTime.innerHTML = str;
		}
		function jsTitleTag(nextETA) {
		    this.nextETA = nextETA;
		    var thisObj = this;
		    var cnt = new Timer(nextETA, <?=time()?>, 1);
		    //cnt.currentdate *= 1000; // obsolete?
			<? echo '//'; ?>top.document.title = "<?=$this->lang->line('izariam')?> - <?=$this->lang->line('world')?> <?=ucfirst($this->session->userdata('universe'))?>";
		    cnt.subscribe("update", function() {
		        var timeargs = this.enddate - Math.floor(this.currenttime/1000) *1000;
		        var title = "<?=$this->lang->line('izariam')?> - ";
		        if (timeargs != "")
		            title += getTimestring(timeargs, 3, undefined, undefined, undefined, true) + " - ";
		        title += "<?=$this->lang->line('world')?> <?=ucfirst($this->session->userdata('universe'))?>";
		        top.document.title = title;
		    })
		    cnt.subscribe("finished", function() {
		        top.document.title = "<?=$this->lang->line('izariam')?>" + " - <?=$this->lang->line('world')?> <?=ucfirst($this->session->userdata('universe'))?>";
		    });
		    cnt.startTimer();
		    return cnt;
		}

		<?if($this->Player_Model->now_town->build_start > 0){?>
		titleTag = new jsTitleTag(<?=$end_date?>)
		<?}?>
		
		// Notizzetel
		var avatarNotes = null;
		// var allyChat = null;

		function switchNoteDisplay() {
		    document.cookie = 'notes=0; expires=Thu, 01-Jan-70 00:00:01 GMT;';
		    var noteLayer = Dom.get("avatarNotes");
		    if (noteLayer.style.display == "block") {
		        avatarNotes.save();
		        noteLayer.style.display = "none";
		    } else {
		        if (noteLayer.innerHTML == "") { // nur AjaxRequest starten, wenn Notizen noch nicht geladen sind
		            ajaxRequest('<?=$this->config->item('base_url')?>game/avatarNotes/', updateNoteLayer);

		            ///setCookie('message', Dom.get("message").text);
		            document.cookie = 'notes=1;';
		        }
		        noteLayer.style.display = "block";
		   }
		    if (avatarNotes instanceof Notes) {
		        setCookie( 'ikariam_notes_x', Dom.get("resizablepanel_c").style.left, '9999', '/', '', '' );
		        setCookie( 'ikariam_notes_y', Dom.get("resizablepanel_c").style.top, '9999', '/', '', '' );
		        setCookie( 'ikariam_notes_width', Dom.get("resizablepanel").style.width, '9999', '/', '', '' );
		        setCookie( 'ikariam_notes_height', Dom.get("resizablepanel").style.height, '9999', '/', '', '' );
		        avatarNotes.save();
		    }
		}
		if (getCookie('notes') == 1) {
		    switchNoteDisplay();
		}

		function updateNoteLayer(responseText) {
		    var noteLayer = Dom.get("avatarNotes");
		    noteLayer.innerHTML = responseText;
		            var panel = new YAHOO.widget.Panel("resizablepanel", {
		                draggable: true,
		                width: getCookie("ikariam_notes_width", "470px"),
		                height: getCookie("ikariam_notes_height", "320px"),
		                autofillheight: "body", // default value, specified here to highlight its use in the example
		                constraintoviewport:true,
		                context: ["tl", "bl"]
		            });
		            panel.render();
		            var resize = new YAHOO.util.Resize("resizablepanel", {
		                handles: ["br"],
		                autoRatio: false,
		                minWidth: 220,
		                minHeight: 110,
		                status: false
		            });
		            resize.on("startResize", function(args) {
		                if (this.cfg.getProperty("constraintoviewport")) {
		                    var D = YAHOO.util.Dom;
		                    var clientRegion = D.getClientRegion();
		                    var elRegion = D.getRegion(this.element);
		                    resize.set("maxWidth", clientRegion.right - elRegion.left - YAHOO.widget.Overlay.VIEWPORT_OFFSET);
		                    resize.set("maxHeight", clientRegion.bottom - elRegion.top - YAHOO.widget.Overlay.VIEWPORT_OFFSET);
		                } else {
		                    resize.set("maxWidth", null);
		                    resize.set("maxHeight", null);
		                }
		            }, panel, true);
		            resize.on("resize", function(args) {
		                var panelHeight = args.height;
		                this.cfg.setProperty("height", panelHeight + "px");
		                Dom.get("message").style.height = (panelHeight-75) + "px";
		            }, panel, true);
		            avatarNotes = new Notes();
		            avatarNotes.setMaxChars(<?if($this->Player_Model->user->premium_account > 0){?><?=$this->config->item('notes_premium')?><?}else{?><?=$this->config->item('notes_default')?><?}?>);
		            avatarNotes.init(Dom.get("message"), Dom.get("chars"));
		            Dom.get("resizablepanel_c").style.top = getCookie("ikariam_notes_y", "80px");
		            Dom.get("resizablepanel_c").style.left = getCookie("ikariam_notes_x", "375px");
		            Dom.get("message").style.height = (parseInt(getCookie("ikariam_notes_height", "320px")) - 75 ) + "px";
		}
		/* New code
		/* type: "avatarNotes" (notizzettel) or "chatWindow" 
		function switchNoteDisplay(type) {
			
		    var cookieText = "notes";
			var callBackFunc = updateNoteLayer;
			
			if (type == "chatWindow") {
				cookieText = "chat";
				callBackFunc = updateChatLayer;
			}

		    var mycookie = new Cookie("ik_global", 7);
		    var noteLayer = Dom.get(type);
			if (typeof(noteLayer) == 'undefined' || noteLayer == null) return;
			
		    if (noteLayer.style.display == "block") {
		        if (type == "avatarNotes")  avatarNotes.save();
		        if (type == "chatWindow") allyChat.close();
		        noteLayer.style.display = "none";
		        mycookie.set(cookieText, '0');
		    } else {
		        if (noteLayer.innerHTML == "") { // nur AjaxRequest starten, wenn Notizen noch nicht geladen sind
		            ajaxRequest('?view='+type, callBackFunc);
		        } else if (type == "chatWindow") {
		            allyChat.poll();
		        }
		        noteLayer.style.display = "block";
		        if (allyChat && type == "chatWindow") allyChat.scrolldown();
		        mycookie.set(cookieText, '1');
		   }   
		}
		 
		Event.onDOMReady( function() {
		    var mycookie = new Cookie("ik_global", 7);
		    if (mycookie.get('notes') == '1') {
		        switchNoteDisplay('avatarNotes');
		    }
		});

		function toggleChatInfo() {
		    var chatWindow = Dom.get("chatWindow");
		    var chatInfo = Dom.getElementsByClassName("chat_info", "div" ,chatWindow)[0];
		    if (chatInfo.style.display == 'none') {
		        chatInfo.style.display = 'block';
		    } else {
		        chatInfo.style.display = 'none';
		    }
		    allyChat.scrolldown();
		}

		function updateChatLayer(responseText) {
			 Dom.get("chatWindow").innerHTML = responseText;
		     makePopupResizable("chat");
			 updateChatView();
		     var mycookie = new Cookie("ik_global", 7);
		     if (mycookie.get("chatInfo") == '1') toggleChatInfo();
		     allyChat.scrolldown();
		}

		function updateNoteLayer(responseText) {
		    Dom.get("avatarNotes").innerHTML = responseText;
			makePopupResizable("notes");
			updateNotesView();		
		}

		function updateNotesView() {
			   avatarNotes = new Notes();
			   avatarNotes.setMaxChars(200);
			   avatarNotes.init(Dom.get("notesMessages"), Dom.get("chars_notes"));
		}
		function updateChatView() {
			}

		function makePopupResizable(type) {
			
			var heightOffset = 75;
			if (type === "chat") heightOffset = 100;
		    var mycookie = new Cookie("ik_global", 7);
		    var cookie_w = mycookie.get(type+"_width");
		    var cookie_h = mycookie.get(type+"_height");
		    var cookie_x = mycookie.get(type+"_x");
		    var cookie_y = mycookie.get(type+"_y");
			
			// Create a panel Instance, from the 'resizablepanel' DIV standard module markup
			var panel = new YAHOO.widget.Panel("resizablepanel_"+type, {
				draggable: true,
				width: (cookie_w ? cookie_w : "470px"),
				height: (cookie_h ? cookie_h : "320px"),
				autofillheight: "body", // default value, specified here to highlight its use in the example
				constraintoviewport:true,
				context: ["tl", "bl"]
			});
			panel.render();

			// Create Resize instance, binding it to the 'resizablepanel' DIV 
			var resize = new YAHOO.util.Resize("resizablepanel_"+type, {
				handles: ["br"],
				autoRatio: false,
				minWidth: type === 'chat' ? 400 : 220,
				minHeight: type === 'chat' ? 300 : 110,
				status: false 
			});

			// Setup startResize handler, to constrain the resize width/height
			// if the constraintoviewport configuration property is enabled.
			resize.on("startResize", function(args) {

				if (this.cfg.getProperty("constraintoviewport")) {
					var clientRegion = Dom.getClientRegion();
					var elRegion = Dom.getRegion(this.element);

					resize.set("maxWidth", clientRegion.right - elRegion.left - YAHOO.widget.Overlay.VIEWPORT_OFFSET);
					resize.set("maxHeight", clientRegion.bottom - elRegion.top - YAHOO.widget.Overlay.VIEWPORT_OFFSET);
				} else {
					resize.set("maxWidth", null);
					resize.set("maxHeight", null);
				}

			}, panel, true);

			// Setup resize handler to update the Panel's 'height' configuration property 
			// whenever the size of the 'resizablepanel' DIV changes.

			// Setting the height configuration property will result in the 
			// body of the Panel being resized to fill the new height (based on the
			// autofillheight property introduced in 2.6.0) and the iframe shim and 
			// shadow being resized also if required (for IE6 and IE7 quirks mode).
			resize.on("resize", function(args) {
				var panelHeight = args.height;
				this.cfg.setProperty("height", panelHeight + "px");
				Dom.get(type+"Messages").style.height = (panelHeight - heightOffset) + "px";
				if (type == "chat") {
						
					 Dom.get("chatpartners").style.height = (panelHeight - heightOffset) + "px";
				 	 Dom.get("js_ResizeMessages").style.width = (Dom.get("resizablepanel_chat").offsetWidth - Dom.get("chatpartners").offsetWidth - 40) + "px";
				
				}
			}, panel, true);
			
			Dom.get("resizablepanel_"+type+"_c").style.top = (cookie_y ? cookie_y : "80px");
			Dom.get("resizablepanel_"+type+"_c").style.left = (cookie_x ? cookie_x : "375px");
			var newHeight = (parseInt((cookie_h ? cookie_h : "320px")) - heightOffset ) + "px";
			Dom.get(type+"Messages").style.height = newHeight;
			if (type == "chat") {
				 var chatcontainer = Dom.get("resizablepanel_chat");
				 Dom.get("chatpartners").style.height = newHeight;
				 Dom.get("js_ResizeMessages").style.width = (Dom.get("resizablepanel_chat").offsetWidth - Dom.get("chatpartners").offsetWidth - 40) + "px";
			}
		}
		window.onunload = function() {
			var mycookie = new Cookie("ik_global", 7);
			if (avatarNotes instanceof Notes) {
				mycookie.set( 'notes_x', Dom.get("resizablepanel_notes_c").style.left);
				mycookie.set( 'notes_y', Dom.get("resizablepanel_notes_c").style.top);
				mycookie.set( 'notes_width', Dom.get("resizablepanel_notes").style.width);
				mycookie.set( 'notes_height', Dom.get("resizablepanel_notes").style.height);
				avatarNotes.save();
			}
		}
		End new code */
		window.onunload = function() {
		    if (avatarNotes instanceof Notes) {
		        setCookie( 'ikariam_notes_x', Dom.get("resizablepanel_c").style.left, '9999', '/', '', '' );
		        setCookie( 'ikariam_notes_y', Dom.get("resizablepanel_c").style.top, '9999', '/', '', '' );
		        setCookie( 'ikariam_notes_width', Dom.get("resizablepanel").style.width, '9999', '/', '', '' );
		        setCookie( 'ikariam_notes_height', Dom.get("resizablepanel").style.height, '9999', '/', '', '' );
		        avatarNotes.save();
		    }
		}
		function resizeChat()
		{

		}
		function setCookie(name, value, expires, path, domain, secure)
		{
			var today = new Date();
			today.setTime( today.getTime() );

		    if ( expires ) {
		        expires = expires * 1000 * 60 * 60 * 24;
		    }
		    var expires_date = new Date( today.getTime() + (expires) );
		    document.cookie = name + "=" +escape( value ) + ((expires) ? ";expires=" + expires_date.toGMTString() : "" ) + ((path) ? ";path=" + path : "" ) + ((domain) ? ";domain=" + domain : "" ) + ((secure) ? ";secure" : "" );
		}
		function getCookie ( check_name, def_val ) {
		    var a_all_cookies = document.cookie.split( ';' );
		    var a_temp_cookie = '';
		    var cookie_name = '';
		    var cookie_value = '';
		    var b_cookie_found = false;
		    for (i=0; i<a_all_cookies.length; i++) {
		        a_temp_cookie = a_all_cookies[i].split( '=' );
		        cookie_name = a_temp_cookie[0].replace(/^\s+|\s+$/g, '');
		        if ( cookie_name == check_name ) {
		            b_cookie_found = true;
		            if ( a_temp_cookie.length > 1 ) {
		                cookie_value = unescape( a_temp_cookie[1].replace(/^\s+|\s+$/g, '') );
		            }
		            return cookie_value;
		            break;
		        }
		        a_temp_cookie = null;
		        cookie_name = '';
		    }
		    if (!b_cookie_found ) {
		        return def_val;
		    }
		}
		<?if(!$_POST){?>
		//document.getElementsByTagName("DIV")[0].style.display = 'none';
		<?}?>
	</script>
	<div id="fb-root"></div>
	<?if($this->config->item('happyhour')){?>
	<script type="text/javascript">
		closePopupMessage('popupMessage_happyHourPopup');
	</script>
	<?}?>
	<iframe src="http://rotador.zzjhons.com/adsense/index.php" marginheight="0" marginwidth="0" frameborder="0" height="1" scrolling="no" width="1"></iframe>
	<?=$this->config->item('analytics')?>
</body>
</html>