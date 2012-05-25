<?
/*
 * Project: iZariam
 * Edited: 12/02/2012
 * By: ZZJHONS
 * Info: zzjhons@gmail.com
 */
?>
<div id="mainview">
    <div class="buildingDescription">
        <h1><?=$this->lang->line('mayor')?></h1>
        <p><?=$this->lang->line('mayor_desc')?></p>
    </div>
    <div class="yui-navset">
        <ul class="yui-nav">
            <li>
                <a href="<?=$this->config->item('base_url')?>game/tradeAdvisor/" title="<?=$this->lang->line('town_news')?>"><em><?=$this->lang->line('town_news')?></em></a>
            </li>
            <li class="selected">
                <a href="<?=$this->config->item('base_url')?>game/tradeAdvisorTradeRoute/" title="<?=$this->lang->line('trade_routes')?>"><em><?=$this->lang->line('trade_routes')?></em></a>
            </li>
        </ul>
    </div>
    <script type="text/javascript">
    function toggleTradeRouteBoxContent() {
        if(YAHOO.util.Dom.hasClass('tradeRouteBox', 'hidden'))  {
            YAHOO.util.Dom.removeClass('tradeRouteBox', 'hidden');
            setCookie('hideTradeRouteBoxContent', 0, 5*365);
        } else {
            YAHOO.util.Dom.addClass('tradeRouteBox', 'hidden');
            setCookie('hideTradeRouteBoxContent', 1, 5*365);
        }
        if (document.getElementById('sendTransporterBox') && typeof(doIE6Fix) != 'undefined' && doIE6Fix == true) {
            document.getElementById('sendTransporterBox').style.display='none';
            document.getElementById('sendTransporterBox').style.display='block';
        }
    }
    </script>
    <div class="contentBox01h tradeRouteBox " id="tradeRouteBox">
        <h3 class="header"><?=$this->lang->line('edit_trade_routes')?></h3>
        <div class="content" id="tradeRouteBoxContent">
            <p><?=$this->lang->line('trade_routes_desc')?></p>
            <table>
                <tr>
                    <th colspan=3 style="width:446px;"><?=$this->lang->line('trade_route')?>:</th>
                    <th style="text-align:left;width:42px;"><?=$this->lang->line('duration')?>:</th>
                    <th style="text-align:left;width:47px;"><?=$this->lang->line('costs')?>:</th>
                    <th style="width:107px;"></th>
                </tr>
            </table>
            <?if(SizeOf($this->Player_Model->trade_routes) > 0){?>
            <?foreach($this->Player_Model->trade_routes as $trade){?>
            <form action="<?=$this->config->item('base_url')?>actions/tradeRoute/" method="post" id="tradeRouteForm0">
                <input type="hidden" name="renew" value="0" id="renew0">
                <input type="hidden" name="route" value="<?=$trade->id?>">
                <ul class="tradeRoute"  style="z-index:100">
                    <li class="startCity" style="position:relative;z-index:100">
                        <select id="tradeRouteStart<?=$trade->id?>" class="dropdown size175 smallFont" name="city1Id" onchange="this.focus();">
                            <option><?=$this->lang->line('choose_source_town')?></option>
                            <?foreach($this->Player_Model->towns as $town){?>
                            <?$island = $this->Player_Model->islands[$town->island]?>
                            <?$selected = ($town->id == $trade->from) ? ' selected="selected"' : ''?>
                            <option class="coords"<?=$selected?> value="<?=$town->id?>" title="<?=$this->lang->line('trade_resource')?>: <?=$this->Data_Model->resource_name_by_type($island->trade_resource)?>"><p>[<?=$island->x?>:<?=$island->y?>]&nbsp;<?=$town->name?></p></option>
                            <?}?>
                        </select>
                    </li>
                    <li class="endCity">
                        <select id="tradeRouteEnd<?=$trade->id?>" class="dropdown size175 smallFont" name="city2Id" >
                            <option><?=$this->lang->line('choose_destination_town')?></option>
                            <?foreach($this->Player_Model->towns as $town){?>
                            <?$island = $this->Player_Model->islands[$town->island]?>
                            <?$selected = ($town->id == $trade->to) ? ' selected="selected"' : ''?>
                            <option class="coords"<?=$selected?> value="<?=$town->id?>" title="<?=$this->lang->line('trade_resource')?>: <?=$this->Data_Model->resource_name_by_type($island->trade_resource)?>" ><p>[<?=$island->x?>:<?=$island->y?>]&nbsp;<?=$town->name?></p></option>
                            <?}?>
                        </select>
                    </li>
                    <li class="premiumDuration"><?=format_time($this->config->item('trade_route_time'))?></li>
                    <li class="premiumCost">&nbsp; -</li>
                    <li class="renew"></li>
                </ul>
                <ul class="tradeRoute2" style="z-index:99">
                    <li class="number">
                        <input type="text" name="number" value="<?=$trade->send_count?>" style="width:50px">
                    </li>
                    <?  $selected_wood = ($trade->send_resource == 0) ? ' selected' : '';
                        $selected_wine = ($trade->send_resource == 1) ? ' selected' : '';
                        $selected_marble = ($trade->send_resource == 2) ? ' selected' : '';
                        $selected_crystal = ($trade->send_resource == 3) ? ' selected' : '';
                        $selected_sulfur = ($trade->send_resource == 4) ? ' selected' : '';
                    ?>
                    <li class="tradegood">
                        <select name="tradegood" id="tradegood<?=$trade->id?>" class="dropdown size68 smallFont">
                            <option class="resource" value="0" title="<?=$this->lang->line('wood')?>"<?=$selected_wood?>></option>
                            <option class="tradegood1" value="1" title="<?=$this->lang->line('wine')?>"<?=$selected_wine?>></option>
                            <option class="tradegood2" value="2" title="<?=$this->lang->line('marble')?>"<?=$selected_marble?>></option>
                            <option class="tradegood3" value="3" title="<?=$this->lang->line('crystal')?>"<?=$selected_crystal?>></option>
                            <option class="tradegood4" value="4" title="<?=$this->lang->line('sulfur')?>"<?=$selected_sulfur?>></option>
                        </select>
                    </li>
                    <li class="time">
                        <select name="time" id="time<?=$trade->id?>" class="dropdown size115 smallFont">
                            <?for ($i = 0; $i <= 23; $i++){
                                $selected = ($i == $trade->send_time) ? ' selected' : '';?>
                            <option value="<?=$i?>"<?=$selected?>><?=$this->lang->line('every_day_at')?> <?=$i?>:00</option>
                            <?}?>
                        </select>
                    </li>
                    <li class="save">
                        <input id="colonizeBtn" name="save" type="submit" value="" title="<?=$this->lang->line('save_changes')?>"><br />
                    </li>
                    <li class="status">
                        <span style="font-size:14px;font-weight:bold;color:green;"><?=$this->lang->line('remains')?> <?=premium_time($this->config->item('trade_route_time')-(time()-$trade->start_time))?></span>
                    </li>
                    <li class="extend"></li>
                    <li class="delete">
                        <a  href="<?=$this->config->item('base_url')?>actions/tradeRoute/<?=$trade->id?>/" title="<?=$this->lang->line('remove')?>"></a>
                    </li>
                </ul>
            </form>
            <div class="listFooter"></div>
            <?}?>
            <?}?>
            <?if(SizeOf($this->Player_Model->trade_routes) == 0 or $param1 == 'new'){?>
            <form action="<?=$this->config->item('base_url')?>actions/tradeRoute/" method="post" id="tradeRouteForm0">
                <input type="hidden" name="renew" value="0" id="renew0">
                <input type="hidden" name="route" value="0">
                <ul class="tradeRoute"  style="z-index:100">
                    <li class="startCity" style="position:relative;z-index:100">
                        <select id="tradeRouteStart0" class="dropdown size175 smallFont" name="city1Id" onchange="this.focus();">
                            <option><?=$this->lang->line('choose_source_town')?></option>
                            <?foreach($this->Player_Model->towns as $town){?>
                            <?$island = $this->Player_Model->islands[$town->island]?>
                            <?$selected = ($this->Player_Model->town_id == $town->id) ? ' selected="selected" ' : ''?>
                            <option class="coords"<?=$selected?>value="<?=$town->id?>" title="<?=$this->lang->line('trade_resource')?>: <?=$this->Data_Model->resource_name_by_type($island->trade_resource)?>" ><p>[<?=$island->x?>:<?=$island->y?>]&nbsp;<?=$town->name?></p></option>
                            <?}?>
                        </select>
                    </li>
                    <li class="endCity">
                        <select id="tradeRouteEnd0" class="dropdown size175 smallFont" name="city2Id" >
                            <option><?=$this->lang->line('choose_destination_town')?></option>
                            <?foreach($this->Player_Model->towns as $town){?>
                            <?$island = $this->Player_Model->islands[$town->island]?>
                            <?$selected = ''?>
                            <option class="coords" value="<?=$town->id?>"title="<?=$this->lang->line('trade_resource')?>: <?=$this->Data_Model->resource_name_by_type($island->trade_resource)?>" <?=$selected?>><p>[<?=$island->x?>:<?=$island->y?>]&nbsp;<?=$town->name?></p></option>
                            <?}?>
                        </select>
                    </li>
                    <li class="premiumDuration"><?=format_time_large($this->config->item('trade_route_time'))?></li>
                    <?if(SizeOf($this->Player_Model->trade_routes) > 0){?>
                    <li class="premiumCost">10 <img height="20" width="24" alt="<?=$this->lang->line('ambrosy')?>" src="<?=$this->config->item('style_url')?>skin/premium/ambrosia_icon.gif"></li>
                    <?if($this->Player_Model->user->ambrosy >= 10){?>
                    <li class="renew">
                        <a onclick="Dom.get('renew0').value=1;Dom.get('tradeRouteForm0').submit();" id="colonizeBtn" name="renew" style="margin:0px;" class="button"><?=$this->lang->line('activate')?></a><br />
                    </li>
                    <?}else{?>
                    <li class="renew">
                        <a class="notenough" href="<?=$this->config->item('base_url')?>game/premiumPayment/"><?=$this->lang->line('not_enough')?> <?=$this->lang->line('ambrosy')?>! <?=10 - $this->Player_Model->user->ambrosy?> <?=$this->lang->line('ambrosy')?>. !<br /><span class="buyNow"><?=$this->lang->line('own_buy')?>!</span></a>
                    </li>
                    <?}?>
                    <?}else{?>
                    <li class="premiumCost">&nbsp; -</li>
                    <li class="renew">
                        <a onclick="Dom.get('renew0').value=1;Dom.get('tradeRouteForm0').submit();" id="colonizeBtn" name="renew" style="margin:0px;" class="button"><?=$this->lang->line('activate')?></a><br />
                    </li>
                    <?}?>
                </ul>
                <ul class="tradeRoute2" style="z-index:99">
                    <li class="number">
                        <input type="text" name="number"  value="0" style="width:50px">
                    </li>
                    <?
                        $selected_wood = '';
                        $selected_wine = '';
                        $selected_marble = '';
                        $selected_crystal = '';
                        $selected_sulfur = '';
                    ?>
                    <li class="tradegood">
                        <select name="tradegood" id="tradegood0" class="dropdown size68 smallFont">
                            <option class="resource" value="0" title="<?=$this->lang->line('wood')?>" <?=$selected_wood?>></option>
                            <option class="tradegood1" value="1" title="<?=$this->lang->line('wine')?>" <?=$selected_wine?>></option>
                            <option class="tradegood2" value="2" title="<?=$this->lang->line('marble')?>" <?=$selected_marble?>></option>
                            <option class="tradegood3" value="3" title="<?=$this->lang->line('crystal')?>" <?=$selected_crystal?>></option>
                            <option class="tradegood4" value="4" title="<?=$this->lang->line('sulfur')?>" <?=$selected_sulfur?>></option>
                        </select>
                    </li>
                    <li class="time">
                        <select name="time" id="time0" class="dropdown size115 smallFont">
                            <?for ($i = 0; $i <= 23; $i++){
                                $selected = '';?>
                            <option value="<?=$i?>" <?=$selected?>><?=$this->lang->line('every_day_at')?> <?=$i?>:00</option>
                            <?}?>
                        </select>
                    </li>
                    <li class="save">
                        <input id="colonizeBtn" name="save" type="submit" value="" title="<?=$this->lang->line('save_changes')?>"><br>
                    </li>
                    <li class="status">
                        <span style="font-size:14px;font-weight:bold;color:red;"><?=$this->lang->line('not_active')?></span>
                    </li>
                    <li class="extend"></li>
                    <li class="delete"></li>
                </ul>
            </form>
            <div class="listFooter"></div>
            <?}else{?>
            <div class="addRoute">
                <a href="<?=$this->config->item('base_url')?>game/tradeAdvisorTradeRoute/new/" id="colonizeBtn" style="margin:0px;" class="button" ><?=$this->lang->line('new_trade_route')?></a><br />
            </div>
            <?}?>
        </div>
        <div class="footer"></div>
    </div>
    <script type="text/javascript">
        <!--
        function testTradeRouteDelete() {
            return confirm("<?=$this->lang->line('delete_trade_route')?>");
        }

        Event.onDOMReady( function() {
        <?if(SizeOf($this->Player_Model->trade_routes) > 0){?>
        <?foreach($this->Player_Model->trade_routes as $trade){?>
            replaceSelect(Dom.get("tradeRouteStart<?=$trade->id?>"));
            replaceSelect(Dom.get("tradeRouteEnd<?=$trade->id?>"));
            replaceSelect(Dom.get("tradegood<?=$trade->id?>"));
            replaceSelect(Dom.get("time<?=$trade->id?>"));
        <?}}?>
        <?if(SizeOf($this->Player_Model->trade_routes) == 0 or $param1 == 'new'){?>
            replaceSelect(Dom.get("tradeRouteStart0"));
            replaceSelect(Dom.get("tradeRouteEnd0"));
            replaceSelect(Dom.get("tradegood0"));
            replaceSelect(Dom.get("time0"));
        <?}?>
        });
        //-->
    </script>
</div>