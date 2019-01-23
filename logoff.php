<?php

session_start();
if(isset($_SESSION["logged_in"]))

{
	$_SESSION=[];
	if(ini_get('session.use_cookies'))
	{
	 setcookie(session_name(),time()-15,"/");

	}
	session_destroy();
	header("Location: login.php");
}
else
{
	header("Location: profile.php");
}