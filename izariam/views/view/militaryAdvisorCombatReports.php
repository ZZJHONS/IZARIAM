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
        <h1><?=$this->lang->line('generals')?></h1>
        <p><?=$this->lang->line('advisor_combat_reports')?></p>
    </div>
    <div class="yui-navset">
        <ul class="yui-nav">
            <li><a href="<?=$this->config->item('base_url')?>game/militaryAdvisorMilitaryMovements/" title="<?=$this->lang->line('troop_movements')?>"><em><?=$this->lang->line('troop_movements')?> (<?=$this->Player_Model->fleets?>)</em></a></li>
            <li class="selected"><a href="<?=$this->config->item('base_url')?>game/militaryAdvisorCombatReports/" title="<?=$this->lang->line('combat_reports')?>"><em><?=$this->lang->line('combat_reports')?> (?)</em></a></li>
            <li><a href="<?=$this->config->item('base_url')?>game/militaryAdvisorCombatReportsArchive/" title="<?=$this->lang->line('archive')?>"><em><?=$this->lang->line('archive')?></em></a></li>
        </ul>
    </div>
    <div id="troopsOverview">
        <div class="contentBox01h">
            <h3 class="header"><span class="textLabel"><?=$this->lang->line('combat_reports')?></span></h3>
            <div class="content">
                <?$combat_reports = 0?>
                <?if ($combat_reports > 0) {?>
                <form method="post" id="finishedReports" action="<?=$this->config->item('base_url')?>action/modifyCombatReport/<?=$combat_id_large?>">
                <input type='hidden' name='start' value='0'>
                    <table cellpadding="0" cellspacing="0" class="operations">
                        <?foreach ($variable as $key => $value) {?>
                        <tr>
                            <td class="empty"></td>
                            <td><input type="checkbox" name="combatId[<?=$combat_id?>]" value="1" /></td>
                            <td class="date"><?=$combat_date?></td>
                            <td class="subject won">
                                <a href="<?=$this->config->item('base_url')?>game/militaryAdvisorReportView/<?=$combat_id?>" title="<?=$combat_type?>"><?=$combat_type?></a>
                            </td>
                            <td class="empty"></td>
                        </tr>
                        <?}?>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="empty"></td>
                            <td colspan="2" class="all"><a href="javascript:markAll('checked');"><?=$this->lang->line('all')?></a></td>
                        </tr>
                        <tr>
                            <td class="empty"></td>
                            <td colspan="2" class="all"><a href="javascript:markAll('reverse');"><?=$this->lang->line('reverse_marking')?></a></td>
                        </tr>
                        <tr>
                            <td class="empty"></td>
                            <td colspan="2" class="selection">
                                <select id="command" size="1" name="command">
                                    <option value=""><?=$this->lang->line('choose_action')?></option>
                                    <option value="delete"><?=$this->lang->line('delete')?></option>
                                    <option value="mark"><?=$this->lang->line('mark_read')?></option>
                                </select>
                            </td>
                            <td class="go"><input type="submit" value="OK" class="button" /></td>
                            <td class="empty"></td>
                        </tr>
                    </table>
                </form>
                <script type="text/javascript">
                function markAll(command) {
                    var allInputs = document.getElementById('finishedReports').getElementsByTagName('input');
                    for (var i=0; i<allInputs.length; i++) {
                        if (allInputs[i].getAttribute('type') == "checkbox") {
                            if (command == 'checked') {
                                allInputs[i].checked = true;
                            }
                            if (command == 'reverse') {
                                if (allInputs[i].checked == true) {
                                    allInputs[i].checked = false;
                                } else {
                                    allInputs[i].checked = true;
                                }
                            }
                        }
                    }
                }
                </script>
                <?}else{?>
                    <p style="text-align: center;"><?=$this->lang->line('no_combat_reports')?></p>
                <?}?>
            </div>
            <div class="footer"></div>
        </div>
    </div>
</div>