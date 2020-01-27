// получить список всех клиентов
// записать все в JSON и отправить пользователю

<?php

$mysql_host = "Localhost";
$mysql_user = "id12021454_denpavraf";
$mysql_password = "Hdk8M%3S";
$mysql_database = "id12021454_user";

mysql_connect($mysql_host, $mysql_user, $mysql_password);
mysql_select_db($mysql_database);
mysql_set_charset('utf8');

$q = mysql_query("SELECT * FROM 'clients' FOR JSON AUTO);

mysql_close();
echo $q;
?>
