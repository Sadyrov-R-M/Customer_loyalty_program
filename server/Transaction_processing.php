<?php

$mysql_host = "Localhost";
$mysql_user = "id12021454_denpavraf";
$mysql_password = "Hdk8M%3S";
$mysql_database = "id12021454_user";

if (isset($_GET["ID_client"])) { $ID_client = $_GET['ID_client'];}
if (isset($_GET["$rejim"])) { $rejim = $_GET['rejim'];}
if (isset($_GET["$summa"])) { $summa = $_GET['summa'];}
if (isset($_GET["$ID_pol"])) { $ID_pol = $_GET['ID_pol'];}

mysql_connect($mysql_host, $mysql_user, $mysql_password);
mysql_select_db($mysql_database);
mysql_set_charset('utf8');

$q = mysql_query("INSERT INTO 'tranzactions' ('ID_client', 'ID_pol', 'rejim', 'summa') VALUES ($kod_rasshifr_cli, $kod_rasshifr_pol, $kod_rasshifr_tran, $kod_rasshifr_sum)");

mysql_close();
echo $q;

$con = mysqli_connect($mysql_host, $mysql_user, $mysql_password);
$statement = mysqli_prepare($con, "INSERT INTO 'tranzactions' ('ID_client', 'ID_pol', 'rejim', 'summa') VALUES ($ID_client, $ID_pol, $rejim, $summa)");
mysqli_stmt_bind_param($statement, "ssss", $ID_client, $ID_pol, $rejim, $summa);
mysqli_stmt_execute($statement);

mysqli_stmt_store_result($statement);
mysqli_stmt_bind_result($statement, $ID_client, $ID_pol, $rejim, $summa);

$response = array();
$response["success"] = false;

while(mysqli_stmt_fetch($statement)){
	$response["success"] = true;
        $response["ID_client"] = $ID_client;
        $response["trans_id"] = $ID_pol;
        $response["sum"] = $rejim;
        $response["points"] = $summa;
    }
echo json_encode($response);
?>
