<?php

require_once "../controladores/Controller.php";
require_once "../modelos/Azafata.php";
require_once "../modelos/Evento.php";

class AzafataController extends Controller
{
  public function mostrarNombre(?string $url = null)
  {
    $eventos = Evento::getAllEventos($_SESSION["azafata"]->getIAzafata());
    $urlLinks = $url . "./";
    $this->render("homePage.php.twig", [
      "nombre" => $_SESSION["azafata"]->getNombre(),
      "experiencia1" => $_SESSION["azafata"]->getExperiencia(0),
      "experiencia2" => $_SESSION["azafata"]->getExperiencia(1),
      "experiencia3" => $_SESSION["azafata"]->getExperiencia(2),
      "eventos" => $eventos,
      "urlLinks" => $urlLinks

    ]);
  }

  public function solicitarTrabajo()
  {
    $_SESSION["azafata"]->solicitarTrabajo($_GET['idEvento']);
    $this->mostrarNombre("../.");
  }

}


