<?php

class Azafata
{
  public int $idAzafata;
  public string $nombre;
  public string $apellidos;
  public string $contrasena;
  public string $email;
  public string $telefono;
  public string $fotos;
  public string $experiencia;
  public string $estudios;
  public string $idiomas;
  public string $zonaTrabajo;

  /**
   *
   */
  public function __construct()
  {

  }

  /**
   * @return int
   */
  public function getIAzafata(): int
  {
    return $this->idAzafata;
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
  public function getApellidos(): string
  {
    return $this->apellidos;
  }

  /**
   * @param string $ape
   * @return
   */
  public function setApellidos(string $ape)
  {
    $this->apellidos = $ape;
  }

  /**
   * @return string
   */
  public function getcontrasena(): string
  {
    return $this->contrasena;
  }

  /**
   * @param string $cont
   * @return 
   */
  public function setContrasena(string $cont)
  {
    $this->contrasena = $cont;
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
  public function getExperencia(): string
  {
    return $this->experiencia;
  }

  /**
   * @param string $exp
   * @return
   */
  public function setExperiencia(string $exp)
  {
    $this->experiencia = $exp;
  }

  /**
   * @return string
   */
  public function getEstudios(): string
  {
    return $this->estudios;
  }

  /**
   * @param $est
   * @return 
   */
  public function setEstudios(string $est)
  {
    $this->estudios = $est;
  }

  /**
   * @return string
   */
  public function getZonaTrabajo(): string
  {
    return $this->zonaTrabajo;
  }

  /**
   * @param string $zona
   * @return
   */
  public function setZonaTrabajo(string $zona)
  {
    $this->zonaTrabajo = $zona;
  }

}