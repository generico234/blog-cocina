<?php
require_once 'conexion.php';
$username = $_POST['usuario'];
$password = $_POST['password'];
$email = $_POST['email'];


$consulta = "INSERT INTO blog53 VALUES('" . $username . "','" . $email . "', '" . $password . "')";
$conn->query($consulta);
?>