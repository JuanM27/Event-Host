<?php

require_once "../librerias/Conexion.php";
class Evento
{

  public int $idEvento;
  public string $nombre;
  public string $organizacion;
  public string $fecha;
  public string $direccion;
  public string $descripcion;
  public string $localizacion;
  public string $idiomas;
  public string $vestimenta;

  public int $IdEmpresa;


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
  public function getDireccion(): string
  {
    return $this->direccion;
  }

  /**
   * @param string $direc
   * @return 
   */
  public function setDireccion(string $direc)
  {
    $this->direccion = $direc;
  }

  /**
   * @return int
   */
  public function getIdEmpresa(): int
  {
    return $this->IdEmpresa;
  }

  /**
   * @param int $idEm
   * @return 
   */
  public function setIdEmpresa(int $idEm)
  {
    $this->IdEmpresa = $idEm;
  }

  /**
   * @return string
   */
  public function getDescripcion(): string
  {
    return $this->descripcion;
  }

  /**
   * @param string $des
   * @return 
   */
  public function setDescripcion(string $des)
  {
    $this->descripcion = $des;
  }

  /**
   * @return string
   */
  public function getLocalizacion(): string
  {
    return $this->localizacion;
  }

  /**
   * @param string $loc
   * @return 
   */
  public function setLocalizacion(string $loc)
  {
    $this->localizacion = $loc;
  }

  /**
   * @return string
   */
  public function getIdiomas(): string
  {
    return $this->idiomas;
  }

  /**
   * @param string $idi
   * @return 
   */
  public function setIdiomas(string $idi)
  {
    $this->idiomas = $idi;
  }

  /**
   * @return string
   */
  public function getVestimenta(): string
  {
    return $this->vestimenta;
  }

  /**
   * @param string $ves
   * @return 
   */
  public function setVestimenta(string $ves)
  {
    $this->vestimenta = $ves;
  }

  public function getNombreEmpresa(int $idEm): string
  {
    $conexion = Conexion::getConnection();
    $sql = "SELECT nombre FROM empresa WHERE idEmpresa=:idEm";
    $parametros = array('idEm' => $idEm);
    $resultado = $conexion->query($sql, $parametros);

    if ($resultado->rowCount() > 0) {
      // Si hay al menos una fila en el resultado, obtén el nombre de la empresa
      $fila = $resultado->fetch();
      $nombreEmpresa = $fila['nombre'];

      // Devuelve el nombre de la empresa
      return $nombreEmpresa;
    } else {
      return "Empresa no encontrada";
    }
  }

  public static function getAllEventos($idAz)
  {
    $conexion = Conexion::getConnection();
    $sql = "SELECT *
    FROM evento e
    WHERE NOT EXISTS (
        SELECT 1
        FROM aplica a
        WHERE a.idAzafata = :idAzafata
          AND a.idEvento = e.idEvento
    ) LIMIT 3; ";
    $parametros = array('idAzafata' => $idAz);
    $resultado = $conexion->query($sql, $parametros);
    $eventos = array();

    if ($resultado->rowCount() > 0) {
      // Iterar sobre las filas del resultado y almacenar cada evento como un objeto en el array $eventos
      while ($objetoEvento = $resultado->fetchObject("Evento")) {
        $eventos[] = $objetoEvento;
      }
    }
    return $eventos;
  }

}