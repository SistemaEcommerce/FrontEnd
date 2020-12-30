<?php

$url = Ruta::ctrRuta();
$servidor = Ruta::ctrRutaServidor();

if(!isset($_SESSION["validarSesion"])){

	echo '<script>
	
		window.location = "'.$url.'";

	</script>';

	exit();

}

?>
<!-- 
breadcrum  -->
<div class="container-fluid  productos" style="background-color: rgb(55, 53, 53);border:0px;padding-top:15px;">
<br>
    <div class="container">
        <div class="row">
          

               <ul class="breadcrumb fondoBreadcrumb  text-uppercase" style="background-color:rgb(55, 53, 53);padding-top:0px;padding-bottom:0px;border:none;top:-30px;margin-bottom:0px;font-size:25px;">
				
				    <li  style="background-color:rgb(55, 53, 53); color:#ffffff; border:none;padding-left:20px;padding-top:1px;"><a href="<?php echo $url;?>">INICIO</a></li>
				    <li  class="active pagActiva" style="background-color:rgb(55, 53, 53); color:#ffffff; border:none;padding-left:20px;padding-top:1px;"> <?php echo $rutas[0] ?></li>

                </ul>
	
            
        </div>
    </div>
</div>
<br>
<!-- selecion de perfil -->

<div class="container-fluid">
    <div class="container">

    
        <ul class="nav nav-tabs">

            <li class="active" >	  			
			  	<a data-toggle="tab" href="#compras" >
			  	<i class="fa fa-list-ul"></i> MIS COMPRAS</a>
	  		</li>

	  		<li> 				
		  		<a data-toggle="tab" href="#deseos">
		  		<i class="fa fa-gift"></i> MI LISTA DE DESEOS</a>
	  		</li>

	  		<li>				
	  			<a data-toggle="tab" href="#perfil">
	  			<i class="fa fa-user"></i> EDITAR PERFIL</a>
	  		</li>

	  		<li>				
		 	 	<a href="<?php echo $url; ?>ofertas">
		 	 	<i class="fa fa-star"></i>	VER OFERTAS</a>
	  		</li>


        </ul>

        <div class="tab-content">
            
          <!-- pestaña compras -->

          <div id="compras" class="tab-pane fade in active">
            <h3>Mis compras</h3>
            <p>Mis compras.</p>
          </div>

          <!-- pestaña deseos --> 
          <div id="deseos" class="tab-pane fade">
            <h3>Deseos</h3>
            <p>Deseos</p>
          </div>
          <!-- pestaña perfil -->
          <div id="perfil" class="tab-pane fade">

                <div class="row">
					
					<form method="post" enctype="multipart/form-data">
					
						<div class="col-md-3 col-sm-4 col-xs-12 text-center">
							
							<br>

							<figure id="imgPerfil">
								
							<?php

					
                            echo '<input type="hidden" value="'.$_SESSION["id"].'" id="idUsuario" name="idUsuario">
                            <input type="hidden" value="'.$_SESSION["password"].'" name="passUsuario">
                            <input type="hidden" value="'.$_SESSION["foto"].'" name="fotoUsuario" id="fotoUsuario">
                            <input type="hidden" value="'.$_SESSION["modo"].'" name="modoUsuario" id="modoUsuario">
                            ';


							if($_SESSION["modo"] == "directo"){

								if($_SESSION["foto"] != ""){

									echo '<img src="'.$url.$_SESSION["foto"].'" class="img-thumbnail">';

								}else{

									echo '<img src="'.$servidor.'vistas/img/usuarios/default/anonymous.png" class="img-thumbnail">';

								}
					

							}else{

								echo '<img src="'.$_SESSION["foto"].'" class="img-thumbnail">';
							}		

							?>

							</figure>

							<br>

							<?php

							if($_SESSION["modo"] == "directo"){
							
							echo '<button type="button" class="btn btn-default" id="btnCambiarFoto">
									
									Cambiar foto de perfil
									
									</button> ';

							}

							?>
                           
							<div id="subirImagen">
								
								<input type="file" class="form-control" id="datosImagen" name="datosImagen">

								<img style="border-top: 5px;margin-top:5px;" class="previsualizar">

							</div>
                           
						</div>	

						<div class="col-md-9 col-sm-8 col-xs-12">

						<br>
							
						<?php

						if($_SESSION["modo"] != "directo"){

							echo '<label class="control-label text-muted text-uppercase">Nombre:</label>
									
									<div class="input-group">
								
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" class="form-control"  value="'.$_SESSION["nombre"].'" readonly>

									</div>

									<br>

									<label class="control-label text-muted text-uppercase">Correo electrónico:</label>
									
									<div class="input-group">
								
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" class="form-control"  value="'.$_SESSION["email"].'" readonly>

									</div>

									<br>

									<label class="control-label text-muted text-uppercase">Modo de registro en el sistema:</label>
									
									<div class="input-group">
								
										<span class="input-group-addon"><i class="fa fa-'.$_SESSION["modo"].'"></i></span>
										<input type="text" class="form-control text-uppercase"  value="'.$_SESSION["modo"].'" readonly>

									</div>

									<br>';
		

						}else{

							echo '<label class="control-label text-muted text-uppercase" for="editarNombre">Cambiar Nombre:</label>
									
									<div class="input-group">
								
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" class="form-control" id="editarNombre" name="editarNombre" value="'.$_SESSION["nombre"].'">

									</div>

								<br>

								<label class="control-label text-muted text-uppercase" for="editarEmail">Cambiar Correo Electrónico:</label>

								<div class="input-group">
								
										<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
										<input type="text" class="form-control" id="editarEmail" name="editarEmail" value="'.$_SESSION["email"].'">

									</div>

								<br>

								<label class="control-label text-muted text-uppercase" for="editarPassword">Cambiar Contraseña:</label>

								<div class="input-group">
								
										<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
										<input type="text" class="form-control" id="editarPassword" name="editarPassword" placeholder="Escribe la nueva contraseña">

									</div>

								<br>

								<button type="submit" class="btn btn-default backColor btn-md pull-left">Actualizar Datos</button>';

						}

						?>

						</div>

						<?php

							$actualizarPerfil = new ControladorUsuarios();
							$actualizarPerfil->ctrActualizarPerfil();

						?>					

					</form>

					<button class="btn btn-danger btn-md pull-right" id="eliminarUsuario">Eliminar cuenta</button>

					<?php

						/* 	$borrarUsuario = new ControladorUsuarios();
							$borrarUsuario->ctrEliminarUsuario(); */

						?>	

				</div>
          

          </div>
        </div>
    </div>
</div>