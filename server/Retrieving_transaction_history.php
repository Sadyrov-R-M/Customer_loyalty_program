<?php

$mysql_host = "Localhost";
$mysql_user = "id12021454_denpavraf";
$mysql_password = "Hdk8M%3S";
$mysql_database = "id12021454_user";

if (isset($_GET["user_id"])) { $user_id = $_GET['user_id'];}

$con = mysqli_connect($mysql_host, $mysql_user, $mysql_password);
$statement = mysqli_prepare($con, "SELECT * FROM 'tranzactions' WHERE 'user_id' = ? ");
mysqli_stmt_bind_param($statement, "s", $user_id);
mysqli_stmt_execute($statement);

mysqli_stmt_store_result($statement);
mysqli_stmt_bind_result($statement, $user_id, $trans_id, $sum, $points, $time);

$response = array();
$response["success"] = false;

while(mysqli_stmt_fetch($statement)){
	$response["success"] = true;
        $response["user_id"] = $user_id;
        $response["trans_id"] = $trans_id;
        $response["sum"] = $sum;
        $response["points"] = $points;
        $response["time"] = $time;
    }
echo json_encode($response);
?>
