<?php 
if(isset($_SESSION['user']))
		{


			include('styles/templates/public/acceso.php');
		}
		else
		{
			header('location: index.php?view=login');
		}

 ?>