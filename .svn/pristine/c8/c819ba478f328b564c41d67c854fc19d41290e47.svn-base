<?
//config file

if ('config.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Do not load this page directly');

$host = "localhost";
//$host = "yourserver.net";
$username = "root"; //username for database here
$password = "hilda"; //password for database here
$database =  "ticket"; //name of your database here

$limit = 10; //entries displayed per page
$badwords = array("fuck","bitch","cunt");  //add more bad words here

$mysql_link = mysql_pconnect($host, $username, $password) 
               or die( "Unable to connect to SQL server"); 
mysql_select_db( "$database") or die( "Unable to select database"); 

//error_reporting(E_ALL ^ E_NOTICE);

?>