<?php
/*********************************************************************
    config.php
**********************************************************************/

#Disable direct access.
if(!strcasecmp(basename($_SERVER['SCRIPT_NAME']),basename(__FILE__)) || !defined('ROOT_PATH')) die('kwaheri rafiki!');

#Install flag
define('OSTINSTALLED',TRUE);


# Encrypt/Decrypt secret key 
define('SECRET_SALT','6D72CDA8A83FF80');

#Default admin email. Used only on db connection issues and related alerts.
define('ADMIN_EMAIL','jaymo@my-it-provider.com');

#Mysql Login info
define('DBTYPE','mysql');
define('DBHOST','localhost'); 
define('DBNAME','ticket');
define('DBUSER','root');
define('DBPASS','hilda');

#Table prefix
define('TABLE_PREFIX','ras_');

?>
