<?php
session_start();

require_once "../librerias/Conexion.php";
require_once "../modelos/Azafata.php";

/*PRUEBA PARA PROBAR LA CLASE CONEXIÓN Y LA CONEXIÓN CON LA BASE DE DATOS CON PDO*/
$conexion = Conexion::getConnection();

$sql = "SELECT * FROM azafata WHERE idAzafata = :id";
$parametros = array(':id' => 1);

$resultado = $conexion->query($sql, $parametros);

$datos = $resultado->fetchObject("Azafata");

echo "<br><br>";
echo "Nombre: " . $datos->nombre . "<br>";
$azafataPerfil = unserialize($_SESSION["azafata"]);
echo var_dump($azafataPerfil);
echo "<br>";

echo $azafataPerfil->idAzafata;