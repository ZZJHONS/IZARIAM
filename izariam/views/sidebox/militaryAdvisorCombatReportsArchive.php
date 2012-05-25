<?
/*
 * Project: iZariam
 * Edited: 12/02/2012
 * By: ZZJHONS
 * Info: zzjhons@gmail.com
 */
?>
<div id="backTo" class="dynamic">
    <h3 class="header"><?=$this->lang->line('back')?></h3>
    <div class="content">
        <a href="<?=$this->config->item('base_url')?>game/militaryAdvisorReportView/<?/*=$combat_id*/?>" title="<?=$this->lang->line('back')?>">
            <img src="<?=$this->config->item('style_url')?>skin/img/action_back.gif" width="160" height="100">
            <span class="textLabel">&lt;&lt; <?=$this->lang->line('back_to_overview')?></span>
        </a>
    </div>
    <div class="footer"></div>
</div>