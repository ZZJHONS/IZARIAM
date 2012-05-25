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
        <h1><?=$this->lang->line('options');?></h1>
        <p></p>
    </div>
    <?if($this->Player_Model->user->register_complete == 0 and $this->config->item('game_email')){?>
    <div class="contentBox01h" id="emailInvalidWarning">
        <h3 class="header"><span class="textLabel"><?=$this->lang->line('email_not_confirmed');?></span></h3>
        <div class="content">
            <p><?=$this->lang->line('email_not_confirmed_desc');?></p>
            <div class="centerButton">
                <a class="button" href="<?=$this->config->item('base_url')?>actions/options/validationEmail/<?=$param1?>"><?=$this->lang->line('get_confirm_email');?></a>
            </div>
            <?if ($param2 == 'sended'){?>
            <p class="confirmation">An e-mail with the confirmation link was sent to your permanent e-mail address.</p>
            <?}elseif ($param2 == 'nosended'){?>
            <p class="confirmation">Error! This server have disabled the e-mails.</p>
            <?}?>
        </div>
        <div class="footer"></div>
    </div>
    <?}?>
    <?if($this->session->flashdata('options_error')){?>
    <div class="contentBox01h">
        <h3 class="header"><span class="textLabel"><?=$this->lang->line('error_message');?></span></h3>
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
            <li<?if($param1 == 'account'){?> class="selected"<?}?>><a href="<?=$this->config->item('base_url')?>game/options/account" title="<?=$this->lang->line('account_data');?>"><em><?=$this->lang->line('account_data');?></em></a></li>
            <li<?if($param1 == 'game'){?> class="selected"<?}?>><a href="<?=$this->config->item('base_url')?>game/options/game" title="<?=$this->lang->line('game_options');?>"><em><?=$this->lang->line('game_options');?></em></a></li>
            <li<?if($param1 == 'sso'){?> class="selected"<?}?>><a href="<?=$this->config->item('base_url')?>game/options/sso" title="<?=$this->lang->line('facebook');?>"><em><?=$this->lang->line('facebook');?></em></a></li>
            <li<?if($param1 == 'openid'){?> class="selected"<?}?>><a href="<?=$this->config->item('base_url')?>game/options/openid" title="<?=$this->lang->line('openid');?>"><em><?=$this->lang->line('openid');?></em></a></li>
        </ul>
    </div>
    <div class="option_table">
        <?if ($param1 == 'account') {?>
        <div class="contentBox01h">
            <h3 class="header"><span class="textLabel"><?=$this->lang->line('settings');?></span></h3>
            <div class="content">
                <?$this->load->helper('form');?>
                <?=form_open('actions/options/user/');?>
                    <div id="options_userData">
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <th><?=$this->lang->line('change_player_name');?></th>
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
                        <h3><?=$this->lang->line('change_password');?></h3>
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <th><?=$this->lang->line('old_password');?></th>
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
                                <th><?=$this->lang->line('new_password');?></th>
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
                                <th><?=$this->lang->line('confirm_new_password');?></th>
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
                            'value' => $this->lang->line('save_settings')
                            );?>
                        <?=form_submit($data)?>
                    </div>
                <?=form_close()?>
            </div>
            <div class="footer"></div>
        </div>
        <div class="contentBox01h">
            <h3 class="header"><span class="textLabel"><?=$this->lang->line('change_email_adress');?></span></h3>
            <div class="content">
                <?=form_open('actions/options/email/');?>      
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <th><?=$this->lang->line('change_email_adress');?></th>
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
                            <th><?=$this->lang->line('confirm_email_with_your_password');?></th>
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
                            'value' => $this->lang->line('change_email_adress')
                            );?>
                        <?=form_submit($data)?>
                    </div>
                <?=form_close()?>
            </div>
            <div class="footer"></div>
        </div>
        <div class="contentBox01h" id="deletionMode">
            <h3 class="header"><span class="textLabel"><?=$this->lang->line('delete_player');?></span></h3>
            <div class="content">
                <p><?=$this->lang->line('delete_player_desc');?></p>
                <br />
                <div class="centerButton">
                    <a class="button" href="<?=$this->config->item('base_url')?>game/options_deletion_confirm/"><?=$this->lang->line('delete_player_irretrievably');?></a>
                </div>
                <br />
            </div>
            <div class="footer"></div>
        </div>
        <?}?>
        <?if ($param1 == 'game') {?>
        <div class="contentBox01h">
            <h3 class="header"><span class="textLabel"><?=$this->lang->line('settings');?></span></h3>
            <div class="content">
                <?$this->load->helper('form');?>
                <?=form_open('actions/options/user/');?>
                    <div>
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <th><?=$this->lang->line('display_details_town');?></th>
                                <td>
                                    <select name="citySelectOptions" size="1">
                                        <option value="0"<?if($this->Player_Model->user->options_select == 0){?> selected="selected"<?}?>><?=$this->lang->line('no_details');?></option>
                                        <option value="1"<?if($this->Player_Model->user->options_select == 1){?> selected="selected"<?}?>><?=$this->lang->line('show_coordinates_town_nav');?></option>
                                        <option value="2"<?if($this->Player_Model->user->options_select == 2){?> selected="selected"<?}?>><?=$this->lang->line('trade_good');?></option>
                                    </select>
                                </td>
                            </tr>
                            <?if($this->Player_Model->user->tutorial < 999){?>
                            <tr>
                                <th><?=$this->lang->line('tutorial');?></th>
                                <td>
                                    <select name="tutorialOptions" size="1">
                                        <option value="2"selected><?=$this->lang->line('insert');?></option>
                                        <option value="-2"><?=$this->lang->line('disable');?></option>
                                    </select>
                                </td>
                            </tr>
                            <?}?>
                        </table>
                    </div>
                    <div id="options_debug">
                        <h3><?=$this->lang->line('debugdata');?></h3>
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <th><?=$this->lang->line('player_id');?>:</th>
                                <td><?=$this->Player_Model->user->id?></td>
                            </tr>
                            <tr>
                                <th><?=$this->lang->line('current_city_id');?>: </th>
                                <td><?=$this->Player_Model->user->town?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="centerButton">
                        <?$data = array(
                            'class' => 'button',
                            'value' => $this->lang->line('save_settings')
                        );?>
                        <?=form_submit($data);?>
                    </div>
                <?=form_close()?>
            </div>
            <div class="footer"></div>
        </div>
        <div class="contentBox01h" id="vacationMode">
            <h3 class="header"><span class="textLabel"><?=$this->lang->line('activate_vacation');?></span></h3>
            <div class="content">
                <p><?=$this->lang->line('vacation');?></p>
                <p class="warningFont"><?=$this->lang->line('vacation_warning');?></p>
                <div class="centerButton">
                    <a class="button" href="<?=$this->config->item('base_url')?>game/options_umod_confirm/"><?=$this->lang->line('activate_vacation');?></a>
                </div>
            </div>
            <div class="footer"></div>
        </div>
        <?}?>
        <?if ($param1 == 'sso') {?>
        <div class="contentBox01h" id="facebookOperations">
            <h3 class="header"><span class="textLabel"><?=$this->lang->line('connect_facebook');?></span></h3>
            <div class="content">
                <?$this->load->helper('form');?>
                <?$attributes = array(
                    'id' => 'fbFormConnect',
                    'class' => 'connectForm'
                );?>
                <?=form_open('#', $attributes);?>
                    <!-- <input type="hidden" name="fbConnect" value="1" /> -->
                    <p><?=$this->lang->line('connect_facebook_desc');?></p>
                    <div>
                        <a href="#" id="fbRegBtn" class="fbBtn">
                            <div class="btn-fb">
                                <div class="btn-fb-text"><span class="before"> </span><?=$this->lang->line('connect_izariam_to_facebook');?><span class="after"> </span></div>
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
                <span class="textLabel"><?=$this->lang->line('connect_openid');?></span>
            </h3>
            <div class="content">
                <p><?=$this->lang->line('connect_openid_desc');?></p>
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
                                <div class="provider-name"><?=$this->lang->line('login_via');?>:</div>
                                <img src="<?=$this->config->item('style_url')?>skin/defaultStartpageTemplate/img/openid-google.png"
                                     width="107" height="63" alt="Google" />
                            </div>
                            <div rel="http://me.yahoo.com/" class="openid-provider">
                                <div class="provider-name"><?=$this->lang->line('login_via');?>:</div>
                                <img src="<?=$this->config->item('style_url')?>skin/defaultStartpageTemplate/img/openid-yahoo.png"
                                     width="107" height="63" alt="Yahoo" />
                            </div>
                            <div rel="http://www.myopenid.com/" class="openid-provider">
                                <div class="provider-name"><?=$this->lang->line('login_via');?>:</div>
                                <img src="<?=$this->config->item('style_url')?>skin/defaultStartpageTemplate/img/openid-myopenid.png"
                                     width="107" height="63" alt="MyOpenID" />
                            </div>
                            <div rel="https://www.google.com/accounts/o8/id" class="openid-provider">
                                <div class="provider-name"><?=$this->lang->line('login_via');?>:</div>
                                <img src="<?=$this->config->item('style_url')?>skin/defaultStartpageTemplate/img/openid-blogger.png"
                                     width="107" height="63" alt="Blogger" />
                            </div>
                            <div rel="http://aol.com/" class="openid-provider">
                                <div class="provider-name"><?=$this->lang->line('login_via');?>:</div>
                                <img src="<?=$this->config->item('style_url')?>skin/defaultStartpageTemplate/img/openid-aol.png"
                                     width="107" height="63" alt="AOL" />
                            </div>
                            <div rel="http://me.yahoo.com/" class="openid-provider">
                                <div class="provider-name"><?=$this->lang->line('login_via');?>:</div>
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
                        <input id="oiUrlSubmit" name="oiUrlSubmit" class="showhand button" type="button" value="<?=$this->lang->line('connect_openid');?>" />
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