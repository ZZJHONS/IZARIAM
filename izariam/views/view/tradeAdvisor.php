<?
/*
 * Project: iZariam
 * Edited: 12/02/2012
 * By: ZZJHONS
 * Info: zzjhons@gmail.com
 */
$config['base_url'] = $this->config->item('base_url').'game/tradeAdvisor/';
$config['total_rows'] = SizeOf($this->Player_Model->towns_messages);
$config['per_page'] = '10';
$config['num_links'] = 3;
$config['next_link'] = '<img src="'.$this->config->item('style_url').'skin/img/resource/btn_max.gif" title="'.$this->lang->line('next').'. 10">';
$config['last_link'] = '<img src="'.$this->config->item('style_url').'skin/img/resource/btn_max.gif" title="'.$this->lang->line('last').'">';
$config['prev_link'] = '<img src="'.$this->config->item('style_url').'skin/img/resource/btn_min.gif" title="'.$this->lang->line('prev').'. 10">';
$config['first_link'] = '<img src="'.$this->config->item('style_url').'skin/img/resource/btn_min.gif" title="'.$this->lang->line('first').'">';
$this->pagination->initialize($config);
$msg_id = $param1;
?>
<div id="mainview">
    <div class="buildingDescription">
        <h1><?=$this->lang->line('mayor')?></h1>
        <p></p>
    </div>
    <div class="yui-navset">
        <ul class="yui-nav"  >
            <li  class="selected">
                <a href="<?=$this->config->item('base_url')?>game/tradeAdvisor/" title="<?=$this->lang->line('town_news')?>"><em><?=$this->lang->line('town_news')?></em></a>
            </li>
            <li>
                <a href="<?=$this->config->item('base_url')?>game/tradeAdvisorTradeRoute/" title="<?=$this->lang->line('trade_routes')?>"><em><?=$this->lang->line('trade_routes')?></em></a>
            </li>
        </ul>
    </div>
    <div class="contentBox01h">
        <h3 class="header"><?=$this->lang->line('current_events')?> (<?=SizeOf($this->Player_Model->towns_messages)?>)</h3>
        <div class="content">
            <table cellpadding="0" cellspacing="0" class="table01" id="inboxCity">
                <thead>
                    <tr>
                        <th></th>
                        <th colspan="2"><?=$this->lang->line('location')?></th>
                        <th><?=$this->lang->line('date')?></th>
                        <th><?=$this->lang->line('subject')?></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?$message_id = 0?>
                    <?foreach($this->Player_Model->towns_messages as $message){?>
                        <?if($message_id >= $msg_id and $message_id < ($msg_id + $config['per_page']) ){?>
                    <tr class="<?=(($message_id % 2) == 0) ? 'alt' : 'empty'?>">
                        <td class="<?=($message->checked == 0) ? 'wichtig' : 'empty'?>"></td>
                        <td class="city"></td>
                        <td style="white-space:nowrap;">
                            <a title="<?=$this->lang->line('back_town')?> <?=$this->Data_Model->temp_towns_db[$message->town]->name?>" href="/game/city/<?=$message->town?>/"><?=$this->Data_Model->temp_towns_db[$message->town]->name?></a>
                        </td>
                        <td class="date"><?=date("d.m.Y G:i",$message->date)?></td>
                        <td class="subject"><?=$message->text?></td>
                        <td class="empty"></td>
                    </tr>
                        <?}?>
                        <?$message_id++?>
                    <?}?>
                    <tr class="pgnt">
                        <td class="empty"></td>
                        <td></td>
                        <td></td>
                        <td colspan="i" class="paginator">
                            <?=$this->pagination->create_links()?>
                        </td>
                        <td></td>
                        <td class="empty"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="footer"></div>
    </div>
</div>
<script type="text/javascript">
<!--
 /* IE RTL dirty fix for invisible content foooooooooooo */
   Dom.get("mainview").style.display="block";
//-->
</script>
<?
    $this->db->set('checked', 1);
    $this->db->where(array('user' => $this->Player_Model->user->id));
    $this->db->update($this->session->userdata('universe').'_town_messages');
?>