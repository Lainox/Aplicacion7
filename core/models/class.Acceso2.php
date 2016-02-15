<?php 

class Acceso2
{
	private $user;
	private $pass;
	private $nombre;
	private $fecha;
	private $admin;

	public function actualizar()
	{
		$db = new Conexion();
		$id = $_SESSION['id'];
	
	    $sql2 = $db->query("UPDATE users SET user='$this->user', pass='$this->pass', nombre='$this->nombre', fecha='$this->fecha' LIKE id='$id';");
			 		
			 	
	}

}

 ?>