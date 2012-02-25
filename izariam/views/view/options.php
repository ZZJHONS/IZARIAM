<div id="mainview">
    <div class="buildingDescription">
        <h1><?=$this->lang->line('options')?></h1>
        <p></p>
    </div>
    <?if($this->Player_Model->user->register_complete == 0 and $this->config->item('game_email')){?>
    <div class="contentBox01h" id="emailInvalidWarning">
        <h3 class="header"><span class="textLabel">Your e-mail address has not been confirmed yet.</span></h3>
        <div class="content">
            <p>Your e-mail address has not been confirmed yet. Until then you can`t get in touch with other players or send out fleets or armies. You can confirm your address by clicking on the link in the e-mail that was sent to you. If you did not receive this e-mail you can request it again here.</p>
            <div class="centerButton">
                <a class="button" href="<?=$this->config->item('base_url')?>actions/options/validationEmail/">Get a confirmation mail</a>
            </div>
        </div>
        <div class="footer"></div>
    </div>
    <?}?>
    <?if($this->session->flashdata('options_error')){?>
    <div class="contentBox01h">
        <h3 class="header"><span class="textLabel">Error message(s)</span></h3>
        <div class="content">
            <ul class="errors">
                <?if($this->session->flashdata('options_error_login')){?>
                <li><?=$this->session->flashdata('options_error_login')?></li>
                <?}?>
            </ul>
        </div>
        <div class="footer"></div>
    </div>
    <?}?>
    <div class="yui-navset">
        <ul class="yui-nav">
            <li<?if($param1 == 'account'){?> class="selected"<?}?>><a href="<?=$this->config->item('base_url')?>game/options/account" title="Account Data"><em>Account Data</em></a></li>
            <li<?if($param1 == 'game'){?> class="selected"<?}?>><a href="<?=$this->config->item('base_url')?>game/options/game" title="Game Options"><em>Game Options</em></a></li>
            <li<?if($param1 == 'sso'){?> class="selected"<?}?>><a href="<?=$this->config->item('base_url')?>game/options/sso" title="Facebook"><em>Facebook</em></a></li>
            <li<?if($param1 == 'openid'){?> class="selected"<?}?>><a href="<?=$this->config->item('base_url')?>game/options/openid" title="OpenId"><em>OpenId</em></a></li>
        </ul>
    </div>
    <div class="option_table">
        <?if ($param1 == 'account') {?>
        <div class="contentBox01h">
            <h3 class="header"><span class="textLabel">Settings</span></h3>
            <div class="content">
                <?$this->load->helper('form');?>
                <?=form_open('actions/options/user/');?>
                <!-- <form  action="http://beta.izariam.zzjhons.com/actions/options/user/" method="POST"> -->
                    <div id="options_userData">
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <th>Change player`s name</th>
                                <td>
                                    <?$data = array(
                                            'class' => 'textfield',
                                            'name' => 'name',
                                            'size' => '15',
                                            'value' => $this->Player_Model->user->login
                                        );?>
                                    <?=form_input($data);?>
                                    <!-- <input class="textfield" type="text" name="name" size="15" value="<?=$this->Player_Model->user->login?>"> -->
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div id="options_changePass">
                        <h3>Change password</h3>
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <th>Old password</th>
                                <td>
                                    <?$data = array(
                                            'class' => 'textfield',
                                            'name' => 'oldPassword',
                                            'size' => '20'
                                        );?>
                                    <?=form_password($data);?>
                                    <!-- <input type="password" class="textfield" name="oldPassword" size="20"> -->
                                </td>
                            </tr>
                            <tr>
                                <th>New password</th>
                                <td>
                                    <?$data = array(
                                            'class' => 'textfield',
                                            'name' => 'newPassword',
                                            'size' => '20'
                                        );?>
                                    <?=form_password($data);?>
                                    <!-- <input type="password" class="textfield" name="newPassword" size="20"> -->
                                </td>
                            </tr>
                            <tr>
                                <th>Confirm new password</th>
                                <td>
                                    <?$data = array(
                                            'class' => 'textfield',
                                            'name' => 'newPasswordConfirm',
                                            'size' => '20'
                                        );?>
                                    <?=form_password($data);?>
                                    <!-- <input type="password" class="textfield" name="newPasswordConfirm" size="20"> -->
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="centerButton">
                        <?$data = array(
                            'class' => 'button',
                            'value' => 'Save settings!'
                            );?>
                        <?=form_submit($data)?>
                        <!-- <input type="submit" class="button" value="Save settings!"> -->
                    </div>
                <?=form_close()?>
                <!-- </form> -->
            </div>
            <div class="footer"></div>
        </div>
        <div class="contentBox01h">
            <h3 class="header"><span class="textLabel">Change e-mail-address</span></h3>
            <div class="content">
                <?=form_open('actions/options/email/');?>      
                <!-- <form  action="<?=$this->config->item('base_url')?>actions/options/email/" method="POST"> -->
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <th>Change e-mail-address</th>
                            <td>
                                <?$data = array(
                                    'class' => 'textfield',
                                    'name' => 'email',
                                    'size' => '30',
                                    'value' => $this->Player_Model->user->email
                                    );?>
                                <?=form_input($data)?>
                                (<?=$this->Player_Model->user->email?>)
                                <!-- <input class="textfield" type="text" name="email" size="30" value="<?=$this->Player_Model->user->email?>"> -->
                            </td>
                        </tr>
                        <tr>
                            <th>Confirm the change of your e-mail address with your password</th>
                            <td>
                                <?$data = array(
                                    'class' => 'textfield',
                                    'name' => 'emailPassword',
                                    'size' => '20'
                                    );?>
                                <?=form_password($data)?>
                                <!-- <input type="password" class="textfield" name="emailPassword" size="20"/> -->
                            </td>
                        </tr>
                    </table>
                    <div class="centerButton">
                        <?$data = array(
                            'class' => 'button',
                            'value' => 'Change e-mail-address'
                            );?>
                        <?=form_submit($data)?>
                        <!-- <input type="submit" class="button" value="Change e-mail-address"> -->
                    </div>
                <?=form_close()?>
                <!-- </form> -->
            </div>
            <div class="footer"></div>
        </div>
        <div class="contentBox01h" id="deletionMode">
            <h3 class="header"><span class="textLabel">Delete player</span></h3>
            <div class="content">
                <p>If you no longer want to play you can delete your account here. It will be removed from the game after seven days.</p>
                <br />
                <div class="centerButton">
                    <a class="button" href="<?=$this->config->item('base_url')?>game/options_deletion_confirm/">Delete player irretrievably now!</a>
                </div>
                <br />
            </div>
            <div class="footer"></div>
        </div>
        <?}?>
        <?if ($param1 == 'game') {?>
        <div class="contentBox01h">
            <h3 class="header"><span class="textLabel">Settings</span></h3>
            <div class="content">
                <?$this->load->helper('form');?>
                <?=form_open('actions/options/user/');?>
                <!-- <form  action="<?=$this->config->item('base_url')?>actions/options/user/" method="POST"> -->
                    <div>
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <th>Display details in town selection</th>
                                <td>
                                    <select name="citySelectOptions" size="1">
                                        <option value="0"<?if($this->Player_Model->user->options_select == 0){?> selected="selected"<?}?>>No details</option>
                                        <option value="1"<?if($this->Player_Model->user->options_select == 1){?> selected="selected"<?}?>>Show coordinates in town navigation</option>
                                        <option value="2"<?if($this->Player_Model->user->options_select == 2){?> selected="selected"<?}?>>Trade goods</option>
                                    </select>
                                </td>
                            </tr>
                            <?if($this->Player_Model->user->tutorial < 999){?>
                            <tr>
                                <th>Tutorial</th>
                                <td>
                                    <select name="tutorialOptions" size="1">
                                        <option value="2"selected>Insert</option>
                                        <option value="-2">Disable</option>
                                    </select>
                                </td>
                            </tr>
                            <?}?>
                        </table>
                    </div>
                    <div id="options_debug">
                        <h3>Debugdata</h3>
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <th>Player-ID:</th>
                                <td><?=$this->Player_Model->user->id?></td>
                            </tr>
                            <tr>
                                <th>Current City-ID: </th>
                                <td><?=$this->Player_Model->user->town?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="centerButton">
                        <?$data = array(
                            'class' => 'button',
                            'value' => 'Save settings!'
                        );?>
                        <?=form_submit($data);?>
                        <!-- <input type="submit" class="button" value="Save settings!"> -->
                    </div>
                <?=form_close()?>
                <!-- </form> -->
            </div>
            <div class="footer"></div>
        </div>
        <div class="contentBox01h" id="vacationMode">
            <h3 class="header"><span class="textLabel">Activate vacation mode</span></h3>
            <div class="content">
                <p>You can activate vacation mode here. What this means is that your game account will not be deleted if you are inactive for too long and your cities will not be attacked during that time. Your workers and scientists will also be on holiday and will not be working. So that vacation mode is not taken advantage of, your holiday has to last for a minimum of 48 hours. You will not be able to play Ikariam during this time. After those two days, your holiday will automatically come to an end the next time you log in.</p>
                <p class="warningFont">Caution! Fleets and armies that are outside your cities will be dispersed and will return to their home towns if you activate vacation mode! Goods on board will all be lost!</p>
                <div class="centerButton">
                    <a class="button" href="?view=options_umod_confirm">Activate vacation mode</a>
                </div>
            </div>
            <div class="footer"></div>
        </div>
        <?}?>
        <?if ($param1 == 'sso') {?>
        <?}?>
        <?if ($param1 == 'openid') {?>
        <?}?>
    </div>
