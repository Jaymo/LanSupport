<?php
/*********************************************************************
    offline.php

**********************************************************************/
require_once('client.inc.php');
if($cfg && !$cfg->isHelpDeskOffline()) { 
    @header('Location: index.php'); //Redirect if the system is online.
    include('index.php');
    exit;
}
?>
<html>
<head>
<title>Support Ticket System</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" rightmargin="0" topmargin="0">
<table width="60%" cellpadding="5" cellspacing="0" border="0">
	<tr<td>
        <p>
         <h3>Support Ticket System Offline</h3>
         
         Thank you for your interest in contacting us.<br>
         Our helpdesk is offline at the moment, please check back at a later time.
        </p>
    </td></tr>
</table>
</body>
</html>
