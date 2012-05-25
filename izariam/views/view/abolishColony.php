<?php
/*
 * Project: iZariam
 * Edited: 11/02/2012
 * By: ZZJHONS
 * Info: zzjhons@gmail.com
 */
?>
<div id="mainview">
    <h1><?=$this->lang->line('leave_colony')?></h1>
    <p><?=$this->lang->line('leave_colony_text')?></p>
	<?if($this->Player_Model->town_id != $this->Player_Model->capital_id){?>
    <form action="<?=$this->config->item('base_url')?>actions/abolishColony/" method="POST">
        <div class="centerButton">
            <input type="submit" class="button" value="<?=$this->lang->line('leave_colony')?>">
        </div>
    </form>
    <?}else{?>
    <div class="centerButton">
        <input type="submit" class="button" value="<?=$this->lang->line('no_leave_capital')?>">
    </div>
    <?}?>
</div>