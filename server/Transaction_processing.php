<?php

$mysql_host = "Localhost";
$mysql_user = "id12021454_denpavraf";
$mysql_password = "Hdk8M%3S";
$mysql_database = "id12021454_user";

if (isset($_GET["kod_cli"])) { $kod_cli = $_GET['kod_cli'];}
if (isset($_GET["$kod_tran"])) { $kod_tran = $_GET['kod_tran'];}
if (isset($_GET["$kod_sum"])) { $kod_sum = $_GET['kod_sum'];}
if (isset($_GET["$kod_pol"])) { $kod_pol = $_GET['kod_pol'];}

mysql_connect($mysql_host, $mysql_user, $mysql_password);
mysql_select_db($mysql_database);
mysql_set_charset('utf8');

$q = mysql_query("INSERT INTO 'tranzactions' ('ID_client', 'ID_pol', 'rejim', 'summa') VALUES ($kod_rasshifr_cli, $kod_rasshifr_pol, $kod_rasshifr_tran, $kod_rasshifr_sum)");


mysql_close();
echo $q;
?>
