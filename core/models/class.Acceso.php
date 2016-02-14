<?php 

class Acceso
{
	private $user;
	private $pass;
	private $nombre;
	private $fecha;

	

	public function Login()
	{
		try{
			 if(!empty($_POST['usuario']) and !empty($_POST['password']) and !empty($_POST['session']))
			 {
			 	$db = new Conexion();
			 	$this->user = $db->real_escape_string($_POST['usuario']);
			 	$this->pass = $_POST['password'];
			 	
			 	$sql = $db->query("SELECT * from users WHERE user LIKE '$this->user' AND pass LIKE '$this->pass';");
			 	if($db->rows($sql) > 0)
			 	{
			 		$datos = $db->recorrer($sql);
			 		$_SESSION['id'] = $datos['id'];
			 		$_SESSION['user'] = $datos['user'];
			 		$_SESSION['nombre'] = $datos['nombre'];
			 		
			 		$_SESSION['pass'] = $datos['pass'];
			 	    $_SESSION['fecha'] = $datos['fecha'];
			 		if($_POST['session'] == true)
			 		{
			 			ini_set('session.cookie_lifetime', time() + (60*24));
			 		}
			 		echo 1;
			 	}
			 	else
			 	{
			 		throw new Exception(2);
			 	}
				$db->liberar($sql);
			 		$db->close();
			 	
			 }
			 else
			 {
			 	throw new Exception('Error: Datos vacios');
			 }

		}catch(Exception $e){
			echo $e->getMessage();
		}
}

	

	public function Recuperar()
	{

	}

	public function Actualizar()
	{
		try{
			 if(!empty($_POST['usuario']) and !empty($_POST['password']) and !empty($_POST['nombre']) and !empty($_POST['fecha']))
			 {
			 	$db = new Conexion();
			 	$this->user = $db->real_escape_string($_POST['usuario']);
			 	$this->nombre = $db->real_escape_string($_POST['nombre']);
			 	$this->pass = $_POST['password'];
			 	

			 	//Control de error para fecha
			 	$this->fecha = $db->real_escape_string($_POST['fecha']);
			 	
			 	

			 	
			 	$sql2 = $db->query("SELECT * from users;");
			    $sql = $db->query("UPDATE users SET user='$this->user', pass='$this->pass', nombre='$this->nombre', fecha='$this->fecha' WHERE user='$this->user';");
			 		
			 	$datos = $db->recorrer($sql2);
			 	$_SESSION['id'] = $datos['id'];
			 	$_SESSION['user'] = $datos['user'];
			 	$_SESSION['nombre'] = $datos['nombre'];
			 	$_SESSION['pass'] = $datos['pass'];
			 	$_SESSION['fecha'] = $datos['fecha'];
			 	echo 1;
			 
				
			 	
			 }

			 else
			 {
			 	throw new Exception('Error: Datos vacios');
			 }
			 $db->liberar($sql2);
			 		$db->close();

		}catch(Exception $e){
			echo $e->getMessage();
		}
	}

	public function Registrar()
	{
		try{
			 if(!empty($_POST['usuario']) and !empty($_POST['password']) and !empty($_POST['nombre']))
			 {
			 	$db = new Conexion();
			 	$this->user = $db->real_escape_string($_POST['usuario']);
			 	$this->nombre = $db->real_escape_string($_POST['nombre']);
			 	$this->pass = $_POST['password'];
			 	
			 	$sql = $db->query("SELECT * from users WHERE user LIKE '$this->user' OR nombre LIKE '$this->nombre';");
			 	if($db->rows($sql) == 0)
			 	{
			 		$sql2 = $db->query("INSERT INTO users (user, pass, nombre) values ('$this->user','$this->pass','$this->nombre');");
			 		
			 		
			 		
			 		
			 		echo 1;
			 		
			 	}
			 	else
			 	{
			 		$datos = $db->recorrer($sql);

			 		if(strtolower($this->user) == strtolower($datos['user']))
			 		{
			 			throw new Exception(2);
			 		}
			 		else
			 		{
			 			throw new Exception(3);
			 		}
			 		

			 	}
				$db->liberar($sql);
			 		$db->close();
			 	
			 }
			 else
			 {
			 	throw new Exception('Error: Datos vacios');
			 }

		}catch(Exception $e){
			echo $e->getMessage();
		}
	}
}
 ?>