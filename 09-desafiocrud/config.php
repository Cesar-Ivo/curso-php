<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "padariata";

$conn = new mysqli($servername, $username, $password, $dbname);
//Verificando se a conexão deu certo:
    if ($conn->connect_error) {
        die("Conexão falhou: ".$conn->connect_error);
}
?>