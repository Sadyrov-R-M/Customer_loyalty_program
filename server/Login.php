<?php
    $con = mysqli_connect("Localhost", "id12021454_denpavraf", "Hdk8M%3S", "id12021454_user");

    $login = $_POST["login"];
    $password = $_POST["password"];

    $statement = mysqli_prepare($con, "SELECT * FROM user WHERE login = ? AND password = ?");
    mysqli_stmt_bind_param($statement, "ss", $login, $password);
    mysqli_stmt_execute($statement);

    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $user_id, $surname, $name, $patronymic, $login, $password);

    $response = array();
    $response["success"] = false;

    while(mysqli_stmt_fetch($statement)){
        $response["success"] = true;
        $response["surname"] = $surname;
        $response["name"] = $name;
        $response["patronymic"] = $patronymic;
        $response["login"] = $login;
        $response["password"] = $password;
    }

    echo json_encode($response);
?>
