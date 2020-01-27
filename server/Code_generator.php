<?php
$mysql_host = "Localhost";
$mysql_user = "id12021454_denpavraf";
$mysql_password = "Hdk8M%3S";
$mysql_database = "id12021454_user";
if (isset($_GET["user_id"])) { $user_id = $_GET['user_id'];}

mysql_connect($mysql_host, $mysql_user, $mysql_password);
mysql_select_db($mysql_database);
mysql_set_charset('utf8');
$array = array();
$n = 6;
$string = "";
for ($i=0; $i<$n; $i=$i+1)
{
	$string = $string + random_int(int 0, int 9);
}

echo $string;
mysql_query("UPDATE INTO 'user' ('user_id', 'code') VALUES ('$user_id', '$string')");	
mysql_close();
?>