</div>
<? /*
        <div class="contentBox01h" id="vacationMode">
            <h3 class="header"><span class="textLabel">Enable Holidays</span></h3>
            <div class="content">
                <p>Here you can activate the vacation mode. This means that your game account will not be deleted due to inactivity and your city will not be attacked during this time. Your workers and scientists stopped their work. In holiday mode, you can include a minimum of 48 hours. You can not play Icarus during this time. After these two days, your vacation will stop automatically as soon as you log into the game.</p>
                <p class="warningFont">Attention! Fleets and armies came out of your cities will be reorganized and returned back as soon as you come into vacation mode! Goods on board will be lost!</p>
                <div class="centerButton">
                    <a class="button" href="<?=$this->config->item('base_url')?>game/options_umod_confirm/">Enable Holidays</a>
                </div>
            </div>
            <div class="footer"></div>
        </div>
                    <div>


                        <h3>Miscellaneous</h3>
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <th>Show extra. information in the selection of cities</th>
                                <td>
                                    <select name="citySelectOptions" size="1">
                                        <option value="0" <?if($this->Player_Model->user->options_select == 0){?>selected="selected"<?}?>>no</option>
                                        <option value="1" <?if($this->Player_Model->user->options_select == 1){?>selected="selected"<?}?>>Display the coordinates of the survey cities</option>
                                        <option value="2" <?if($this->Player_Model->user->options_select == 2){?>selected="selected"<?}?>>goods</option>
                                    </select>
                                </td>
                            </tr>
                            <?if($this->Player_Model->user->tutorial < 999){?>
                            <tr>
                                <th>training</th>
                                <td>
                                    <select name="tutorialOptions" size="1">
                                        <option value="2"selected>Insert</option>
                                        <option value="-2">disable</option>
                                    </select>
                                </td>
                            </tr>
                            <?}?>
                        </table>
                    </div>
                    <div id="options_debug">
                        <h3>Debugdata</h3>
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <th>Player-ID:</th>
                                <td> <?=$this->Player_Model->user->id?></td>
                            </tr>
                            <tr>
                                <th>Current City-ID: </th>
                                <td><?=$this->Player_Model->user->town?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="centerButton">
                        <input type="submit" class="button" value="Save">
                    </div>
                </form>
            </div>
            <div class="footer"></div>
        </div>
*/ ?>