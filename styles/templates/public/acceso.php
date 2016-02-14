<?php include('styles/templates/overall/header.php'); ?>
<body>
	


<?php 


include('styles/templates/overall/nav.php');
?>
<br>
<br>
<div class="container">
<div class="panel panel-default">
  <div class="panel-heading">Panel de Administración</div>
  <div class="panel-body">
    <?php

if(isset($_SESSION['user']))
{
	echo 'Buenos dias '.$_SESSION['user'];
	
}
else
{
	session_destroy();

}
 ?>
  </div>
</div>
</div>


</body>
</html>


