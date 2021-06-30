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
        parse_str($_POST['dataForm'], $data);
        $producto = new producto($this->adaptador);
        $var = 0;
        $array_d = array();
        foreach ($data['consult'] as $key) {
            $result = $producto->pay($key);
        }

        foreach ($data['id_prod_quant'] as $key) {
            $param = explode(",", $key);
            $result2 = $producto->updatepay($param[0], $param[1]);
        }
        if ($result && $result2) {
            $producto = new producto($this->adaptador);
            $result3 = $producto->myShopping();
            return $result3;

            // $this->vistas("my-shopping", array(
            //     "result" => $result3,

            // ));
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
        header('Refresh: 2; URL = index.php');
    }

    public function cerrarSesion()
    {
        unset($_SESSION["usuario"]);
        unset($_SESSION["contrasena"]);
        unset($_SESSION['rol']);
        unset($_SESSION['marca']);

        echo 'Sesion cerrada';
        header('Refresh: 2; URL = index.php?controlador=iniciar&action=index');
    }
}
