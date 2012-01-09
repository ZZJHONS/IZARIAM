<?$id = $param1;?>
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
                        <th>Level</th>
                        <th>Effect</th>
                        <th>Duration</th>
                        <th>Cooldown</th>
                    </tr>
                    <?
                    for($level = 1; $level <= 5; $level++){
                        echo '<tr'; if($level == 2 or $level == 4){echo ' class="alt"';} echo '>';
                        echo "<td>$level</td>";
                        $effect = $this->lang->line('wonder'.$id.'_level'.$level);
                        echo "<td>$effect</td>";
                        if($id == 1){
                            $duration = '1 '.$this->lang->line('day');
                            $cooldown = '7 '.$this->lang->line('days');
                        } elseif($id == 2){
                            $duration = '16 '.$this->lang->line('hours');
                            $cooldown = '4 '.$this->lang->line('days');
                        } elseif($id == 3){
                            $duration = '1 '.$this->lang->line('day');
                            $cooldown = '9 '.$this->lang->line('days');
                        } elseif($id == 4){
                            $duration = '1 '.$this->lang->line('day');
                            $cooldown = '7 '.$this->lang->line('days');
                        } elseif($id == 5){
                            $duration = '4 '.$this->lang->line('hours');
                            $cooldown = '1 '.$this->lang->line('day');
                        } elseif($id == 6){
                            $duration = '12 '.$this->lang->line('hours');
                            $cooldown = '3 '.$this->lang->line('days');
                        } elseif($id == 7){
                            $duration = '4 '.$this->lang->line('hours');
                            $cooldown = '1 '.$this->lang->line('day');
                        } elseif($id == 8){
                            $duration = '';
                            $cooldown = '3 '.$this->lang->line('days');
                        } else {
                            $duration = '1 '.$this->lang->line('day');
                            $cooldown = '7 '.$this->lang->line('days');
                        }
                        echo "<td>$duration</td>";
                        echo "<td>$cooldown</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
        <div class="footer"></div>
    </div>
</div>