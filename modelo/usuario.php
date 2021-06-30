<?php
class usuario extends entidadBase{


    private $id;    
    private $foranea_tipo;
    private $nombre;
    private $edad;
     
    public function __construct($adaptador) {
        $tabla="usuarios";
        parent::__construct($tabla, $adaptador);
    }
     
    public function getId() {
        return $this->id;
    }
 
    public function setId($id) {
        $this->id = $id;
    }
     
    public function getNombre() {
        return $this->nombre;
    }
 
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
 
    public function getEdad() {
        return $this->edad;
    }
 
    public function setEdad($edad) {
        $this->edad = $edad;
    }
 
    public function save(){
        $foranea = "1";
        echo $foranea;
        $query="INSERT INTO usuarios (id,foranea_tipo,nombre,edad)
                VALUES(NULL,
                        '".$foranea."',
                       '".$this->nombre."',
                       '".$this->edad."');";
        $save=$this->get_BaseDatos()->query($query);
        //$this->db()->error;
        return $save;
    }
 
}
?>
