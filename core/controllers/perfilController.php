<?php 

 if(isset($_SESSION['id']) || isset($_SESSION['user']) || isset($_SESSION['nombre']))
   {
   	   if($_POST)
   	   {
		include('core/models/class.Acceso.php');
 		$acceso = new Acceso();
 		$acceso->Actualizar();
		exit();
	  	
	   }
	   else
	   {
	   	   include('styles/templates/public/perfil.php');
	   }
    }
    else
	{
		header('location: ?view=login');
	}

 

 ?>