<?php

require_once "../controladores/Controller.php";
require_once "../modelos/Empresa.php";

class EmpresaController extends Controller
{
  public function mostrarNombre()
  {
    $this->render("homePageEmpresa.php.twig", [
      "nombre" => $_SESSION["empresa"]->getNombre()
    ]);
  }

}


