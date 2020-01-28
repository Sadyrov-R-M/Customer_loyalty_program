<?php
$mysql_host = "Localhost";
$mysql_user = "id12021454_denpavraf";
$mysql_password = "Hdk8M%3S";
$mysql_database = "id12021454_user";
if (isset($_GET["user_id"])) { $user_id = $_GET['user_id'];}

$array = array();
$n = 6;
$string = "";
for ($i=0; $i<$n; $i=$i+1)
{
	$string = $string + random_int(int 0, int 9);
}

echo $string;
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_password);
$statement = mysqli_prepare($con, "UPDATE INTO 'user' ('user_id', 'code') VALUES (?, ?)");
mysqli_stmt_bind_param($statement, "ss", $user_id, $string);
mysqli_stmt_execute($statement);
?>
