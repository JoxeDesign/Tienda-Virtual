<?php 
error_reporting(E_ALL ^ E_NOTICE);
if(!isset($_SESSION))session_start();
if(!$_SESSION[admin_id]){
$_SESSION[volver]=$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
header("Location: index.php");
}
require_once('../conexion.php'); ?>
<?php
	if($_POST[agregarProducto] == "agregarProducto"){
		$unidad=implode(',',$_POST[unidad]);
		$q="INSERT INTO `productos` (`id`, `nombre`, `codigo`, `categoria`, `frase_promocional`, `unidad`, `precio`, `disponibilidad`, `descripcion`, `promocion`, `fecha`) VALUES (NULL, '$_POST[nombre]', '$_POST[codigo]', '$_POST[categoria]', '$_POST[frase_promocional]', '$unidad', '$_POST[precio]', '$_POST[disponibilidad]', '$_POST[descripcion]', '$_POST[promocion]', CURRENT_TIMESTAMP)";
		//echo($q);
		$resource=$conn->query($q);
		header("Location: listado_productos.php");
	}
?>
<!DOCTYPE html>
<html lang="es">
    <head> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8"> 
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css">
	
		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		<title>Ingreso de Productos</title>
		
		<style>
			#success_message{ 
				display: none;
			}
		</style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js"></script>
		<script type="text/javascript">
			  $(document).ready(function() {
    $('#agregarProducto').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nombre: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                        notEmpty: {
                        message: 'Ingrese Nombre del Producto'
                    }
                }
            },
			 codigo: {
                validators: {
                     stringLength: {
                        min: 6,
                    },
                    notEmpty: {
                        message: 'Ingrese Codigo del Producto (Mínimo 6 caracteres)'
                    }
                }
            },
			 categoria: {
                validators: {
                     stringLength: {
                        min: 5,
                    },
                    notEmpty: {
                        message: 'Ingrese la cetegoría del Producto'
                    }
                }
            },
			disponibilidad: {
                validators: {
                     stringLength: {
                        min: 1,
                    },
                    notEmpty: {
                        message: 'Ingrese la cetegoría del Producto'
                    }
                }
            },
			frase_promocional: {
                validators: {
                     stringLength: {
                        min: 20,
                    },
                    notEmpty: {
                        message: 'Ingrese Frase Promocional (Mínimo 20 caracteres)'
                    }
                }
            },
			descripcion: {
                validators: {
                     stringLength: {
                        min: 20,
                    },
                    notEmpty: {
                        message: 'Ingrese Descripción Del Producto (Mínimo 20 caracteres)'
                    }
                }
            },
           	unidad: {
                validators: {
                    notEmpty: {
                        message: 'Seleccione Mínimo un color'
                    }
                }
            },
            precio: {
                validators: {
                     stringLength: {
                        min: 1,
                    },
                    notEmpty: {
                        message: 'Ingrese Precio del Producto'
                    }
                }
            },              
           }
        })
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#contact_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});
		</script>
	</head>
		<body>
         <?php 
            include("header.php"); 
            include("menu_admin.php"); 
        ?>
		    <div class="container">
			    <form class="well form-horizontal" method="post"  id="agregarProducto" name="registro">
					<fieldset>

					<!-- Nombre de Formulario -->
					<legend><center><h2><b>Mantenedor de Productos</b></h2></center></legend><br>

					<!-- Nombre input-->

					<div class="form-group">
					  <label class="col-md-4 control-label">Nombre</label>  
					  <div class="col-md-4 inputGroupContainer">
					  <div class="input-group">
					  <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
					  <input  name="nombre" id="nombre" placeholder="Ingrese Nombre de Producto" class="form-control"  type="text">
					    </div>
					  </div>
					</div>
					
					<!-- Email input-->
					      	<div class="form-group">
							  <label class="col-md-4 control-label">Código</label>  
							    <div class="col-md-4 inputGroupContainer">
							    <div class="input-group">
							        <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
							  		<input name="codigo" id="codigo" placeholder="Ingrese Código" class="form-control"  type="text" style="text-transform: uppercase">
							    </div>
							  </div>
							</div>

					<!-- Categoría input-->
					       
					<div class="form-group"> 
					 	<label class="col-md-4 control-label">Categorías</label>
							<div class="col-md-4 selectContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
									<select name="categoria" id="categoria" class="form-control selectpicker" >
										<option value=" " >Seleccione una categoria</option>
									 	<option value="Frutas">Frutas</option>
									 	<option value="Legumbres">Legumbres</option>
									 	<option value="Congelados">Congelados</option>
									 	<option value="Coctel">Coctel</option>
									 	<option value="Verduras">Verduras</option>
									</select>
								</div>
							</div>
					</div>

					<!-- Frase Promocional -->
					       	      
					<div class="form-group">
					  <label class="col-md-4 control-label">Frase Promocional</label>  
					    <div class="col-md-4 inputGroupContainer">
					    <div class="input-group">
					        <span class="input-group-addon"><i class="glyphicon glyphicon-align-left"></i></span>
				    	<textarea name="frase_promocional" id="frase_promocional" cols="30" rows="10" placeholder="Ingrese Frase Promocional" class="form-control" type="text"></textarea>
					    </div>
					  </div>
					</div>
					
					<!-- Select Colores -->
					<div class="form-group"> 
					 	<label class="col-md-4 control-label">Unidad de medida</label>
							<div class="col-md-4 selectContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
									<select name="unidad[]" id="colores" class="form-control selectpicker" >
										<option value=" " >Seleccione Unidad de Medida</option>
									 	<option value="Unidad">Unidad</option>
									 	<option value="1 Kilo">1 Kilo</option>
									 	<option value="900g">900g</option>
									 	<option value="800g">800g</option>
									 	<option value="700g">700g</option>
									 	<option value="600g">600g</option>
									 	<option value="500g">500g</option>
									 	<option value="400g">400g</option>
                                        <option value="300g">300g</option>
                                        <option value="200g">200g</option>
                                        <option value="100g">100g</option>
                                        <option value="900g">900g</option>
                                        <option value="1Litro">1Litro</option>
									 	<option value="1/2Litro">1/2Litro</option>
									</select>
								</div>
							</div>
					</div>
					<!-- Precio -->
					       
					<div class="form-group">
					  <label class="col-md-4 control-label">Precio</label>  
					    <div class="col-md-4 inputGroupContainer">
					    <div class="input-group">
					        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
					  	<input name="precio" id="precio" placeholder="Ingrese Precio $" class="form-control" type="text">
					    </div>
					  </div>
					</div>


					<!-- Disponibilidad -->
					 <div class="form-group">
						 <label class="col-md-4 control-label">Disponibilidad</label>
						 <div class="col-md-4 inputGroupContainer">        	      
							<div class="radio">
							  <label><input type="radio" name="disponibilidad" value="1" required>Si</label>
							</div>
							<div class="radio">
							  <label><input type="radio" name="disponibilidad" value="0" required>No</label>
							</div>
						 </div>
					</div>

					<!-- Descripción -->
					       	      
					<div class="form-group">
					  <label class="col-md-4 control-label">Descripción</label>  
					    <div class="col-md-4 inputGroupContainer">
					    <div class="input-group">
					        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
				    	<textarea name="descripcion" id="descripcion" cols="30" rows="10" placeholder="Ingrese Descripción" class="form-control" type="text"></textarea>
					    </div>
					  </div>
					</div>
					
					<!-- En Promoción -->
					 <div class="form-group">
						 <label class="col-md-4 control-label">En Promoción</label>
						 <div class="col-md-4 inputGroupContainer">        	      
							<div class="radio">
							  <label><input type="radio" name="promocion" value="1" required>Si</label>
							</div>
							<div class="radio">
							  <label><input type="radio" name="promocion" value="0" required>No</label>
							</div>
						 </div>
					</div>

					
					<!-- Success message -->
					<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>

					<!-- Button -->
					<div class="form-group">
					  <label class="col-md-4 control-label"></label>
					  <div class="col-md-4"><br>
					   <input type="submit" class="btn btn-success" value="agregarProducto" name="agregarProducto" id="agregarProducto">
					  </div>
					</div>

					</fieldset>
				</form>
			</div><!-- /.container -->
			 <?php 
                include("footer.php"); 
            ?>
		</body>
</html>