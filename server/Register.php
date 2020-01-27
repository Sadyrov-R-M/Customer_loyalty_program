<?php
    $con = mysqli_connect("Localhost", "id12021454_denpavraf", "Hdk8M%3S", "id12021454_user");

    $surname = $_POST["surname"];
    $name = $_POST["name"];
    $patronymic = $_POST["patronymic"];
    $login = $_POST["login"];
    $password = $_POST["password"];

    $statement = mysqli_prepare($con, "INSERT INTO user (surname, name, patronymic, login, password) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($statement, "sssss", $surname, $name, $patronymic, $login, $password);
    mysqli_stmt_execute($statement);

    $response = array();
    $response["success"] = true;

    echo json_encode($response);
?>
