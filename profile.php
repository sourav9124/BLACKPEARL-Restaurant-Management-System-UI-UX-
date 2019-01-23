<?php

session_start();
if(isset($_SESSION["logged_in"]))

{
	echo "<h1>PROFILE PAGE</h1>";
	echo "Welcome: ".$_SESSION["logged_in"]["fullname"]."<br><br>";
	echo "<a href='logoff.php'>Logoff?</a>";

}
else
{
	header("Location: profile.php");
}














?>