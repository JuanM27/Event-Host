<?php

require_once "../controladores/Controller.php";
require_once "../modelos/Empresa.php";
require_once "../modelos/Evento.php";

class EventoController extends Controller
{
  public function crearEvento(?string $url = null)
  {
    $eventos = Evento::getMisEventos($_SESSION["empresa"]->getIdEmpresa());
    $this->render("crearEvento.php.twig", [
      "urlLinks" => $url,
      "eventos" => $eventos
    ]);
  }

  public function insertarEvento(?string $url = null)
  {
    Evento::crearEvento($_POST["nombre"], $_POST["organizacion"], $_POST["fecha"], $_POST["direccion"], $_SESSION["empresa"]->getIdEmpresa(), $_POST["descripcion"], $_POST["localizacion"], $_POST["idiomas"], $_POST["vestimenta"], $_POST["numAzafatas"]);
    $this->crearEvento("../");
  }

  public function gestionarEvento(?string $url = null)
  {
    $azafatas = Evento::getSolicitudesEvento($_GET["idEvento"]);
    $evento = Evento::getEvento($_GET["idEvento"]);
    $this->render("solicitudesEventos.php.twig", [
      "urlLinks" => "../",
      "azafatas" => $azafatas,
      "nombre" => $evento->getNombre(),
      "descripcion" => $evento->getDescripcion(),
      "organizacion" => $evento->getOrganizacion(),
      "fecha" => $evento->getFecha(),
      "vestimenta" => $evento->getVestimenta(),
      "numeroAzafatas" => $evento->getNumeroAzafatas(),
      "eventoId" => $evento->getIdEvento()
    ]);
  }

  public function contratarAzafata()
  {
    Evento::contratarAzafata($_GET["idAzafata"], $_GET["idEvento"]);
    header("Location: http://localhost/eventHost/Evento/{$_GET["idEvento"]}");
  }

  public function finalizarEvento()
  {
    Evento::finalizarEvento($_GET["idEvento"]);
    header("Location: http://localhost/eventHost/CrearEvento");
  }
}