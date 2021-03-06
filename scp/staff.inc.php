<?php
/*************************************************************************
    staff.inc.php
    
**********************************************************************/
if(basename($_SERVER['SCRIPT_NAME'])==basename(__FILE__)) die('Kwaheri rafiki!'); //Say bye to our friend..
if(!file_exists('../main.inc.php')) die('Fatal error..get tech support');
define('ROOT_PATH','../'); //Path to the root dir.
require_once('../main.inc.php');

if(!defined('INCLUDE_DIR')) die('Fatal error');

/*Some more include defines specific to staff only */
define('STAFFINC_DIR',INCLUDE_DIR.'staff/');
define('SCP_DIR',str_replace('//','/',dirname(__FILE__).'/'));

/* Define tag that included files can check */
define('OSTSCPINC',TRUE);
define('OSTSTAFFINC',TRUE);

/* Tables used by staff only */
define('KB_PREMADE_TABLE',TABLE_PREFIX.'kb_premade');


/* include what is needed on staff control panel */

require_once(INCLUDE_DIR.'class.staff.php');
require_once(INCLUDE_DIR.'class.nav.php');


/* First order of the day is see if the user is logged in and with a valid session.
   User must be valid beyond this point 
   ONLY super admins can access the helpdesk on offline state.
*/

function staffLoginPage($msg) {
    $_SESSION['_staff']['auth']['dest']=THISPAGE;
    $_SESSION['_staff']['auth']['msg']=$msg;
    require(SCP_DIR.'login.php');
    exit;
}

$thisuser = new StaffSession($_SESSION['_staff']['userID']); /*always reload???*/
//1) is the user Logged in for real && is staff.
if(!is_object($thisuser) || !$thisuser->getId() || !$thisuser->isValid()){
    $msg=(!$thisuser || !$thisuser->isValid())?'Authentication Required':'Session timed out due to inactivity';
    staffLoginPage($msg);
    exit;
}

//2) if not super admin..check system and group status
if(!$thisuser->isadmin()){
    if($cfg->isHelpDeskOffline()){
        staffLoginPage('System Offline');
        exit;
    }

    if(!$thisuser->isactive() || !$thisuser->isGroupActive()) {
        staffLoginPage('Access Denied. Contact Admin');
        exit;
    }
}

//Keep the session activity alive
$thisuser->refreshSession();
//Set staff's timezone offset.
$_SESSION['TZ_OFFSET']=$thisuser->getTZoffset();
$_SESSION['daylight']=$thisuser->observeDaylight();

define('AUTO_REFRESH_RATE',$thisuser->getRefreshRate()*60);

//Clear some vars. we use in all pages.
$errors=array();
$msg=$warn=$sysnotice='';
$tabs=array();
$submenu=array();



$nav = new StaffNav(strcasecmp(basename($_SERVER['SCRIPT_NAME']),'admin.php')?'staff':'admin');
//Check for forced password change.
if($thisuser->forcePasswdChange()){
    require('profile.php'); //profile.php must request this file as require_once to avoid problems.
    exit;
}


?>
