<?php 

if(!isset($_SESSION['id']) || !isset($_SESSION['user']) || !isset($_SESSION['nombre']))
{
	if($_POST)
	{
	 	include('core/models/class.Acceso.php');
	 	$acceso = new Acceso();
	 	$acceso->Login();
	 	exit;
	}
	else 
	{
	  	include('styles/templates/public/login.php');
	}
}
else
{
	header('location: ?view=index');
}


 
 ?>