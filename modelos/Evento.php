<?php

require_once "librerias/Conexion.php";
require_once "modelos/Empresa.php";
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
  public int $numeroAzafatas;


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

  /**
   * @return int
   */
  public function getNumeroAzafatas(): int
  {
    return $this->numeroAzafatas;
  }

  /**
   * @param int $num
   * @return 
   */
  public function setNumeroAzafatas(int $num)
  {
    $this->numeroAzafatas = $num;
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
  public function getFotoEmpresaEvento($idEvento, $idEmpresa)
  {
    $conexion = Conexion::getConnection();
    $sql = "SELECT em.* FROM empresa em INNER JOIN evento e ON (em.IdEmpresa=e.IdEmpresa) WHERE e.idEvento = :idEv AND e.IdEmpresa = :idEm;";
    $parametros = array(':idEv' => $idEvento, ':idEm' => $idEmpresa);
    $resultado = $conexion->query($sql, $parametros);
    $empresa = $resultado->fetchObject("Empresa");

    if ($empresa) {
      $foto = $empresa->getFoto();
      return $foto;
    } else {
      return null; // O manejar de otra manera si no se encuentra la empresa
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

  public static function crearEvento(string $nombre, string $organizacion, string $fecha, string $direccion, int $IdEmpresa, string $descripcion, string $localizacion, string $idiomas, string $vestimenta, int $numAzafatas)
  {
    $conexion = Conexion::getConnection();
    $sql = "INSERT INTO evento VALUES(NULL,:nom,:org,:fec,:dir,:idE,:des,:loc,:idi,:ves,:num); ";
    $parametros = array('nom' => $nombre, 'org' => $organizacion, 'fec' => $fecha, 'dir' => $direccion, 'idE' => $IdEmpresa, 'des' => $descripcion, 'loc' => $localizacion, 'idi' => $idiomas, 'ves' => $vestimenta, 'num' => $numAzafatas);
    $conexion->query($sql, $parametros);
  }

  public static function getMisEventos($idEm)
  {
    $conexion = Conexion::getConnection();
    $sql = "SELECT *
    FROM evento 
    WHERE idEmpresa = :idEmpresa LIMIT 3; ";
    $parametros = array('idEmpresa' => $idEm);
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

  public static function getSolicitudesEvento($idEv)
  {
    $conexion = Conexion::getConnection();
    $sql = " SELECT a.* FROM aplica ap INNER JOIN azafata a ON (ap.idAzafata=a.idAzafata) WHERE idEvento=:idEvento AND contratada<>true";
    $parametros = array('idEvento' => $idEv);
    $resultado = $conexion->query($sql, $parametros);

    $azafatas = array();
    if ($resultado->rowCount() > 0) {
      // Iterar sobre las filas del resultado y almacenar cada evento como un objeto en el array $eventos
      while ($objetoAzafata = $resultado->fetchObject("Azafata")) {
        $azafatas[] = $objetoAzafata;
      }
    }
    return $azafatas;
  }

  public static function getEvento($idEv)
  {
    $conexion = Conexion::getConnection();
    $sql = " SELECT * FROM evento WHERE idEvento=:idEvento";
    $parametros = array('idEvento' => $idEv);
    $resultado = $conexion->query($sql, $parametros);

    $evento = $resultado->fetchObject("Evento");

    return $evento;
  }

  public static function contratarAzafata(int $idAzafata, int $idEvento)
  {
    $conexion = Conexion::getConnection();

    $sql = "UPDATE aplica SET contratada = true WHERE idAzafata = :idAz AND idEvento = :idEv;";
    $parametros = array('idAz' => $idAzafata, 'idEv' => $idEvento);
    $resultado = $conexion->query($sql, $parametros);

    $sql2 = "UPDATE evento SET numeroAzafatas = numeroAzafatas - 1 WHERE idEvento = :idEvento AND numeroAzafatas > 0;";
    $parametros2 = array('idEvento' => $idEvento);

    $consultaNumeroAzafatas = "SELECT numeroAzafatas FROM evento WHERE idEvento = :idEvento;";
    $numeroAzafatas = $conexion->query($consultaNumeroAzafatas, $parametros2)->fetchColumn();

    if ($numeroAzafatas > 0) {
      $resultado2 = $conexion->query($sql2, $parametros2);
    } else {
      echo "Ya están todas las azafatas contratadas para el evento";
    }
  }

  public static function finalizarEvento(int $idEvento)
  {
    $conexion = Conexion::getConnection();

    $sql = "DELETE FROM evento WHERE idEvento = :idEv;";
    $parametros = array('idEv' => $idEvento);
    $resultado = $conexion->query($sql, $parametros);
  }

}