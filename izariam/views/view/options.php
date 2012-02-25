<?
/*
 * Project: iZariam
 * Edited: 25/02/2012
 * By: ZZJHONS
 * Info: zzjhons@gmail.com
 */
?>
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
                    </div>
                <?=form_close()?>
            </div>
            <div class="footer"></div>
        </div>
        <div class="contentBox01h">
            <h3 class="header"><span class="textLabel">Change e-mail-address</span></h3>
            <div class="content">
                <?=form_open('actions/options/email/');?>      
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
                            </td>
                        </tr>
                    </table>
                    <div class="centerButton">
                        <?$data = array(
                            'class' => 'button',
                            'value' => 'Change e-mail-address'
                            );?>
                        <?=form_submit($data)?>
                    </div>
                <?=form_close()?>
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
                    </div>
                <?=form_close()?>
            </div>
            <div class="footer"></div>
        </div>
        <div class="contentBox01h" id="vacationMode">
            <h3 class="header"><span class="textLabel">Activate vacation mode</span></h3>
            <div class="content">
                <p>You can activate vacation mode here. What this means is that your game account will not be deleted if you are inactive for too long and your cities will not be attacked during that time. Your workers and scientists will also be on holiday and will not be working. So that vacation mode is not taken advantage of, your holiday has to last for a minimum of 48 hours. You will not be able to play Ikariam during this time. After those two days, your holiday will automatically come to an end the next time you log in.</p>
                <p class="warningFont">Caution! Fleets and armies that are outside your cities will be dispersed and will return to their home towns if you activate vacation mode! Goods on board will all be lost!</p>
                <div class="centerButton">
                    <a class="button" href="<?=$this->config->item('base_url')?>game/options_umod_confirm/">Activate vacation mode</a>
                </div>
            </div>
            <div class="footer"></div>
        </div>
        <?}?>
        <?if ($param1 == 'sso') {?>
        <div class="contentBox01h" id="facebookOperations">
            <h3 class="header"><span class="textLabel">Connect Facebook account</span></h3>
            <div class="content">
                <?$this->load->helper('form');?>
                <?$attributes = array(
                    'id' => 'fbFormConnect',
                    'class' => 'connectForm'
                );?>
                <?=form_open('#', $attributes);?>
                    <!-- <input type="hidden" name="fbConnect" value="1" /> -->
                    <p>You can connect your existing Facebook account to your Ikariam account here. This means that you can directly log in to the game with a simple click on the homepage. (Providing that you are already logged in to Facebook. If this is not the case, you will automatically be forwarded to Facebook so that you can log in.)</p>
                    <div>
                        <a href="#" id="fbRegBtn" class="fbBtn">
                            <div class="btn-fb">
                                <div class="btn-fb-text"><span class="before"> </span>Connect Ikariam to Facebook!<span class="after"> </span></div>
                            </div>
                        </a>
                    </div>
                <?=form_close()?>
            </div>
            <div class="footer"></div>
        </div>
        <?}?>
        <?if ($param1 == 'openid') {?>
        <div class="contentBox01h" id="openidOperationsConnect">
            <h3 class="header">
                <span class="textLabel">Connect OpenId account</span>
            </h3>
            <div class="content">
                <p>You can connect an existing OpenId account to your Ikariam account here. This means you can directly log in to the game by simply clicking on the home page.</p>
                <?$this->load->helper('form');?>
                <?$attributes = array(
                    'id' => 'openIDForm',
                    'name' => 'oiConnect'
                );?>
                <?=form_open('#', $attributes);?>
                <!-- <form action="#" id="openIDForm" name="oiConnect" method="post"> -->
                    <div id="options_oiurl">
                        <?=form_label('OpenID services', 'authProvidersList')?>
                        <!-- <label for="authProvidersList">OpenID services</label> -->
                        <div id="openIDProviders" class="clearfix">
                           <div rel="https://www.google.com/accounts/o8/id" class="openid-provider">
                                <div class="provider-name">Login via:</div>
                                <img src="<?=$this->config->item('style_url')?>skin/defaultStartpageTemplate/img/openid-google.png"
                                     width="107" height="63" alt="Google" />
                            </div>
                            <div rel="http://me.yahoo.com/" class="openid-provider">
                                <div class="provider-name">Login via:</div>
                                <img src="<?=$this->config->item('style_url')?>skin/defaultStartpageTemplate/img/openid-yahoo.png"
                                     width="107" height="63" alt="Yahoo" />
                            </div>
                            <div rel="http://www.myopenid.com/" class="openid-provider">
                                <div class="provider-name">Login via:</div>
                                <img src="<?=$this->config->item('style_url')?>skin/defaultStartpageTemplate/img/openid-myopenid.png"
                                     width="107" height="63" alt="MyOpenID" />
                            </div>
                            <div rel="https://www.google.com/accounts/o8/id" class="openid-provider">
                                <div class="provider-name">Login via:</div>
                                <img src="<?=$this->config->item('style_url')?>skin/defaultStartpageTemplate/img/openid-blogger.png"
                                     width="107" height="63" alt="Blogger" />
                            </div>
                            <div rel="http://aol.com/" class="openid-provider">
                                <div class="provider-name">Login via:</div>
                                <img src="<?=$this->config->item('style_url')?>skin/defaultStartpageTemplate/img/openid-aol.png"
                                     width="107" height="63" alt="AOL" />
                            </div>
                            <div rel="http://me.yahoo.com/" class="openid-provider">
                                <div class="provider-name">Login via:</div>
                                <img src="<?=$this->config->item('style_url')?>skin/defaultStartpageTemplate/img/openid-flicker.png"
                                     width="107" height="63" alt="Flickr" />
                            </div>
                        </div>
                        <div id="openIDUrlText" class="input-wrap long-wrap">
                            <?=form_label('OpenID URL', 'openIDUrl');?>
                            <?$data = array(
                                'id' => 'openIDUrl',
                                'name' => 'oiUrl',
                                'value' => ''
                            );?>
                            <?=form_input($data);?>
                        </div>
                        <script type="text/javascript">
                            // get all the OpenID buttons
                            openIdProviderButtons = YAHOO.util.Dom.getElementsByClassName("openid-provider");
                            // on click get oi adress from buttons
                            // and enter into OpenID text field
                            YAHOO.util.Event.addListener(openIdProviderButtons, "click",
                            function(){
                                YDom.get("openIDUrl").value = this.getAttribute('rel');
                            });
                        </script>
                        <input id="oiUrlSubmit" name="oiUrlSubmit" class="showhand button" type="button" value="Connect OpenId account" />
                    </div>
                <?=form_close();?>
            </div>
            <div class="footer"></div>
        </div>
        <script type="text/javascript" src="<?=$this->config->item('script_url')?>js/auth.js"></script>
        <script type="text/javascript">
            function oiStartAuth() {
                // auth configuration object
                authConfig = {
                    mode: 2,
                    callback: 'oiFinishAuth',
                    params: { oiUrl: YAHOO.util.Dom.get('openIDUrl').value }
                }
                // start auth process
                showAuthPopup(authConfig); // see auth.js
            }
            function oiFinishAuth() {
            //alert('done!')
                YDom.get("openIDForm").submit();
            }
            YEvent.addListener("oiUrlSubmit", "click", oiStartAuth);
        </script>
        <?}?>
    </div>
</div>