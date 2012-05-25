<?
/*
 * Project: iZariam
 * Edited: 12/02/2012
 * By: ZZJHONS
 * Info: zzjhons@gmail.com
 */
?>
<div id="militaryAdvisorCombatReports">
    <div id="militaryAdvisorReportView">
        <div id="mainview">
            <div class="buildingDescription">
                <h1><?=$this->lang->line('generals')?></h1>
                <p></p>
            </div>
            <div class="yui-navset">
                <ul class="yui-nav">
                    <li><a href="<?=$this->config->item('base_url')?>game/militaryAdvisorMilitaryMovements/" title="<?=$this->lang->line('troop_movements')?>"><em><?=$this->lang->line('troop_movements')?> (<?=$this->Player_Model->fleets?>)</em></a></li>
                    <li><a href="<?=$this->config->item('base_url')?>game/militaryAdvisorCombatReports/" title="<?=$this->lang->line('combat_reports')?>"><em><?=$this->lang->line('combat_reports')?> (?)</em></a></li>
                    <li class="selected"><a href="<?=$this->config->item('base_url')?>game/militaryAdvisorCombatReportsArchive/" title="<?=$this->lang->line('archive')?>"><em><?=$this->lang->line('archive')?></em></a></li>
                </ul>
            </div>
            <div id="troopsOverview">
                <div class="contentBox01h">
                    <h3 class="header"><span class="textLabel"><?=$this->lang->line('combat_reports')?></span></h3>
                    <div class="content">
                        <p style="text-align: center;"><?=$this->lang->line('no_combat_reports')?></p>
                    </div>
                    <div class="footer"></div>
                </div>
            </div>
        </div>
    </div>
</div>