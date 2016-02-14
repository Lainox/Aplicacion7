<?php include('styles/templates/overall/header.php'); 

include('styles/templates/overall/nav.php');?>
  
  
  <script>
     $(document).ready(function(){
      var result;
      var timeSlide = 1000;
       $("#send_request").click(function(){
        var user = $("#user").val();
        var pass = $("#pass").val();
        var nombre = $("#nombre").val();
        if(user != '' && pass != '' && nombre != '')
        {
          $.ajax({ 
                   url: "?view=registrousers",
                    data: { "usuario": user,
                            "password": pass, 
                            "nombre": nombre},
                    type: "POST",
                    beforeSend:inicioEnvio,
                    dataType: 'json',
                    async:true,
                    success: function(respuesta){
                     
                       if( respuesta == 1)
                       {
                          result ='<div class="alert alert-dismissible alert-success" style="width: 500px;">';
                          result+='<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                          result+='<span aria-hidden="true">&times;</span></button>';
                          result+='<strong>Usuario Agregado!</strong>.';
                          result+='</div>';
                          $("#_AJAX_").html(result);
                          setTimeout(function(){
                                window.location.href = "?view=index";
                            },(timeSlide + 500));
                       }
                       else if(respuesta == 2)
                       {
                          result = '<div class="alert alert-dismissible alert-danger" style="width: 500px;">';
                          result+='<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                          result+='<span aria-hidden="true">&times;</span></button>';
                          result+='<strong>ERROR:</strong> El usuario ya existe';
                          result+='</div>';
                          $("#_AJAX_").html(result);
                       }
                       else if(respuesta == 3)
                       {
                          result = '<div class="alert alert-dismissible alert-danger" style="width: 500px;">';
                          result+='<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                          result+='<span aria-hidden="true">&times;</span></button>';
                          result+='<strong>ERROR:</strong> El nombre ya existe';
                          result+='</div>';
                          $("#_AJAX_").html(result);
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
</head>
<body>
<br><br>
  <center>
  <div id="_AJAX_">
    
  </div>
  
   <div class="container">

<div class="panel panel-default">
  <div class="panel-heading"><h4>Registro de Usuarios</h4></div>
  <div class="panel-body">
     <div class="form-signin" style="width: 500px;">
       
        <br>
        <br>
        <label for="inputEmail" class="sr-only">Nombre</label>
        <input class="form-control" id="nombre" placeholder="Introducir nombre"  autofocus="" required="" type="email">
        <br>
        <label for="inputEmail" class="sr-only">Usuario</label>
        <input class="form-control" id="user" placeholder="Introducir usuario"  autofocus="" required="" type="text">
        <br>
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input class="form-control" id="pass" placeholder="Introducir contraseña"  required="" type="password">
        <br>
        
        <button class="btn btn-lg btn-primary btn-block" id="send_request" type="button">Agregar Usuario</button>
        <br>
        <br>
      </div>
  </div>
</div>
</div>
 
   </center> 
  
</body>
</html>
   

