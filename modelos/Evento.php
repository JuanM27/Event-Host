<?php

class Evento
{

  public int $idEvento;
  public string $nombre;
  public string $fecha;
  public string $organizacion;
  public string $direccion;

  public function __constructor()
  {

  }

  /**
   * @return int
   */
  public function getIdEvento(): int
  {
    return $this->idEvento;
  }

  /**
   * @return  string
   */
  public function getNombre(): string
  {
    return $this->nombre;
  }

  /**
   * @param string$nom
   * @return 
   */
  public function setNombre(string $nom)
  {
    $this->nombre = $nom;
  }

  /**
   * @return string
   */
  public function getFecha()
  {
    return $this->fecha;
  }

  /**
   * @param string $fech
   * @return 
   */
  public function setFecha(string $fech)
  {
    $this->fecha = $fech;
  }

  /**
   * @return string
   */
  public function getOrganizacion(): string
  {
    return $this->organizacion;
  }

  /**
   * @param string $org
   * @return
   */
  public function setOrganizacion(string $org)
  {
    $this->organizacion = $org;
  }

  /**
   * @return string
   */
  public function getdireccion(): string
  {
    return $this->direccion;
  }

  /**
   * @param string $direc
   * @return 
   */
  public function setdireccion(string $direc)
  {
    $this->direccion = $direc;
  }

}