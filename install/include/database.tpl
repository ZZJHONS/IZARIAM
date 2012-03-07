<?php
/*
 * Project: iZariam
 * File: izariam/config/database.php & install/include/database.php & install/include/database.tpl
 * Edited: 07/03/2012
 * By: ZZJHONS
 * Info: zzjhons@gmail.com
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$active_group = "default";
$active_record = TRUE;
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database.
|	['password'] The password used to connect to the database.
|	['database'] The name of the database you want to connect.
*/
$db['default']['hostname'] = "%DBHOST%";
$db['default']['username'] = "%DBUSER%";
$db['default']['password'] = "%DBPASS%";
$db['default']['database'] = "%DBNAME%";
/*
|--------------------------------------------------------------------------
| STOP! You must not edit below this text
|--------------------------------------------------------------------------
*/
$db['default']['dbdriver'] = "mysql";
$db['default']['dbprefix'] = "";
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = "";
$db['default']['char_set'] = "utf8";
$db['default']['dbcollat'] = "utf8_general_ci";