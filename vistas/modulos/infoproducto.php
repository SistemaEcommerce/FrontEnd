<?php
  $url=Ruta::ctrRuta();
  $servidor=Ruta::ctrRutaServidor();

?>
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

<div class="container-fluidinfoproductos">
    <div class="container">
        <div class="row">
        
            <div class="col-md-5 col-sm-6 col-xs-12 visorImg">
                
                <figure>
                <!-- Place somewhere in the <body> of your page -->
                    <div class="flexslider">
                        <ul class="slides">
                            <li>
                                <img  class="img-thumbnail" src="http://localhost/SistemasPhp/SistemaEcommer/BackEnd/vistas/img/multimedia/tennis-verde/img-01.jpg" alt="Imagen de Infoproductos">
                             </li>
                            <li>
                                <img  class="img-thumbnail" src="http://localhost/SistemasPhp/SistemaEcommer/BackEnd/vistas/img/multimedia/tennis-verde/img-02.jpg" alt="Imagen de Infoproductos">                      
                            </li>
                            <li>
                                <img  class="img-thumbnail" src="http://localhost/SistemasPhp/SistemaEcommer/BackEnd/vistas/img/multimedia/tennis-verde/img-03.jpg" alt="Imagen de Infoproductos">                        
                                </li>
                            <li>
                                <img  class="img-thumbnail" src="http://localhost/SistemasPhp/SistemaEcommer/BackEnd/vistas/img/multimedia/tennis-verde/img-04.jpg" alt="Imagen de Infoproductos">                        
                            </li>
                        </ul>
                    </div>
                    
                </figure>
                   
               

                   
            </div>

        </div>
    </div>
</div>