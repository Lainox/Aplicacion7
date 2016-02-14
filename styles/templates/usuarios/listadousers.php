<?php include('styles/templates/overall/header.php'); ?>

	<script type="text/javascript">
    $(document).ready(function(){

        $("#table_id").DataTable();

    });

 </script>

<body>
	<?php include('styles/templates/overall/nav.php'); ?>
<div class="container">
     

<div class="panel panel-default">

  <!-- Default panel contents -->
  <div class="panel-heading">Panel de Administración</div>

  <div class="panel-body">
    <div style="text-align: center;">
     <div class="btn-group">
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <strong> Exportar</strong> <span class="caret"></span>
        </button>
            <ul class="dropdown-menu">
                <li><a href="?view=reporteusers"><strong>PDF</strong></a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Separated link</a></li>
            </ul>
      </div>
  </div>
    <p></p>
  
	<table class="table" id="table_id">
  	<thead>
    <tr>
    	<th>Nombre </th>
    	<th>Usuario</th>
    </tr>
    
    </thead>

    <tbody>
    	<tr>
            <?php 
            $db = new Conexion();
            $sql = $db->query("SELECT * from users");
            while($x = $db->recorrer($sql))
            { 
                $datos[] = array(

                    'user' => $x['user'],
                    'nombre' => $x['nombre']

                    ); 
            }; ?>

            <?php foreach($datos as $dato){ ?>
    		<td><?php echo $dato['nombre']; ?></td>
            <td><?php echo '<a href="?view=perfil">'.$dato['user'].'</a>'; ?></td>
    	</tr>
        <?php } ?>

       </tbody>
    </table>

</div>
</div>
</div>

</body>
</html>