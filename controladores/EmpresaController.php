<?php

require_once "../controladores/Controller.php";
require_once "../modelos/Empresa.php";
require_once "../modelos/Evento.php";

class EmpresaController extends Controller
{
  public function mostrarNombre(?string $url = null)
  {
    $azafatas = Azafata::getAllAzafatas();
    $urlLinks = $url . "./";
    $this->render("homePageEmpresa.php.twig", [
      "nombre" => $_SESSION["empresa"]->getNombre(),
      "experiencia1" => $_SESSION["empresa"]->getEventosPasados(0),
      "experiencia2" => $_SESSION["empresa"]->getEventosPasados(1),
      "experiencia3" => $_SESSION["empresa"]->getEventosPasados(2),
      "azafatas" => $azafatas,
      "urlLinks" => $urlLinks
    ]);
  }

}


