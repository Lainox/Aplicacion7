<?php 
	
	if(isset($_POST['login']))
		{
			if(!empty($_POST['user']) && !empty($_POST['pass']))
			{
				include('core/models/class.Acceso.php');
				$login = new Acceso($_POST['user'], $_POST['pass']);
				$login->Login();
			}
			else
			{

				header('location: index.php?view=login');

			}
		}
		else
		{
			header('location: index.php?view=login');
		}

 ?>