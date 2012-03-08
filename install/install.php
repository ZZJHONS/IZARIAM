<?php
/*
 * Project: iZariam
 * File: install/install.php
 * Edited: 08/03/2012
 * By: ZZJHONS
 * Info: zzjhons@gmail.com
 */
if (file_exists('include/database.php') and file_exists('include/db.php') and isset($_POST['importdb'])) {
	include 'database.php';
}
class Install{
	function Install(){
		if(isset($_POST['database'])){
			$this->CreateDBfile();
		} elseif (isset($_POST['config'])) {
			$this->CreateConfigFile();
		} elseif (isset($_POST['server'])) {
			$this->CreateServerFile();
		} elseif (isset($_POST['importdb'])) {
			$this->ImportDB();
		} elseif (isset($_POST['finish'])) {
			$this->ReplaceFiles();
		}
	}

	function CreateDBfile(){
		$file = 'include/database.php';
		$fh = fopen($file, 'w') or die('<br/><br/><br/>Can\'t open file: install\include\database.php');
		$text = file_get_contents("include/database.tpl");
		$text = preg_replace("'%DBHOST%'", $_POST['dbhost'], $text);
		$text = preg_replace("'%DBUSER%'", $_POST['dbuser'], $text);
		$text = preg_replace("'%DBPASS%'", $_POST['dbpass'], $text);
		$text = preg_replace("'%DBNAME%'", $_POST['dbname'], $text);
		fwrite($fh, $text);
		fclose($fh);
		$file2 = 'include/db.php';
		$fh2 = fopen($file2, 'w') or die('<br/><br/><br/>Can\'t open file: install\include\db.php');
		$text2 = file_get_contents("include/db.tpl");
		$text2 = preg_replace("'%HOST%'", $_POST['dbhost'], $text2);
		$text2 = preg_replace("'%USER%'", $_POST['dbuser'], $text2);
		$text2 = preg_replace("'%PASS%'", $_POST['dbpass'], $text2);
		$text2 = preg_replace("'%NAME%'", $_POST['dbname'], $text2);
		fwrite($fh2, $text2);
		fclose($fh2);
		if(file_exists('include/database.php') and file_exists('include/db.php')){
			header('Location: index.php?step=2');
		}else{
			header('Location: index.php?step=1&error=1');
		}
	}

	function CreateConfigFile(){
		$file = 'include/config.php';
		$fh = fopen($file, 'w') or die('<br/><br/><br/>Can\'t open file: install\include\config.php');
		$text = file_get_contents("include/config.tpl");
		$text = preg_replace("'%BASE_URL%'", $_POST['base_url'], $text);
		fwrite($fh, $text);
		if(file_exists('include/config.php')){
			header('Location: index.php?step=3');
		}else{
			header('Location: index.php?step=2&error=1');
		}
		fclose($fh);
	}

	function CreateServerFile(){
		$file = 'include/izariam.php';
		$fh = fopen($file, 'w') or die('<br/><br/><br/>Can\'t open file: install\include\izariam.php');
		$text = file_get_contents("include/izariam.tpl");
		$text = preg_replace("'%GAME_NAME%'", $_POST['game_name'], $text);
		$text = preg_replace("'%STYLE_URL%'", $_POST['style_url'], $text);
		$text = preg_replace("'%SCRIPT_URL%'", $_POST['script_url'], $text);
		$text = preg_replace("'%FORUM_URL%'", $_POST['forum_url'], $text);
		$text = preg_replace("'%EASTER%'", $_POST['easter'], $text);
		$text = preg_replace("'%WINTER%'", $_POST['winter'], $text);
		$text = preg_replace("'%CHRISTMAS%'", $_POST['christmas'], $text);
		$text = preg_replace("'%HALLOWEEN%'", $_POST['halloween'], $text);
		$text = preg_replace("'%SMTP%'", $_POST['smtp'], $text);
		$text = preg_replace("'%EMAIL%'", $_POST['email'], $text);
		$text = preg_replace("'%DOUBLE_LOGIN%'", $_POST['double_login'], $text);
		$text = preg_replace("'%STORAGE%'", $_POST['storage'], $text);
		$text = preg_replace("'%TRANSPORT%'", $_POST['transport'], $text);
		$text = preg_replace("'%TOWN_QUEUE%'", $_POST['town_queue'], $text);
		$text = preg_replace("'%ARMY_QUEUE%'", $_POST['army_queue'], $text);
		$text = preg_replace("'%NOTES%'", $_POST['notes'], $text);
		$text = preg_replace("'%PREMIUM_NOTES%'", $_POST['premium_notes'], $text);
		$text = preg_replace("'%ROUTE_TIME%'", $_POST['route_time'], $text);
		$text = preg_replace("'%ANALYTICS%'", $_POST['analytics'], $text);
		fwrite($fh, $text);
		if(file_exists('include/izariam.php')){
			header('Location: index.php?step=4');
		}else{
			header('Location: index.php?step=3&error=1');
		}
		fclose($fh);
	}

	function ImportDB(){
		global $database;
		$str = file_get_contents('include/database.sql');
		$str = preg_replace("'%PREFIX%'", 'alpha', $str);
		$result = $database->mysql_exec_batch($str);
		if($result){
			header('Location: index.php?step=5');
		}else{
			header('Location: index.php?step=3&error=1');
		}
	}

	function ReplaceFiles(){
		$file = 'include/index.php';
		$fh = fopen($file, 'w') or die('<br/><br/><br/>Can\'t open file: install\include\index.php');
		$text = file_get_contents("include/index.tpl");
		fwrite($fh, $text);
		fclose($fh);
		rename("include/index.php","../index.php");
		rename("include/database.php","../izariam/config/database.php");
		rename("include/config.php","../izariam/config/config.php");
		rename("include/izariam.php","../izariam/config/izariam.php");
		header('Location: ../index.php');
	}
};
$install = new Install;
?>