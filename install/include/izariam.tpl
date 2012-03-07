<?php
/*
 * Project: iZariam
 * File: izariam/config/izariam.php & install/include/izariam.php & install/include/izariam.tpl
 * Edited: 07/03/2012
 * By: ZZJHONS
 * Info: zzjhons@gmail.com
 */
/*
 * Game name
 */
$config['game_name'] = '%GAME_NAME%';

/*
 * Game worlds
 * Put true if in you database you have the same prefix (alpha_users or beta_users)
 */
$config['alpha'] = true;
$config['beta'] = false;

/*
 * Universe array
 * Only put if you have the world tables in the database
 * Examples:
 * array('alpha');
 * array('alpha', 'beta');
 */
$config['uni_array'] = array('alpha'); // Only put if you have the world tables in the database

/*
 * Game version
 */
$config['game_version'] = '0.1.0';
$config['working_version'] = '0.0.1';
$config['new_version'] = '0.4.5';

/*
 * URLs
 */
$config['style_url'] = '%STYLE_URL%';   // URL - skin
$config['style_version'] = $config['working_version'];  // Skin version
$config['script_url'] = '%SCRIPT_URL%';  // URL - scripts
$config['script_version'] = $config['working_version']; // Scripts version
$config['forum_url'] = '%FORUM_URL%';    // URL - forum

/*
 * Designs
 */
$config['easter'] = %EASTER%;                           // Easter design
$config['winter'] = %WINTER%;                           // Winter design
$config['christmas'] = %CHRISTMAS%;                        // Christmas design
$config['halloween'] = %HALLOWEEN%;                        // Halloween design
$config['design_4'] = TRUE;                          // 0.4.5 design

/*
 * Mail config
 */
$config['game_email'] = %SMTP%;                       // To resolve sending of letters (Adjust SMTP)
$config['email_from'] = '%EMAIL%';            // The address from which the letter comes

/*
 * Safe
 */
$config['double_login'] = %DOUBLE_LOGIN%;                     // Multi-Accounting check

/*
 * Game options
 */
$config['standart_capacity'] = %STORAGE%;                 // Default storage capacity
$config['transport_capacity'] = %TRANSPORT%;                 // Default cargo capacity
$config['town_queue_size'] = %TOWN_QUEUE%;                      // Buildings - construction list size
$config['army_queue_size'] = %ARMY_QUEUE%;                      // Army -  construction list size
$config['notes_default'] = %NOTES%;                      // Notes length
$config['notes_premium'] = %PREMIUM_NOTES%;                     // Premium notes length
$config['trade_route_time'] = %ROUTE_TIME%;                // Duration of a trading route in seconds

/*
 * News
 */
$config['head_news'] = 'Welcome to ' . $config['game_name'] . '!';

/*
 * Others
 */
$config['happyhour'] = false;
$config['happyhour_duration'] = 3600*60*1;
/*
 * Footer analytics code
 */
$config['analytics'] = '%ANALYTICS%';
?>