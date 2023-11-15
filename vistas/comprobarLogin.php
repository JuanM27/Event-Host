<?php

require_once "../librerias/Conexion.php";

session_start(); // "Iniciamos la sesión"	

// Si me he logueado redirijo al script series.php
if (!empty($_SESSION))
  header("Location: homePage.php.twig");

/**	 
 */
function redireccion(string $url): never
{
  exit(header("Location: $url"));
}

//
if (!empty($_POST)):

  // buscamos en la base de datos
  $conexion = Conexion::getConnection();

  $email = $_POST["email"];
  $contrasena = md5($_POST["contrasena"]);

  $sql = "SELECT * FROM azafata WHERE email=:email AND contrasena= :contrasena; ";
  $parametros = array(':email' => $email, ':contrasena' => $contrasena);

  $resultado = $conexion->query($sql, $parametros);

  if ($resultado && $resultado->rowCount() > 0):
    //if (($email=="bruce@wayne.com") && ($pass=="iambatman")):

    require_once "../modelos/Azafata.php";
    //$usuario = new Usuario("Bruce", "Wayne", "bruce@wayne.com") ;
    $azafata = $resultado->fetchObject("Azafata");

    $_SESSION["azafata"] = serialize($azafata);
    $_SESSION["inicio"] = time();

    redireccion("homePage.php.twig");
  else:
    echo "Nombre de usuario o contraseña incorrecto.";
  endif;

endif;