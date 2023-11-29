<?php

require_once "../controladores/Controller.php";
require_once "../modelos/Login.php";

class LoginController extends Controller
{
  public function mostrarLogin()
  {
    $this->render("login.php.twig", [

    ]);
  }
  public function comprobarLogin()
  {
    if (Login::comprobarLogin() == "empresaTrue") {
      header("Location: /eventHost/HomePageEmpresa");
    } else if (Login::comprobarLogin() == "azafataTrue") {
      header("Location: /eventHost/HomePage");
    } else {
      echo "Usuario o contraseña incorrecto";
    }
  }

  public function mostrarRegister()
  {
    $this->render("register.php.twig", [

    ]);
  }

  public function registrar()
  {
    Login::registrar();
    header("Location: /eventHost/index.php");
  }
}