<?php

$mysql_host = "Localhost";
$mysql_user = "id12021454_denpavraf";
$mysql_password = "Hdk8M%3S";
$mysql_database = "id12021454_user";

if (isset($_GET["user_id"])) { $user_id = $_GET['user_id'];}


mysql_connect($mysql_host, $mysql_user, $mysql_password);
mysql_select_db($mysql_database);
mysql_set_charset('utf8');

$q = mysql_query("SELECT * FROM 'tranzactions' WHERE 'user_id' = $user_id FOR JSON AUTO);

mysql_close();
echo $q;
?>
