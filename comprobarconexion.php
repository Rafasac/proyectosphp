<?php
$host = 'localhost';
$dbname = 'bddesarrollo';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $statement = $conn->prepare('SELECT * FROM usuarios WHERE IdUsuario=:IdUsuario');
    $statement->execute(array(':IdUsuario' => 1));
    $resultado = $statement->fetch();
    print_r($resultado);
} catch (PDOException $pe) {
    die("No se pudo conectar a la base de datos:  $dbname :" . $pe->getMessage());
}
