<?php
class Azafata
{
  public int $idAzafata;
  public string $nombre;
  public string $apellidos;
  public string $email;
  public string $telefono;
  public string $fotos;
  public string $experiencia;
  public string $estudios;
  public string $idiomas;
  public string $contrasena;
  public string $zonaTrabajo;
  public string $descripcion;
  public string $disponibilidad;

  /**
   *
   */
  public function __construct()
  {

  }

  /**
   * @return int
   */
  public function getIdAzafata(): int
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
  public function getExperiencia(?int $numero = null): string
  {
    if ($numero === null) {
      return $this->experiencia;
    } else {
      $experiencia = explode(",", $this->experiencia);
      return isset($experiencia[$numero]) ? $experiencia[$numero] : 'Índice no válido';
    }
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
  public function getIdiomas(): string
  {
    return $this->idiomas;
  }

  /**
   * @param $idi
   * @return 
   */
  public function setIdiomas(string $idi)
  {
    $this->estudios = $idi;
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
  public function getDisponibilidad(): string
  {
    return $this->disponibilidad;
  }

  /**
   * @param string $dis
   * @return
   */
  public function setDisponibilidad(string $dis)
  {
    $this->disponibilidad = $dis;
  }

  public function solicitarTrabajo($idE)
  {
    $conexion = Conexion::getConnection();
    $sql = "INSERT INTO aplica (idAzafata,idEvento,contratada) VALUES(:idAz,:idEv,:cont);";
    $parametros = array('idAz' => $this->getIdAzafata(), 'idEv' => $idE, 'cont' => 0);
    $conexion->query($sql, $parametros);
  }

  public static function getAllAzafatas()
  {
    $conexion = Conexion::getConnection();
    $sql = "SELECT * FROM azafata";
    $resultado = $conexion->query($sql);

    if ($resultado->rowCount() > 0) {
      // Iterar sobre las filas del resultado y almacenar cada evento como un objeto en el array $eventos
      while ($objetoAzafata = $resultado->fetchObject("Azafata")) {
        $azaftas[] = $objetoAzafata;
      }
    }
    return $azaftas;
  }
}