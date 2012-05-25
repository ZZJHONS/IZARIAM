<?$id = $param1?>
<?if($id > 0 and $id <= 23){?>
<div id="mainview">
    <h1>Unit description</h1>
    <div class="contentBox01h">
        <h3 class="header"><span class="textLabel">Slinger</span></h3>
        <div class="content">
            <div id="unit" class="s301">
                <div id="unitRes">
                    <ul class="resources">
                        <li class="wood firstpos" title="Building material"><span class="textLabel">Building material': </span>20</li>
                        <li class="citizens fourthpos" tite="Citizens"><span class="textLabel">'Citizens': </span>1</li>
                        <li class="upkeep eighthps" title="Upkeep"><span class="textLabel">'Upkeep': </span>2</li>
                        <li class="eight fifthpos" title="Transport weight"><span class="textLabel">'Transport eight': </span>3</li>
                        <li class="building_level sixthpos" title="Level"><span class="textLabel">Level': </span>2</li>
                        <li class="completionime seventhpos" title="Building time"><span class="textLabel">'Building ime': </span>1m 30s</li>
                    </ul>
                </div>
            </div>
            <div id="infoBox">
                <div class="infoBoxHeader"></div>
                <div class="infoBoxContent">
                    <h3>Long-Range Fighter, Human</h3>
                    <span class="textLabel">Hit points:</span><b>8</b>
                    <br>
                    <span class="textLabel">Armour:</span><b>-</b>
                    <br>
                    <span class="textLabel">Speed:</span>60
                    <br>
                    <span class="textLabel">Size:</span>1
                    <br>
                    <div class="weapon">
                        <div class="weaponName">Dagger</div>
                        <span class="textLabel">Damage:</span>2
                        <br>
                        <span class="textLabel">Accuracy:</span>
                        <div class="damageFocusContainer">
                            <div class="damageFocus" style="width: 60%"></div>
                        </div>
                    </div>
                    <div class="weapon">
                        <div class="weaponName">Sling</div>
                        <span class="textLabel">Damage:</span>3
                        <br>
                        <span class="textLabel">Accuracy:</span>
                        <div class="damageFocusContainer">
                            <div class="damageFocus" style="width: 20%"></div>
                        </div>
                        <span class="textLabel">Munition:</span>5
                    </div>
                    <span class="req">Requirement(s)</span>
                    <span class="notAvailable">* <a href="<?=$this->config->item('base_url')?>game/buildingDetail/5">Barracks ( 2 )</a></span>
                </div>
                <div class="infoBoxFooter"></div>
            </div>
            <div class="shortdesc">
                <h4 style="font-weight: bold; padding-bottom: 10px; color: #B03937;">Slinger</h4>
                Slings are light and cheap weapons. They cannot inflict much damage on well-armed opponents, but at least their munition is readily available.
            </div>  
        </div>
        <div class="footer"></div>
    </div>
</div>

<div id="mainview">
    <div class="buildingDescription">
        <h1><?=$this->lang->line('building_description')?></h1>
    </div>
    <div class="contentBox01h">
        <h3 class="header"><span class="textLabel"><?=$this->Data_Model->building_name_by_type($id)?></span></h3>
        <div class="content">
            <img alt="<?=$this->Data_Model->building_name_by_type($id)?>" src="<?=$this->config->item('style_url')?>skin/buildings/y100/<?=$this->Data_Model->building_class_by_type($id)?>.gif"/>
            <p><?=$this->Data_Model->building_desc_by_type($id)?></p>
            <!--<p><b>Требования</b> <p>Исследования : нет</p></p>-->
            <div class="centerButton">
                <a class="button" href="javascript:history.back()"><?=$this->lang->line('back')?></a>
            </div>
<?
    $position = $this->Data_Model->get_position($id, $this->Player_Model->now_town);
    $level_text = 'pos'.$position.'_level';
    $level = $this->Player_Model->now_town->$level_text;
    if ($position == 0 and $id > 1) { $level = 0; }
    $cost = $this->Data_Model->building_cost($id,$level-1,$this->Player_Model->research, $this->Player_Model->levels[$this->Player_Model->town_id]);
    $cost_max = $this->Data_Model->building_cost($id,$cost['max_level']-1,$this->Player_Model->research, $this->Player_Model->levels[$this->Player_Model->town_id]);
    $wood = ($cost_max['wood'] > 0) ? true : false;
    $wine = ($cost_max['wine'] > 0) ? true : false;
    $marble = ($cost_max['marble'] > 0) ? true : false;
    $crystal = ($cost_max['crystal'] > 0) ? true : false;
    $sulfur = ($cost_max['sulfur'] > 0) ? true : false; 
?>
            <table id="overview">
                <tr>
                    <th><?=$this->lang->line('level')?></th>
<?if ($wood) {?>
                    <th class="costs"><img src="<?=$this->config->item('style_url')?>skin/resources/icon_wood.gif"></th>
<?}?>
<?if ($wine) {?>
                    <th class="costs"><img src="<?=$this->config->item('style_url')?>skin/resources/icon_wine.gif"></th>
<?}?>
<?if ($marble) {?>
                    <th class="costs"><img src="<?=$this->config->item('style_url')?>skin/resources/icon_marble.gif"></th>
<?}?>
<?if ($crystal) {?>
                    <th class="costs"><img src="<?=$this->config->item('style_url')?>skin/resources/icon_crystal.gif"></th>
<?}?>
<?if ($sulfur) {?>
                    <th class="costs"><img src="<?=$this->config->item('style_url')?>skin/resources/icon_sulfur.gif"></th>
<?}?>
                    <th class="costs"><img src="<?=$this->config->item('style_url')?>skin/resources/icon_time.gif" /></th>
<?switch($id){?>
<?case 1:?>
                    <th class="allow"><?=$this->lang->line('maximal_citizens')?></th>
<?break;?>
<?case 2:?>
                    <th class="allow"><?=$this->lang->line('loading_speed')?></th>
<?break;?>
<?case 3:?>
                    <th class="allow"><?=$this->lang->line('scientists')?></th>
<?break;?>
<?case 6:?>
                    <th colspan="5" class="warehouseCapacity"><?=$this->lang->line('capacity')?></th>
<?break;?>
<?case 8:?>
                    <th class="allow"><?=$this->lang->line('max_wine')?></th>
                    <th class="allow"><img src="<?=$this->config->item('style_url')?>skin/ikipedia/tavern_bonus.GIF" alt="<?=$this->lang->line('base_wine_bonus')?>" title="<?=$this->lang->line('base_wine_bonus')?>"></th>
                    <th class="allow"><img src="<?=$this->config->item('style_url')?>skin/ikipedia/wine_bonus.gif" alt="<?=$this->lang->line('max_wine_bonus')?>" title="<?=$this->lang->line('max_wine_bonus')?>"></th>
<?break;?>
<?case 12:?>
                    <th class="allow"><?=$this->lang->line('capacity')?></th>
<?break;?>

<?}?>
                </tr>
<?if($id==6){?>
                <tr>
                    <td colspan="4"></td>
                    <td title="<?=$this->lang->line('wood')?>" class="warehouseMaterial"><img src="<?=$this->config->item('style_url')?>skin/resources/icon_wood.gif" alt="Стройматериалы"></td>
                    <td title="<?=$this->lang->line('crystal')?>" class="warehouseMaterial"><img src="<?=$this->config->item('style_url')?>skin/resources/icon_glass.gif" alt="Хрусталь"></td>
                    <td title="<?=$this->lang->line('marble')?>" class="warehouseMaterial"><img src="<?=$this->config->item('style_url')?>skin/resources/icon_marble.gif" alt="Мрамор"></td>
                    <td title="<?=$this->lang->line('sulfur')?>" class="warehouseMaterial"><img src="<?=$this->config->item('style_url')?>skin/resources/icon_sulfur.gif" alt="Сера"></td>
                    <td title="<?=$this->lang->line('wine')?>" class="warehouseMaterial"><img src="<?=$this->config->item('style_url')?>skin/resources/icon_wine.gif" alt="Виноград"></td>
                </tr>
<?}?>

<?$start_level = ($level > 5) ? $level - 6 : 0?>
<?$max_level = (($start_level + 15) > $cost['max_level']) ? $cost['max_level'] : $start_level + 15?>
<?for ($i = $start_level; $i <= $max_level; $i++){?>
<?if ($cost['max_level'] >= $i) {?>
<?$cost = $this->Data_Model->building_cost($id, $i, $this->Player_Model->research, $this->Player_Model->levels[$this->Player_Model->town_id])?>
                <tr <?if (($i % 2) == 1){?>class="alt"<?}?>>
                    <td class="level"><?=$i+1?></td>
<?if ($wood) {?>
                    <td class="costs"><?=number_format($cost['wood'])?></td>
<?}?>
<?if ($wine) {?>
                    <td class="costs"><?=number_format($cost['wine'])?></td>
<?}?>
<?if ($marble) {?>
                    <td class="costs"><?=number_format($cost['marble'])?></td>
<?}?>
<?if ($crystal) {?>
                    <td class="costs"><?=number_format($cost['crystal'])?></td>
<?}?>
<?if ($sulfur) {?>
                    <td class="costs"><?=number_format($cost['sulfur'])?></td>
<?}?>
                    <td class="costs"><?=format_time($cost['time'])?></td>
<?switch($id){
    case 1:?>
                    <td class="allow"><?echo number_format($this->Data_Model->peoples_by_level($i))?></th>
<?break;
    case 2:?>
                    <td class="allow"><?echo number_format($this->Data_Model->speed_by_port_level($i+1))?></th>
<?break;
    case 3:?>
                    <td class="allow"><?echo number_format($this->Data_Model->scientists_by_level($i+1))?></th>
<?break;
    case 6:?>
                    <td class="allow"><?echo number_format(8000*($i+1))?></th>
                    <td class="allow"><?echo number_format(8000*($i+1))?></th>
                    <td class="allow"><?echo number_format(8000*($i+1))?></th>
                    <td class="allow"><?echo number_format(8000*($i+1))?></th>
                    <td class="allow"><?echo number_format(8000*($i+1))?></th>
<?break;
    case 8:?>
                    <td class="allow"><?echo number_format($this->Data_Model->wine_by_tavern_level($i+1))?></th>
                    <td class="allow"><?echo number_format(12*($i+1))?></th>
                    <td class="allow"><?echo number_format(60*($i+1))?></th>
<?break;
    case 12:?>
                    <td class="allow"><?echo number_format($this->Data_Model->branchOffice_capacity_by_level($i+1))?></th>
<?break;

}?>
                </tr>
<?}?>
<?}?>
            </table>
            <div class="centerButton">
                <a class="button" href="javascript:history.back()"><?=$this->lang->line('back')?></a>
            </div>
        </div>
        <div class="footer"></div>
    </div>
</div>
<?}?>