<?php 

session_start();
require('core/models/class.Conexion.php');

$view = isset($_GET['view']) ? $_GET['view'] : 'default';

 
  

switch($view) 
{
	case 'login':
	 
		include('core/controllers/loginController.php');
		
	break;

	case 'procesar':
	
		include('core/controllers/procesarController.php');
	
	break;

	case 'acceso':
		
		include('core/controllers/accesoController.php');
		
		

	break;

	case 'cierrasesion':
	{
		if(isset($_SESSION['user']))
		{

		 include('styles/templates/public/cierrasesion.php');
		}
		else
		{
			header('location: index.php?view=login');
		}
	}
	break;

	case 'registrousers':
		include('core/controllers/registrousersController.php');
	break;

	case 'listadousers':
		include('core/controllers/listadousersController.php');
	break;

	case 'perfil':
		include('core/controllers/perfilController.php');
	break;

	case 'reporteusers':
		include('core/controllers/reporteusersController.php');
	break;

	default:

			include('core/controllers/indexController.php');
		

    break;
}


 ?>