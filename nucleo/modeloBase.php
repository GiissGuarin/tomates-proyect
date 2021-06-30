<?php

class modeloBase extends entidadBase{
	private $tabla;


	public function __construct($tabla, $adaptador){
		$this->tabla=(string) $tabla;
        parent::__construct($tabla, $adaptador);
	}


	public function ejecutarSql($query){
		$query = $this->BaseDatos()->query($query);

		if($query==true){

			if($query->num_rows>1){
				while ($row = $query->fetch_object()){
					$resultSet[]=$row;

				}
			}elseif($query->num_rows==1){
				if($row = $query->fetch_object()) {
                    $resultSet=$row;
                }
			}else{
				$resultSet=true;
			}

		}else{
			$resultSet=false;
		}

		return $resultSet;

	}


	//mas Metodos



}

?>