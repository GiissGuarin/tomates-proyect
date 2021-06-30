<?php
class usuariosController extends controladorBase
{
    public $conectar;
    public $adaptador;

    public function __construct()
    {
        parent::__construct();

        $this->conectar = new conectar();
        $this->adaptador = $this->conectar->conexion();
    }

    public function index()
    {
        /* //Creamos el objeto usuario
        $usuario=new usuario($this->adaptador);         
        //Conseguimos todos los usuarios
        $allusers=$usuario->getAll("id");
             
        //Cargamos la vista index y le pasamos valores
        $this->vistas("index",array(
            "allusers"=>$allusers
        ));*/
        $producto = new producto($this->adaptador);
        $result = $producto->get_all();

        $this->vistas("principal", array(
            "result" => $result
        ));
    }

    public function indexLogeado()
    {
        //Creamos el objeto usuario
        $usuario = new usuario($this->adaptador);
        //Conseguimos todos los usuarios
        $allusers = $usuario->getAll("id");

        //Cargamos la vista index y le pasamos valores
        $this->vistas("index", array(
            "allusers" => $allusers
        ));
    }


    public function save()
    {
        $data = $_POST['dataForm'];
        //parse_str($_POST['dataForm'], $data);
        $producto = new producto($this->adaptador);
        $var = 0;
        $array_d = array();
        foreach ($data as $key => $n) {
            $array_p[$var] = $n;

            $var = $var + 1;
        }

        foreach ($array_p as $key => $n) {
            echo $array_p . " " . $key . "  " . $n;
        }
        // foreach ($array_p as $key) {
        //     echo $key . "    kkkkkk" . $array_p['id'] . "   " . $array_p['cant'];
        //     //$result = $producto->pay($key['']);
        // }
    }

    public function crear()
    {
        if (isset($_POST["nombre"])) {

            //Creamos un usuario
            $usuario = new usuario($this->adaptador);
            $usuario->setNombre($_POST["nombre"]);
            $usuario->setEdad($_POST["edad"]);
            $save = $usuario->save();
        }
        echo 'Te has regristrado';
        header('Refresh: 3; URL = index.php');
    }

    public function borrar()
    {
        if (isset($_GET["id"])) {


            $usuario = new usuario($this->adaptador);
            $usuario->deleteById($id);
        }
        $this->redirect();
    }


    public function hola()
    {
        $usuarios = new usuariosModelo($this->adaptador);
        $usu = $usuarios->getUnUsuario();
        var_dump($usu);
    }

    public function cerrarSesion()
    {
        unset($_SESSION["usuario"]);
        unset($_SESSION["contrasena"]);
        unset($_SESSION['rol']);
        unset($_SESSION['marca']);

        echo 'Sesion cerrada';
        header('Refresh: 3; URL = index.php');
    }
}
