<?php include('styles/templates/overall/header.php'); ?>
  
  
  <script>
     $(document).ready(function(){
      var result;
      var timeSlide = 1000;
       $("#send_request").click(function(){
        var user = $("#user").val();
        var pass = $("#pass").val();
        var session = $("#session:checked") ? true : false;
        if(user != '' && pass != '')
        {
          $.ajax({ 
                   url: "?view=login",
                    data: { "usuario": user,
                            "password": pass, 
                            "session": session},
                    type: "POST",
                    beforeSend:inicioEnvio,
                    dataType: 'json',
                    async: true,
                    success: function(respuesta){
                       if( respuesta == 1)
                       {
                          result ='<div class="alert alert-dismissible alert-success" style="width: 500px;">';
                          result+='<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                          result+='<span aria-hidden="true">&times;</span></button>';
                          result+='<strong>Conectado!</strong>.';
                          result+='</div>';
                          $("#_AJAX_").html(result);
                          setTimeout(function(){
                                window.location.href = "?view=index";
                            },(timeSlide + 500));
                       }
                       else
                       {
                          result = '<div class="alert alert-dismissible alert-danger" style="width: 500px;">';
                          result+='<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                          result+='<span aria-hidden="true">&times;</span></button>';
                          result+='<strong>ERROR:</strong> Credenciales incorrectas';
                          result+='</div>';
                          $("#_AJAX_").html(result);
                       }

                    },
                     error: function(){
                        result = '<div class="alert alert-dismissible alert-danger" style="width: 500px;">';
                          result+='<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                          result+='<span aria-hidden="true">&times;</span></button>';
                          result+='<strong>ERROR en la ejecución</strong>';
                          result+='</div>';
                          $("#_AJAX_").html(result);
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
     <div class="form-signin" style="width: 500px;">
        <h2 class="form-signin-heading" >Iniciar Sesión</h2>
        <label for="inputEmail" class="sr-only">Usuario</label>
        <input class="form-control" id="user" placeholder="Introducir usuario"  autofocus="" required="" type="text">
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input class="form-control" id="pass" placeholder="Introducir contraseña"  required="" type="password">
        
        <div class="checkbox">
          <label>
            <input type="checkbox" id="session" value="1">Recordarme
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" id="send_request" type="button">Iniciar Sesión</button>
      </div>

 
   </center> 
  
</body>
</html>