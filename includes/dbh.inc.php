<?php
$host = getenv('MYSQL_HOST');
$database = getenv('MYSQL_DATABASE');
$username = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');

$conexion = mysqli_connect($host, $username, $password, $database);

if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}
