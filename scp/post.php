<?

include ("config.php");

session_start();


$name = $_REQUEST['name'];

$message = $_REQUEST['message'];

$name = mysql_real_escape_string(trim(addslashes($name)));
$message = strip_tags_attributes(trim(addslashes($message)));

//remove line break and &
$message = str_replace("\r", "", $message);
$message = str_replace("\n", "", $message);
$message = str_replace("&", "%26", $message);

//filter bad words
for($x=0; $x< count($badwords); $x++) 
{ 
$name = eregi_replace($badwords[$x], "****", $name); 
$message = eregi_replace($badwords[$x], "****", $message); 
} 




function strip_tags_attributes($sSource, $aAllowedTags = array(), $aDisabledAttributes = array('onclick', 'ondblclick', 'onkeydown', 'onkeypress', 'onkeyup', 'onload', 'onmousedown', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onunload'))
    {
        if (empty($aDisabledAttributes)) return strip_tags($sSource, implode('', $aAllowedTags));

        return preg_replace('/<(.*?)>/ie', "'<' . preg_replace(array('/javascript:[^\"\']*/i', '/(" . implode('|', $aDisabledAttributes) . ")[ \\t\\n]*=[ \\t\\n]*[\"\'][^\"\']*[\"\']/i', '/\s+/'), array('', '', ' '), stripslashes('\\1')) . '>'", strip_tags($sSource, implode('', $aAllowedTags)));
}

//Add into database


if ($name=='' && $message==''){
  die('Error encountered.');
  exit;
}

$insert = "INSERT INTO message_board(name, post_dt, message) VALUES('$name', now(), '$message')";
$mysql_insert = mysql_query($insert)
	or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $query . "<br />\nError: (" . mysql_errno() . ") " . mysql_error()); 

exit;

?>
