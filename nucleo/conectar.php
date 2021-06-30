<?php

class conectar {

	private $driver;
	private $host, $user, $pass, $database, $charset;

	public function __construct(){
		$configBD = require_once 'config/configDB.php';
		$this->driver=$configBD["driver"];
        $this->host=$configBD["host"];
        $this->user=$configBD["user"];
        $this->pass=$configBD["pass"];
        $this->database=$configBD["database"];
        $this->charset=$configBD["charset"];

	}

	public function conexion (){
		if($this->driver=="mysql" || $this->driver==null){
            $con=new mysqli($this->host, $this->user, $this->pass, $this->database);
            $con->query("SET NAMES '".$this->charset."'");
        }
        return $con;
	}

}

?>