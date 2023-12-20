<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crudphp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão deu erro: " . $conn->connect_error);
}
?>