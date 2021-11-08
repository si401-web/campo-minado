<?php

$server = $_ENV["DB_SERVER"];
$name = $_ENV["DB_NAME"];
$user = $_ENV["DB_USER"];
$pass = $_ENV["DB_PASS"];

$conn = new PDO("mysql:host=$server;dbname=$name", $user, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$conn->exec("
    CREATE TABLE GAME (
        ID INT AUTO_INCREMENT PRIMARY KEY,
        MODE VARCHAR(8) NOT NULL,
        COLUMNS INT NOT NULL,
        `LINES` INT NOT NULL,
        BOMBS INT NOT NULL,
        RESULT VARCHAR(8) NULL,
        START DATETIME NOT NULL,
        END DATETIME NULL
    )
");

$conn = null;
