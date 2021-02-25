<?php

//Database Connection
$db_host = 'localhost';
$db_user = 'root';
$db_password = 'root';
$db_db = 'demo';
$db_port = 8889;

//Connector
$conn = new mysqli($db_host, $db_user, $db_password, $db_db);

//Check connection above
if($conn->connect_error) {
    die("Connection has Failed: " . $conn->connect_error);
}

?>