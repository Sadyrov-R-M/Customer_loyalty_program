<?php

$mysql_host = "Localhost";
$mysql_user = "id12021454_denpavraf";
$mysql_password = "Hdk8M%3S";
$mysql_database = "id12021454_user";

$con = mysqli_connect($mysql_host, $mysql_user, $mysql_password);
$statement = mysqli_prepare($con, "SELECT * FROM 'clients' ");
mysqli_stmt_execute($statement);

mysqli_stmt_store_result($statement);
mysqli_stmt_bind_result($statement, $client_id, $address, $percent);

$response = array();
$response["success"] = false;

while(mysqli_stmt_fetch($statement)){
	$response["success"] = true;
        $response["client_id"] = $client_id;
        $response["address"] = $address;
        $response["percent"] = $percent;
    }
echo json_encode($response);
?>
