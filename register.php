<?php
    $con = mysqli_connect("localhost:3307", "beProAdmin", "123456", "bepro");
    if(mysqli_connect_errno()){
        echo("db ���� ���� : ". mysqli_connect_error());
    }
    mysqli_set_charset($con, "utf8");

    $userNICK = $_POST["userNick"];
    $userPWD = $_POST["userPassword"];
    $userEMAIL = $_POST["userEmail"];
    
    $statement = mysqli_prepare($con, "INSERT INTO user (user_nickname, user_password, user_email) VALUES (?,?,?)");
    $bind = mysqli_Stmt_bind_param($statement, "sss", $userNICK, $userPWD, $userEMAIL);
    
    mysqli_stmt_execute($statement);

    $response = array();
    $response["success"] = true;

    echo json_encode($response);
?>