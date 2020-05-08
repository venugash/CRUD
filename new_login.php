<?php
session_start();
$td=time()-$_SESSION["LAT"];

if ($td<=10) 
	{
		echo"ceubn";
    }
else
{
session_destroy();
header("Location:login.php");
}

?>