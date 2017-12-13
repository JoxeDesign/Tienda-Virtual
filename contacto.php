<?php 
error_reporting(E_ALL ^ E_NOTICE);
require_once('conexion.php'); ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <?php include("head.php");?>
    <script>
        $(document).ready(function(){
       $("#formulario").submit(function( event ){
		event.preventDefault();

		$.ajax({
			type: 'POST',
			url: 'enviar-mensaje.php',
			data: $(this).serialize(),
			success: function(data){
				$("#respuesta").slideDown();
				$("#respuesta").html(data);
                $('#respuesta2').modal('show');
                document.getElementById('formulario').reset();
			}
		});

		return false;
	});
});
    </script>
  </head>
  <body>
    <!-- header -->
    <?php include("header.php");?><!-- fin header --> 

    <!-- Menu Principal -->
    <?php include("menu.php");?>    
    <!-- End Menu Principal -->
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Contáctenos</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
			    <form role="form" class="well form-horizontal" method="POST" id="formulario" action="enviar-mensaje.php">
					<fieldset>

					<!-- Nombre de Formulario -->
					<legend><center><h2><b>Formulario de Contacto</b></h2></center></legend><br>

					<!-- Nombre input-->

					<div class="form-group">
					  <label class="col-md-4 control-label">Nombre</label>  
					  <div class="col-md-4 inputGroupContainer">
					  <div class="input-group">
					  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					  <input name="nombre" id="nombre" placeholder="Ingrese su Nombre" class="form-control"  type="text">
					   </div>
					  </div>
					</div>
					
					<!-- Apellido input-->

					<div class="form-group">
					  <label class="col-md-4 control-label">Apellido</label>  
					  <div class="col-md-4 inputGroupContainer">
					  <div class="input-group">
					  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					  <input  name="apellido" id="apellido" placeholder="Ingrese su Apellido" class="form-control"  type="text">
					   </div>
					  </div>
					</div>
					
					<!-- Email input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">E-Mail</label>  
                        <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input name="email" id="email" placeholder="Ingrese su Email" class="form-control"  type="email">
                        </div>
                    </div>
                    </div>

					<!-- Teléfono input-->
					       
					<div class="form-group">
					  <label class="col-md-4 control-label">Teléfono</label>  
					    <div class="col-md-4 inputGroupContainer">
					    <div class="input-group">
					        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
					  <input name="telefono" id="telefono" class="form-control" type="text" placeholder="+562 / +569">
					    </div>
					  </div>
					</div>
					
					<!-- Text area -->
  
                    <div class="form-group">
                        <label class="col-md-4 control-label">Ingrese su Mensaje</label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                <textarea class="form-control" name="comment" placeholder="Su Mensaje" rows="5"></textarea>
                            </div>
                        </div>
                    </div>

					<!-- Button -->
					<div class="form-group">
					  <label class="col-md-4 control-label"></label>
					  <div class="col-md-4"><br>
					   <input type="submit" class="btn btn-success" value="Enviar Mensaje" name="enviar" id="enviar">
					  </div>
					</div>

					</fieldset>
					<div id="respuesta" style="display: none;"></div>
				</form>
			</div><!-- /.container -->
    </div>
    <!-- Footer -->
    <?php include("footer.php");?><!-- End Footer -->   
    <!-- JS -->
    <?php include("js.php");?><!-- End JS -->
  </body>
</html>