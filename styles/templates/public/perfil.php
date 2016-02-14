
<?php 
include('styles/templates/overall/header.php');
include('styles/templates/overall/nav.php'); 
?>
<script type="text/javascript">
    
    
        $(document).ready(function(){
      var result;
      var timeSlide = 1000;
       $("#send_request").click(function(){
        var nombre = $("#nombre").val();
        var fecha = $("#nacimiento").val();
        var user = $("#user").val();
        var pass = $("#pass").val();
        
        if(user != '' && pass != '' && nombre != '' && fecha !='')
        {
          $.ajax({ 
                   url: "?view=perfil",
                    data: { "usuario": user,
                            "password": pass, 
                            "nombre": nombre,
                            "fecha" : fecha},
                    type: "POST",
                    beforeSend:inicioEnvio,
                    dataType: 'json',
                    async:true,
                    success: function(respuesta){
                     alert(respuesta);
                       if( respuesta == 1)
                       {
                          result ='<div class="alert alert-dismissible alert-success" style="width: 500px;">';
                          result+='<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                          result+='<span aria-hidden="true">&times;</span></button>';
                          result+='<strong>Datos Actualizados!</strong>.';
                          result+='</div>';
                          $("#_AJAX_").html(result);
                          setTimeout(function(){
                                window.location.href = "?view=index";
                            },(timeSlide + 500));
                       }
                       
                      

                    },
                     
                     complete: function(){
                      

                    }
                   });
        }
        else
        {
           result = '<div class="alert alert-dismissible alert-danger" style="width: 500px;">';
           result+='<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
           result+='<span aria-hidden="true">&times;</span></button>';
           result+='<strong>ERROR:</strong> Debe completar todos los campos';
           result+='</div>';
           $("#_AJAX_").html(result);
        }
       });

        function inicioEnvio()
        {
          var x=$("#_AJAX_");
          x.html('<img src="styles/images/loader.gif">');
        }
     
});
    
</script>
<body>
	<center>
        <div id="_AJAX_">
    
  </div>
	<div class="container">

<div class="panel panel-default">
  <div class="panel-heading"><h4>Configuración del Perfil</h4></div>
  <div class="panel-body">
     <div class="form-signin" style="width: 500px;">
       
        <br>
        <br>
        <div style="text-align:left;"><label>Nombre</label></div>
        <input class="form-control" id="nombre" placeholder='' maxlength="15" value="<?php echo $_SESSION['nombre']; ?>"  autofocus="" required="" type="email">
        <br>
        <div style="text-align:left;"><label>Fecha de Nacimiento</label></div>
        <div class="input-group date" data-provide="datepicker">
    <input type="text" id="nacimiento" class="form-control" value='<?php echo $_SESSION['fecha']; ?>' readonly="">
    <div class="input-group-addon add-on">
        <span class="glyphicon glyphicon-th"></span>
    </div>
</div>
        <br>
        <div style="text-align:left;"><label>Usuario</label></div>
        
        <input class="form-control" id="user" placeholder='' maxlength="12" value="<?php echo $_SESSION['user']; ?>" autofocus="" required="" type="text">
        <br>
        <div style="text-align:left;"><label>Password</label></div>
       
        <input class="form-control" id="pass" placeholder=''  maxlength="7" value="<?php echo $_SESSION['pass']; ?>" required="" type="password">
        <br>
        
        <button class="btn btn-lg btn-primary btn-block" id="send_request" type="button">Actualizar Datos</button>
        <br>
        <br>
      </div>
  </div>
</div>
</div>
 </center>
</body>
</html>