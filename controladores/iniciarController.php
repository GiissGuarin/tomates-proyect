<?php
class iniciarController extends controladorBase
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

		$this->PantallaVista("login");
	}

	public function principal()
	{
		$this->PantallaVista("principal");
	}

	public function deliver()
	{
		$this->PantallaVista("product-create");
	}

	public function shopping()
	{
		$producto = new producto($this->adaptador);
		$result = $producto->myShopping();

		$this->vistas("my-shopping", array(
			"result" => $result,

		));
	}

	public function sales()
	{
		$producto = new producto($this->adaptador);
		$result = $producto->mySales();

		$this->vistas("my-sales", array(
			"result" => $result
		));
		$this->PantallaVista("my-sales");
	}

	public function inventory()
	{
		$producto = new producto($this->adaptador);
		$result = $producto->myProducts();

		$this->vistas("my-inventory", array(
			"result" => $result
		));
	}

	public function crearProducto()
	{
		$producto = new producto($this->adaptador);
		$tem = $_FILES['photo_product']['tmp_name'];
		$temname = $_FILES['photo_product']['name'];
		$prefix = rand(1, 1000);
		$newpath = "img/" . $prefix . "_" . $temname;
		if (move_uploaded_file($tem, $newpath)) {
			$image = $newpath;
		}
		$result = $producto->crear(
			$_POST["name_product"],
			$_POST["quantity_product"],
			$_POST["lot_product"],
			$_POST["expiration_product"],
			$_POST["price_product"],
			$image
		);
		echo $result;
		if ($result) {
			$producto = new producto($this->adaptador);
			$result = $producto->myProducts();

			$this->vistas("my-inventory", array(
				"result" => $result
			));
		}
	}
	public function deleteTransSale()
	{
		$id = $_GET["id"];
		$qty = $_GET["qty"];
		$producto = new producto($this->adaptador);
		$result = $producto->updateInventary($id, $qty);
		if ($result) {

			$producto = new producto($this->adaptador);
			$result = $producto->deleteTrans($id);

			header('Refresh: 0; URL = index.php?controlador=iniciar&action=sales');
		}
	}

	public function deleteTransShop()
	{
		$id = $_GET["id"];
		$qty = $_GET["qty"];
		$id_trans = $_GET["id_trans"];
		$producto = new producto($this->adaptador);
		$result = $producto->updateInventary($id, $qty);

		if ($result) {

			$producto = new producto($this->adaptador);
			$result = $producto->deleteTrans($id_trans);
			header('Refresh: 0; URL = index.php?controlador=iniciar&action=shopping');
			// $this->vistas("my-shopping", array(
			// 	"result" => $result
			// ));
		}
	}


	public function sesion()
	{
		if (isset($_POST['correo']) && isset($_POST['contrasena'])) {
			$user = new usuario($this->adaptador);
			$nombre =	$_POST['correo'];
			$contra = $_POST['contrasena'];
			$user = $user->getlog($nombre, $contra);
			//$user = $user->getlog(isset($_POST['correo']), isset($_POST['contrasena']));

			if ($user) {

				echo $user->id;
				$_SESSION['valid'] = true;
				$_SESSION['timeout'] = time();
				$_SESSION['usuario'] = $user->nombre;
				$_SESSION['rol'] = $user->foranea_tipo;
				$_SESSION['idUsuario'] = $user->id;

				echo "sesion valida";
				echo $_SESSION['rol'];

				header('Refresh: 1; URL = index.php?controlador=usuarios&action=index');
			} else {
				echo "contraseña o usuario incorrecto";
				header('Refresh: 1; URL = index.php');
			}
		}
	}
}
