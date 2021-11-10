<?php
session_start();
ob_start();

unset($_SESSION['user_id']);
header("Location: login.php");