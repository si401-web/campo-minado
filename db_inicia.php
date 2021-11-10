<?php

$server = $_ENV["DB_SERVER"];
$name = $_ENV["DB_NAME"];
$user = $_ENV["DB_USER"];
$pass = $_ENV["DB_PASS"];

$conn = new PDO("mysql:host=$server;dbname=$name", $user, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$conn->exec("
    CREATE TABLE USER (
        ID INT AUTO_INCREMENT PRIMARY KEY,
        NAME VARCHAR(255) NOT NULL,
        BIRTHDAY DATETIME NOT NULL,
        CPF VARCHAR(11) NOT NULL,
        PHONE VARCHAR(11) NOT NULL,
        EMAIL VARCHAR(360) NOT NULL,
        USERNAME VARCHAR(255) NOT NULL,
        PASSWORD VARCHAR(255) NOT NULL
    )
");

$conn->exec("
    CREATE TABLE GAME (
        ID INT AUTO_INCREMENT PRIMARY KEY,
        MODE VARCHAR(8) NOT NULL,
        COLUMNS INT NOT NULL,
        `LINES` INT NOT NULL,
        BOMBS INT NOT NULL,
        RESULT VARCHAR(8) NULL,
        START DATETIME NOT NULL,
        END DATETIME NULL,
        USER_ID INT NOT NULL,
        CONSTRAINT FK_GAME_USER FOREIGN KEY (USER_ID) REFERENCES USER (ID)
    )
");

$conn = null;
