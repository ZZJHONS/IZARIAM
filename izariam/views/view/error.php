<div id="information" class="dynamic"></div>
<div id="mainview">
    <div class="buildingDescription">
        <h1><?=$this->lang->line('error')?></h1>
    </div>
    <div class="contentBox01h">
        <h3 class="header"><span class="textLabel">Error message(s)</span></h3>
        <div class="content">
            <ul class="error">
                <center>
                    <li><?=$this->lang->line('page_not_found')?></li>
                    <div class="centerButton">
                        <a href="mailto:zzjhons@gmail.com?subject=iZariam-Error" class="button" style="text-decoration:none;">Report this error</a>
                    </div>
                </center>
            </ul>
            <?/* Old:
            <!--<ul class="error">
            </ul>-->
            <!-- <p><br><center><?if($param1){?><?=$param1?><?}elseif($this->session->flashdata('game_error') != ''){?><?=$this->session->flashdata('game_error')?><?}else{?><?=$this->lang->line('page_not_found')?><?}?></center></p> -->
            <p><br><center><?if($param1 != ''){?><?=$param1?><?}else{?><?=$this->lang->line('page_not_found')?><?}?></center></p>
            */?>
        </div>
        <div class="footer"></div>
    </div>
</div>