<?php

require_once "../controladores/Controller.php";
require_once "../modelos/Azafata.php";



class AzafataController extends Controller
{
  public $azafata;


  public function mostrarNombre()
  {
    $this->render("../vistas/homePage.php.twig", ["nombre" => "Hola"]);
  }

}
