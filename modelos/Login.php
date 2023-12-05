<?php

require_once "librerias/Conexion.php";
require_once "modelos/Azafata.php";
require_once "modelos/Empresa.php";
require_once "modelos/Evento.php";

class Login
{
  public string $email;
  public string $contrasena;

  public function __construct()
  {

  }

  public static function comprobarLogin()
  {
    // Si me he logueado redirijo al script controladorFrontal.php
    /*if (!empty($_SESSION)) {
    header("Location: controladores/controladorFrontal.php");
    }*/


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

          return "empresaTrue"; //redireccion("http://localhost/eventHost/HomePageEmpresa");
        } else {
          return "empresaFalse"; //echo "Nombre de usuario o contraseña incorrecto.";
        }
      } else {
        $sql = "SELECT * FROM azafata WHERE email=:email AND contrasena= :contrasena; ";
        $parametros = array(':email' => $email, ':contrasena' => $contrasena);
        $resultado = $conexion->query($sql, $parametros);

        if ($resultado && $resultado->rowCount() > 0) {
          $azafata = $resultado->fetchObject("Azafata");

          $_SESSION["azafata"] = $azafata;
          $_SESSION["inicio"] = time();

          return "azafataTrue"; //redireccion("http://localhost/eventHost/HomePage");

        } else {
          return "azafataFalse"; //echo "Nombre de usuario o contraseña incorrecto.";
        }

      }
    }

  }

  public static function registrar()
  {
    $conexion = Conexion::getConnection();

    if (isset($_POST["check"])) {

      $email = $_POST["email"];
      $contrasena = md5($_POST["contrasena"]);
      $nombre = $_POST["nombre"];

      $sql = "INSERT INTO empresa (nombre,email,contrasena) VALUES (:nom,:ema,:con); ";
      $parametros = array(':nom' => $nombre, ':ema' => $email, ':con' => $contrasena);

      $resultado = $conexion->query($sql, $parametros);

    } else {
      $email = $_POST["email"];
      $contrasena = md5($_POST["contrasena"]);
      $nombre = $_POST["nombre"];
      $apellidos = $_POST["apellidos"];

      $sql = "INSERT INTO azafata VALUES (NULL,:nom,:ape,:ema,NULL,NULL,NULL,NULL,NULL,:con,NULL,NULL,NULL); ";
      $parametros = array(':nom' => $nombre, ':ape' => $apellidos, ':ema' => $email, ':con' => $contrasena);

      $resultado = $conexion->query($sql, $parametros);

    }
  }
}
