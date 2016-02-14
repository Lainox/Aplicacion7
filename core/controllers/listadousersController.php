<?php 

if(isset($_SESSION['user']))
{
	include('styles/templates/usuarios/listadousers.php');
}
else
{
	 header('location: index.php?view=login');
}
 ?>