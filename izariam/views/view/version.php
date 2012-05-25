<?php
/*
 * Project: iZariam
 * File: izariam/views/view/version.php
 * Edited: 07/03/2012
 * By: ZZJHONS
 * Info: zzjhons@gmail.com
 */
?>
<div id="mainview">
    <h1><?=$this->lang->line('changelog')?></h1>
    <table cellpadding="0" cellspacing="0" class="table01">
        <tr>
            <th><?=$this->lang->line('version')?></th>
            <th><?=$this->lang->line('date')?></th>
            <th><?=$this->lang->line('description')?></th>
        </tr>
        <tr>
            <td class="version">0.1.0</td>
            <td class="version">07.03.2012</td>
            <td class="desc">
            	<ul>
                    <li>Made install script</li>
                    <li>Started Admin Panel (added new row in database)</li>
            		<li>Alphabetical reorder to view_model</li>
            		<li>Building construction lis full fixed</li>
            		<li>Reordered to alphabetical order actions controller and translated</li>
            		<li>
            			Improved - Options page redesigned and full translated
            			<ul>
            				<li>Can disable Tutorial</li>
            				<li>Can Change your password</li>
            				<li>Can Change your username</li>
            				<li>Show errors</li>
            				<li>Edit show town details</li>
            				<li>Add deletion template</li>
            			</ul>
            		</li>
            		<li>Fixed - Show world error when try to login or register in world wich don't exist</li>
            		<li>Updated - iZariam HomePage</li>
            		<li>Updated - All external game pages (error, lost pasword, etc.) appear in the content of game homepage</li>
            		<li>Added - Ikart images</li>
            		<li>Added - iZariam Animator images</li>
            		<li>Bugfix - Change City</li>
					<li>
						Bugfix - Highscore:
						<ul>
							<li>More than the first 100 positions</li>
							<li>Master builders highscore</li>
							<li>Buildings levels highscore</li>
							<li>Scientists highscore</li>
							<li>Levels of research highscore</li>
							<li>Military highscore (No 100%)</li>
							<li>Gold highscore (No 100%)</li>
						</ul>
					</li>
					<li>Improved - militaryAdvisorMilitaryMovements</li>
					<li>Improved - militaryAdvisorCombatReports</li>
					<li>Added - militaryAdvisorCombatReportsArchive</li>
					<li>Added - Version</li>
					<li>Added - Credits</li>
					<li>Translation updated (E-mail)</li>
				</ul>
			</td>
        </tr>
        <tr class="alt">
            <td class="version">0.0.1.1</td>
            <td class="version">29.01.2012</td>
            <td class="desc">
            	<ul>
					<li>Bugfix - Many problems with the resource transportation system</li>
					<li>Bugfix - Found/create new colony</li>
					<li>Bugfix - Move the city</li>
					<li>Bugfix - Send messages to others</li>
					<li>
						Bugfix - Assignation:
						<ul>
							<li>In academy (Scientists)</li>
							<li>In barracks (Units)</li>
							<li>In Forest (Workers) and donation</li>
							<li>In Vines (Workers) and donation</li>
							<li>In Quarry (Workers) and donation</li>
							<li>In Crystal Mine (Workers) and donation</li>
							<li>In Sulfur Pit (Workers) and donation</li>
						</ul>
					</li>
					<li>Bugfix - Rename the colony and city.</li>
					<li>Translation updated</li>
				</ul>
			</td>
        </tr>
        <tr>
            <td class="version">0.0.1</td>
            <td class="version">09.01.2012</td>
            <td class="desc">
            	<ul>
					<li>iZariam released</li>
				</ul>
			</td>
        </tr>
	</table>
</div>