<?php
// Connect to a MySQL database using PHP PDO
$dsn      = 'mysql:host=localhost;dbname=gabriel_db;';
$login    = 'acronym';
$password = 'password';
$options  = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");
$pdo = new PDO($dsn, $login, $password, $options);