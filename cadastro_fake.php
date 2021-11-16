<?php

require "db_models.php";

execute("INSERT INTO USER
        (NAME, BIRTHDAY, CPF, PHONE, EMAIL, USERNAME, PASSWORD)
    VALUES
        ('player', '2021-11-16', '-', '-', '-', 'username', 'password')
");

$lastCreated = execute("
    SELECT ID
        FROM USER
        ORDER BY ID DESC
");

$userID = $lastCreated->fetch()["ID"];

session_start();
$_SESSION["user_id"] = $userID;

?>