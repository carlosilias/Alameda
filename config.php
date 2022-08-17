<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "crem_alameda";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Error de Conexion.')</script>");
}

?>