<?php
/*
 * Game name
 */
$config['game_name'] = 'iZariam';

/*
 * Game worlds
 * Put true if in you database you have the same prefix (alpha_users or beta_users)
 */
$config['alpha'] = TRUE;
$config['beta'] = FALSE;

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
$config['style_url'] = 'http://localhost/design/';   // URL - skin
$config['style_version'] = $config['working_version'];  // Skin version
$config['script_url'] = 'http://localhost/design/';  // URL - scripts
$config['script_version'] = $config['working_version']; // Scripts version
$config['forum_url'] = 'http://localhost/';    // URL - forum

/*
 * Designs
 */
$config['easter'] = FALSE;                           // Easter design
$config['winter'] = FALSE;                           // Winter design
$config['christmas'] = FALSE;                        // Christmas design
$config['halloween'] = FALSE;                        // Halloween design
$config['design_4'] = TRUE;                          // 0.4.5 design

/*
 * Mail config
 */
$config['game_email'] = TRUE;                       // To resolve sending of letters (Adjust SMTP)
$config['email_from'] = 'game@izariam@zzjhons.com';            // The address from which the letter comes

/*
 * Safe
 */
$config['double_login'] = FALSE;                     // Multi-Accounting check

/*
 * Game options
 */
$config['standart_capacity'] = 1500;                 // Default storage capacity
$config['transport_capacity'] = 500;                 // Default cargo capacity
$config['town_queue_size'] = 3;                      // Buildings - construction list size
$config['army_queue_size'] = 3;                      // Army -  construction list size
$config['notes_default'] = 200;                      // Notes length
$config['notes_premium'] = 8192;                     // Premium notes length
$config['trade_route_time'] = 604800;                // Duration of a trading route in seconds

/*
 * News
 */
$config['head_news'] = 'Welcome to ' . $config['game_name'] . '!';

/*
 * Others
 */
$config['happyhour'] = FALSE;
$config['happyhour_duration'] = 3600*60*1;
/*
 * Footer analytics code
 */
$config['analytics'] = '';
?>