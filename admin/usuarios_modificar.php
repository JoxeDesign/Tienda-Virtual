<?php 
error_reporting(E_ALL ^ E_NOTICE);
if(!isset($_SESSION))session_start();
if(!$_SESSION[admin_id]){
$_SESSION[volver]=$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
header("Location: index.php");
}
require_once('../conexion.php'); ?>
<?php
	if($_POST[enviar] == "Modificar"){
		echo $q="UPDATE `clientes` SET `nombre` = '$_POST[nombre]', `email` = '$_POST[email]', `telefono` = '$_POST[telefono]', `nacionalidad` = '$_POST[nacionalidad]', `direccion` = '$_POST[direccion]', `numero` = '$_POST[numero]', `comuna` = '$_POST[comuna]', `usuario` = '$_POST[usuario]', `contrasena` = '$_POST[contrasena]' WHERE `clientes`.`id` = $_POST[id];";
		$resource=$conn->query($q);
		header("Location: listado_usuarios.php");
	}
?>
<?php
if($_GET[id]==0){
       header("Location: listado_usuarios.php"); 
        }
$query=" SELECT * FROM clientes WHERE id='$_GET[id]'";
$resource = $conn->query($query); 
$total = $resource->num_rows;
$row = $resource->fetch_assoc();
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
		<title>Modifica Productos</title>
		
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
    $('#Modificar').bootstrapValidator({
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
                        message: 'Ingrese su Nombre'
                    }
                }
            },
			 usuario: {
                validators: {
                     stringLength: {
                        min: 8,
                    },
                    notEmpty: {
                        message: 'EL Usuario debe tener al menos 8 caracteres'
                    }
                }
            },
			 contrasena: {
                validators: {
                     stringLength: {
                        min: 8,
                    },
                    notEmpty: {
                        message: 'La contraseña debe tener al menos 8 caracteres'
                    }
                }
            },
			email: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese una dirección de Email'
                    },
                    emailAddress: {
                        message: 'Ingrese una dirección de Email Válida'
                    }
                }
            },

            numero: {
                validators: {
                     stringLength: {
                        min: 3,
                    },
                    notEmpty: {
                        message: 'Ingrese la numeración de Calle'
                    }
                }
            },
            direccion: {
                validators: {
                     stringLength: {
                        min: 8,
                    },
                    notEmpty: {
                        message: 'Ingrese el Nombre de la calle'
                    }
                }
            },
            comuna: {
                validators: {
                     stringLength: {
                        min: 8,
                    },
                    notEmpty: {
                        message: 'Ingrese la Comuna de residencia'
                    }
                }
            },              
            telefono: {
                validators: {
                  stringLength: {
                        min: 9, 
                    notEmpty: {
                        message: 'Ingrese un teléfono válido.'
                     }
                }
            },
			nacionalidad: {
                validators: {
                    notEmpty: {
                        message: 'Seleccione una Nacionalidad'
                    }
                }
            },
                }
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
			    <form class="well form-horizontal" method="post"  id="Modificar" name="Modificar"> 
					<fieldset>

					<!-- Nombre de Formulario -->
					<legend><center><h2><b>Modifica Usuarios</b></h2></center></legend><br>

					<!-- Nombre input-->

					<div class="form-group">
					  <label class="col-md-4 control-label">Nombre</label>  
					  <div class="col-md-4 inputGroupContainer">
					  <div class="input-group">
					  <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
					  <input  name="nombre" id="nombre" placeholder="Ingrese Nombre de Producto" class="form-control"  type="text" value="<?php echo $row[nombre]?>">
					    </div>
					  </div>
					</div>
					<!-- Email input-->
					<div class="form-group">
					  <label class="col-md-4 control-label">E-Mail</label>  
					    <div class="col-md-4 inputGroupContainer">
					    <div class="input-group">
					        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
					  <input name="email" id="email" placeholder="Ingrese su Email" class="form-control"  type="email" value="<?php echo $row[email]?>">
					    </div>
					  </div>
					</div>
					
					<!-- Teléfono input-->
					       
					<div class="form-group">
					  <label class="col-md-4 control-label">Teléfono</label>  
					    <div class="col-md-4 inputGroupContainer">
					    <div class="input-group">
					        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
					  <input name="telefono" id="telefono" class="form-control" type="text" value="<?php echo $row[telefono]?>" placeholder="+56 9 / +56 2">
					    </div>
					  </div>
					</div>

					
					
					<!-- Select -->
					<div class="form-group"> 
						<label class="col-md-4 control-label">Nacionalidad</label>
							<div class="col-md-4 selectContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
									<select name="nacionalidad" id="nacionalidad" class="form-control selectpicker">
									  <option value=" ">Seleccione País</option>
									  <option value="Chile" <?php if($row[nacionalidad]=="Chile") echo selected ?>>Chile</option>
									  <option value="Argentina" <?php if($row[nacionalidad]=="Argentina") echo selected ?>>Argentina</option>
									  <option value="Brasil" <?php if($row[nacionalidad]=="Brasil") echo selected ?>>Brasil</option>
									  <option value="Perú" <?php if($row[nacionalidad]=="Perú") echo selected ?>>Perú</option>
									  <option value="Bolivia" <?php if($row[nacionalidad]=="Bolivia") echo selected ?>>Bolivia</option>
									  <option value="Colombia" <?php if($row[nacionalidad]=="Colombia") echo selected ?>>Colombia</option>
									  <option value="Ecuador" <?php if($row[nacionalidad]=="Ecuador") echo selected ?>>Ecuador</option>
									  <option value="Paraguay" <?php if($row[nacionalidad]=="Paraguay") echo selected ?>>Paraguay</option>
									  <option value="Uruguay" <?php if($row[nacionalidad]=="Uruguay") echo selected ?>>Uruguay</option>
									  <option value="Venezuela" <?php if($row[nacionalidad]=="Venezuela") echo selected ?>>Venezuela</option>
									</select>
							  </div>
							</div>
					</div>

					<!-- Dirección input-->
					       	      
					<div class="form-group">
					  <label class="col-md-4 control-label">Dirección</label>  
					    <div class="col-md-4 inputGroupContainer">
					    <div class="input-group">
					        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
					  <input name="direccion" id="direccion" placeholder="Calle" class="form-control" type="text" value="<?php echo $row[direccion]?>">
					    </div>
					  </div>
					</div>
					
					<!-- Número Dirección input-->
					       
					<div class="form-group">
					  <label class="col-md-4 control-label">Número</label>  
					    <div class="col-md-4 inputGroupContainer">
					    <div class="input-group">
					        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
					  <input name="numero" id="numero" placeholder="N°" class="form-control" type="text" value="<?php echo $row[numero]?>">
					    </div>
					  </div>
					</div>
					       
					<!-- Comuna input-->
					       	      
					<div class="form-group">
					  <label class="col-md-4 control-label">Comuna</label>  
					    <div class="col-md-4 inputGroupContainer">
					    <div class="input-group">
					        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
					  <input name="comuna" id="comuna" placeholder="Comuna" class="form-control" type="text" value="<?php echo $row[comuna]?>">
					    </div>
					  </div>
					</div>

					<!-- Text input-->

					<div class="form-group">
					  <label class="col-md-4 control-label">Usuario</label>  
					  <div class="col-md-4 inputGroupContainer">
					  <div class="input-group">
					  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					  <input  name="usuario" id="usuario" placeholder="Usuario" class="form-control"  type="text" value="<?php echo $row[usuario]?>">
					    </div>
					  </div>
					</div>

					<!-- Text input-->

					<div class="form-group">
					  <label class="col-md-4 control-label">Contraseña</label> 
					    <div class="col-md-4 inputGroupContainer">
					    <div class="input-group">
					  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					  <input name="contrasena" placeholder="Contraseña" class="form-control"  type="text" value="<?php echo $row[contrasena]?>">
					    </div>
					  </div>
					</div>

					
					<!-- Success message -->
					<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>

					<!-- Button -->
					<div class="form-group">
					  <label class="col-md-4 control-label"></label>
					  <div class="col-md-4"><br>
					   <input type="submit" class="btn btn-success" name="enviar" value="Modificar" id="btn">
					  </div>
					</div>

					</fieldset>
					<input type="hidden" name="id" id="id" value="<?php echo $row[id]?>">
				</form>
				
			</div><!-- /.container -->
			 <?php 
                include("footer.php"); 
            ?>
		</body>
</html>