<?php

class entidadBase{
	private $tabla;
	private $BaseDatos;
	private $conec;


	public function __construct($tabla, $adaptador){
		$this->tabla=(string) $tabla;

		$this->conec = null;
		$this->BaseDatos = $adaptador;

		/* la caonexion a la base de datos se le está pasando al constructor 
		como parametro, por tal rason esto ya no es necesario

		require_once 'conectar.php';
		$this->conec = new conectar();
		$this->BaseDatos=$this->conec->conexion();
		*/
	}

	public function get_conec(){
		return $this->conec;
	}

	public function get_BaseDatos(){
		return $this->BaseDatos;
	}

	public function getAll($cadena){
		$query=$this->BaseDatos->query("SELECT * FROM $this->tabla ORDER by $cadena DESC");

		//devolvemos el resultado de la consulta en un array de objetos
		if (is_null($row = $query->fetch_object())) {
			return false;
		}else{
			while ($row = $query->fetch_object()){
			$result[]=$row;
			}

		    return $result;

		}
		
	}

	public function getById($id){
		$query=$this->BaseDatos->query("SELECT * FROM $this->tabla WHERE id=$id");

		if($row = $query->fetch_object()) {
           $result=$row;
        }
        return $result;

	}


	public function getBy($column,$value){
        $quermy=$this->BaseDatos->query("SELECT * FROM $this->tabla WHERE $column='$value'");
 
        $paraprobar = $this->BaseDatos->query("SELECT * FROM $this->tabla WHERE $column='$value'");

        	if (is_null($row = $paraprobar->fetch_object())) {
			return false;
			}else{

			while ($you = $quermy->fetch_object()){
				$result[]=$you;
			}

		    return $result;

		}
       	
    }

    public function getlog($correo,$contrasena){
        $query=$this->BaseDatos->query("SELECT * FROM $this->tabla WHERE nombre='$correo' AND edad=$contrasena");
         
         if (isset($query)) {
         	$objeto = $query->fetch_object();
         	return $objeto;
         }else{
         	return false;
         }
        
    }
     
    public function deleteById($id){
        $query=$this->BaseDatos->query("DELETE FROM $this->tabla WHERE id=$id");
        return $query;
    }
     
    public function deleteBy($column,$value){
        $query=$this->BaseDatos->query("DELETE FROM $this->tabla WHERE $column='$value'");
        return $query;
    }














}

?>