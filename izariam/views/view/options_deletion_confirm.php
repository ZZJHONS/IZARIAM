<div id="mainview">
    <div class="buildingDescription">
        <h1>Delete player</h1>
        <p>Please confirm your decision that you want to delete your account.</p>
    </div>
    <div class="contentBox01h">
        <h3 class="header"><span class="textLabel">Confirm player deletion</span></h3>
        <div class="content">
            <p>Are you sure you no longer want to play?</p>
            <?$this->load->helper('form');?>
            <?=form_open('actions/delete/');?>
                <p>
                    Please enter your password as a safety measure:
                    <?$data = array(
                        'name' => 'password'
                    );?>
                    <?=form_password($data);?>
                <p>
                <div class="centerButton">
                    <?$data = array(
                        'style' => 'width:auto;',
                        'class' => 'button',
                        'value' => 'Yes, I no longer want to play'
                    );?>
                    <?=form_submit($data);?>
                </div>
            <?=form_close();?>
            <p style="margin:10px auto;text-align: center;">
                <a class="button" href="<?=$this->config->item('base_url');?>game/options/">No, I will not leave my citizens alone</a>
            </p>
        </div>
        <div class="footer"></div>
    </div>
</div>