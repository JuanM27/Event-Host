<?php

class Empresa
{
  public int $IdEmpresa;
  public string $nombre;
  public string $paginaWeb;
  public string $eventosPasados;
  public string $telefono;
  public string $email;
  public string $fotos;
  public string $redesSociales;
  public string $contrasena;
  public string $zonasTrabajo;

  /**
   *@param mixed $name
   */
  public function __construct()
  {

  }

  /**
   * @return int
   */
  public function getIdEmpresa(): int
  {
    return $this->IdEmpresa;
  }

  /**
   * @return string
   */
  public function getNombre(): string
  {
    return $this->nombre;
  }

  /**
   * @param string $nom
   * @return 
   */
  public function setNombre(string $nom)
  {
    $this->nombre = $nom;
  }

  /**
   * @return string
   */
  public function getpaginaWeb(): string
  {
    return $this->paginaWeb;
  }

  /**
   * @param string $web
   * @return
   */
  public function setPaginaWeb(string $web)
  {
    $this->paginaWeb = $web;
  }

  /**
   * @return string
   */
  public function getEventosPasados(?int $numero = null): string
  {
    if ($numero === null) {
      return $this->eventosPasados;
    } else {
      $eventosPas = explode(",", $this->eventosPasados);
      return isset($eventosPas[$numero]) ? $eventosPas[$numero] : 'Índice no válido';
    }
  }

  /**
   * @param string $eventos
   * @return 
   */
  public function setEventosPasados(string $eventos)
  {
    $this->eventosPasados = $eventos;
  }

  /**
   * @return string
   */
  public function getTelefono(): string
  {
    return $this->telefono;
  }

  /**
   * @param string $tel
   * @return
   */
  public function setTelefono(string $tel)
  {
    $this->telefono = $tel;
  }

  /**
   * @return string
   */
  public function getEmail(): string
  {
    return $this->email;
  }

  /**
   * @param string $ema
   * @return
   */
  public function setEmail(string $ema)
  {
    $this->email = $ema;
  }
  /**
   * @return string
   */
  public function getFotos(): string
  {
    return $this->fotos;
  }

  /**
   * @param string $fot
   * @return 
   */
  public function setFotos(string $fot)
  {
    $this->fotos = $fot;
  }

  /**
   * @return string
   */
  public function getRedesSociales(): string
  {
    return $this->redesSociales;
  }

  /**
   * @param string $redes
   * @return
   */
  public function setRedesSociales(string $redes)
  {
    $this->redesSociales = $redes;
  }

  /**
   * @return string
   */
  public function getContrasena(): string
  {
    return $this->contrasena;
  }

  /**
   * @param $contra
   * @return 
   */
  public function setContrasena(string $contra)
  {
    $this->contrasena = $contra;
  }

  /**
   * @return string
   */
  public function getZonasTrabajo(): string
  {
    return $this->zonasTrabajo;
  }

  /**
   * @param string $zona
   * @return
   */
  public function setZonasTrabajo(string $zona)
  {
    $this->zonasTrabajo = $zona;
  }

}