<?php
  // DataBase Information
$servername = "localhost";     // Your Server Name
$dbUsername = "root";         // Your Database Username
$dbPassword = "dodgeishere"; // Your Database Password
$dbName     = "logsys";     // Your Database Name
 //Variable Connect
$conn = mysqli_connect($servername,$dbUsername,$dbPassword,$dbName);

if (!$conn) {
  die("Connection Failed: ".mysqli_connect_error());
}

