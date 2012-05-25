<?if ($id >= 9 or $id <=0) {
    redirect($this->config->item('base_url').'game/wonderDetail/1', 'refresh');
} else {
    $id = $param1;?>
<div id="mainview">
    <div class="wonderDetail">
        <h1><?=$this->lang->line('wonder_description')?></h1>
    </div>
    <div class="contentBox01h">
        <h3 class="header"><span class="textLabel"><?=$this->Data_Model->wonder_name_by_type($id)?></span></h3>
        <div class="content">
            <div class="desc">
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <td><p><img src="<?=$this->config->item('style_url')?>skin/wonder2/wonder<?=$id?>.gif" /></p></td>
                        <td>
                            <h4>Description</h4>
                            <p><?=$this->Data_Model->wonder_desc_by_type($id)?></p>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="effect">
                <table class="effectTable">
                    <tr>
                        <th><?=$this->lang->line('level')?></th>
                        <th><?=$this->lang->line('effect')?></th>
                        <th><?=$this->lang->line('duration')?></th>
                        <th><?=$this->lang->line('cooldown')?></th>
                    </tr>
                    <?
                    for($level = 1; $level <= 5; $level++){
                        echo '<tr';
                        if($level == 2 or $level == 4){echo ' class="alt"';}
                        echo ">\n<td>$level</td>\n<td>".$this->Data_Model->wonder_effect_by_type($id, $level)."</td>\n<td>".$this->Data_Model->wonder_duration_by_type($id)."</td>\n<td>".$this->Data_Model->wonder_cooldown_by_type($id)."</td>\n</tr>\n";
                    }
                    ?>
                </table>
            </div>
        </div>
        <div class="footer"></div>
    </div>
</div>
<?}?>