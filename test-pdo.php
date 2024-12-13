<?php

$host = "a-mysql.docker_mob";
$username = "mobillett";
$password = "FleskBurger";

$pdo = new PDO("mysql:host=" . $host, $username, $password);

var_dump($pdo);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->query("SHOW DATABASES");
var_dump($statement);
