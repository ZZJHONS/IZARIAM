<div id="passwordLost">
    <h2>Forgot your password?</h2>
    <div id="pwLost">
        <form id="pwLostForm" method="post" action="<?=$this->config->item('base_url')?>">
            <input type="hidden" name="action" value="sendPassword">
            <div class="input-wrap">
                <label for="serverPasswordLost">World</label>
                <select name="universe" id="serverPasswordLost" class="validate[required]">
                    <option selected="" class="inUse" value="alpha" fburl="" cookiename="">Alpha</option>
                    <?if($this->config->item('beta')){?>
                    <option class="" value="beta" fburl="" cookiename="">Beta</option>
                    <?}?>
                </select>
            </div>
            <div class="input-wrap ">
                <label for="emailPasswordLost">E-mail</label>
                <input id="emailPasswordLost" name="email" type="text" value="" class="validate[required,custom[email]]">
            </div>
            <button type="submit" id="formSubmit" class="btn-login btn-big">Request password</button>
            <br class="clearfloat">
            <!-- <a href="javascript:void(0)" id="pwLostFb" onclick="hidepwLostForm()">Request password for Facebook users</a> -->
            <?if(isset($errors) and sizeof($errors) >= 1){?>
            <?foreach ($errors as $error){?>
            <br>
            <span class="error"><?=$error?></span>
            <?}?>
            <?}elseif(isset($sended)){?>
            <br>
            <span class="success"><?=$this->lang->line('success_password')?></span>
            <?/*}else{?>
            <br><br>
            <span class="error"><?=$this->lang->line('error_email')?></span>
            <?*/}?>
        </form>
        <!--
        <form id="pwLostFormFb" name="pwLostFormFb" method="post" action="<?=$this->config->item('base_url')?>">
            <div class="input-wrap">
                <label for="serverPasswordLostFb">World</label>
                <select name="uni_url" id="serverPasswordLostFb" class="validate[required]">
                    <option selected="" class="inUse" value="alpha" fburl="" cookiename="">Alpha</option>
                    <option class="" value="beta" fburl="" cookiename="">Beta</option>
                </select>
            </div>
            <div class="">
                <a href="javascript:void(0)" id="fbPasswordLostBtn" class="fbBtn">
                    <div class="btn-fb">
                        <div class="btn-fb-text">Request password</div>
                    </div>
                </a>
                <a href="javascript:void(0)" id="pwLostRegular">Request password without Facebook</a>
            </div>
        </form>
        -->
    </div>
    <div id="pwLostInfo">
        <h4>Have you forgotten your password?</h4>
        <p>No problem. Simply enter your e-mail address in the form and click send. Your password will then be sent to you.</p>
    </div>
</div>