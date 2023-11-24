<?php

require_once "../librerias/Conexion.php";
require_once "../modelos/Azafata.php";
require_once "../modelos/Empresa.php";
require_once "../modelos/Evento.php";

session_start();
// Si me he logueado redirijo al script controladorFrontal.php
/*if (!empty($_SESSION)) {
  header("Location: controladores/controladorFrontal.php");
}*/


function redireccion(string $url): never
{
  exit(header("Location: $url"));
}

if (!empty($_POST)) {

  // buscamos en la base de datos
  $conexion = Conexion::getConnection();

  $email = $_POST["email"];
  $contrasena = md5($_POST["contrasena"]);

  if (isset($_POST["check"])) {
    $sql = "SELECT * FROM empresa WHERE email=:email AND contrasena= :contrasena; ";
    $parametros = array(':email' => $email, ':contrasena' => $contrasena);

    $resultado = $conexion->query($sql, $parametros);

    if ($resultado && $resultado->rowCount() > 0) {

      // Obtener el valor real del resultado
      $empresa = $resultado->fetchObject("Empresa");

      $_SESSION["empresa"] = $empresa;
      $_SESSION["inicio"] = time();

      redireccion("../controladores/controladorFrontal.php?f=mostrarNombre&m=Empresa");
    } else {
      echo "Nombre de usuario o contraseña incorrecto.";
    }
  } else {
    $sql = "SELECT * FROM azafata WHERE email=:email AND contrasena= :contrasena; ";
    $parametros = array(':email' => $email, ':contrasena' => $contrasena);
    $resultado = $conexion->query($sql, $parametros);

    if ($resultado && $resultado->rowCount() > 0) {
      $azafata = $resultado->fetchObject("Azafata");

      $_SESSION["azafata"] = $azafata;
      $_SESSION["inicio"] = time();

      redireccion("http://localhost/eventHost/HomePage");

    } else {
      echo "Nombre de usuario o contraseña incorrecto.";
    }

  }
}
