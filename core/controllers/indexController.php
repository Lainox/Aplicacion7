<?php 

  

  if(isset($_SESSION['user']))
  {
  	 include('core/controllers/accesoController.php');
  }
  else
  {
  	include('styles/templates/home/index.php');
  }


 ?>