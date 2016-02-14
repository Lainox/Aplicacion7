

<?php 

   if(isset($_SESSION['id']) || isset($_SESSION['user']) || isset($_SESSION['nombre']))
   {
   	   if($_POST)
   	   {
		include('core/models/class.Acceso.php');
 		$acceso = new Acceso();
 		$acceso->Registrar();
		exit();
	  	
	   }
	   else
	   {
	   	   include('styles/templates/public/registro.php');
	   }
    }
    else
	{
		header('location: ?view=login');
	}


 
 ?>