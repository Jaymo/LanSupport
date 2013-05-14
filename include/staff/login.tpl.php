<?php defined('OSTSCPINC') or die('Invalid path'); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>LAN SUPPORT::Login</title>
<link rel="stylesheet" href="css/loginNew.css" type="text/css" />
<meta name="robots" content="noindex" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="pragma" content="no-cache" />
</head>
<body id="loginBody">
<div id="loginBox">
	
	<br />
	<form action="login.php" method="post">
	
	  <h1><?=$msg?></h1>
	  <h1></h1>
	<fieldset>
		   
			<legend>Log in</legend>
			<label for="login">Email</label>
			<input type="text" id="name" name="username"/>
			<div class="clear"></div>
			
			<label for="password">Password</label>
			<input type="password" id="pass" name="passwd"/>
			<div class="clear"></div>
			
			
			<div class="clear"></div>
			
			<br />
			
			<input type="submit" style="margin: -20px 0 0 287px;" class="button" name="submit" value="Login"/>	
		</fieldset>
</form>
</div>
<div id="copyRights"></div>
</body>
</html>
