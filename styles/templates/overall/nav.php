

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
        <li class="active"><a href="?view=index">Home <span class="sr-only">(current)</span></a></li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Usuarios <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="?view=listadousers">Lista de Usuarios</a></li>
            <li><a href="?view=registrousers">Agregar Usuario</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <?php if(isset($_SESSION['user']))
              {

                
        echo '<li class="dropdown">';
        echo '<a href="?view=cierrasesion" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">'.$_SESSION['user'].'<span class="caret"></span></a>';
        echo '<ul class="dropdown-menu" role="menu">';
        echo '<li><a href="?view=perfil">Mi Perfil</a></li>';
        echo '<li><a href="?view=cierrasesion">Cerrar Sesion</a></li>';
        echo '</ul></li>';
           
        
                
                
              }
              else
              {
         ?>
        <li><a href="?view=login">Login</a></li>
        
        <?php 

            }
         ?>
         
      </ul>
    </div>
  </div>
</nav>
