<?php 

/*$server="10.162.21.12";
$db="sw_gunda";
$u="gunda";
$p="gunda"; 
*/

$server="localhost";
$db="db";
$u="root";
$p=""; 



if($server)
{ 
	$link = mysql_pconnect($server,$u,$p);
	mysql_select_db ($db,$link);
}
else
{
	echo "<font color='#FF0000' ><b> Server is not activated </b></font>";
	exit();
}


?>