<?php 
error_reporting(E_ALL ^ E_NOTICE);
require_once('../conexion.php'); ?>
<?php if(!isset($_SESSION))session_start();?>
<?php
if((isset($_POST[usuario]) && $_POST[usuario]<>"") && (isset($_POST[contrasena]) && $_POST[contrasena]<>"") ){
$query="SELECT * FROM administradores WHERE usuario='$_POST[usuario]' AND contrasena='$_POST[contrasena]'";
$resource=$conn->query($query);
if($t=$resource->num_rows){
$row=$resource->fetch_assoc();
$_SESSION[admin_id]=$row[id];
$_SESSION[nombre]=$row[nombre];
$_SESSION[email]=$row[email];
$_SESSION[telefono]=$row[telefono];
$_SESSION[pais]=$row[pais];
$_SESSION[direccion]=$row[direccion];
$volver=($_SESSION[volver])?$_SESSION[volver]:"	../admin/listado_productos.php";
header("Location: ".$volver);
} else {
$error="Usuario/Clave no registrados";
}
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css">
	
		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		<title>Ingreso Administrador | Frutas y Verduras</title>
		
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
    $('#registro').bootstrapValidator({
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
                        min: 1,
                    },
                    notEmpty: {
                        message: 'EL Usuario debe tener al menos 8 caracteres'
                    }
                }
            },
			 contrasena: {
                validators: {
                     stringLength: {
                        min:5,
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
        ?>
		    <div class="container">
			    <form class="well form-horizontal" method="post"  id="registro" name="fRegistro">
					<fieldset>

					<!-- Nombre de Formulario -->
					<legend><center><h2><b>Inicio de Sesión Administrador de Sistema</b></h2></center></legend><br>

					<!-- Text input-->

					<div class="form-group">
					  <label class="col-md-4 control-label">Usuario</label>  
					  <div class="col-md-4 inputGroupContainer">
					  <div class="input-group">
					  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					  <input  name="usuario" id="usuario" placeholder="Usuario" class="form-control"  type="text">
					    </div>
					  </div>
					</div>

					<!-- Text input-->

					<div class="form-group">
					  <label class="col-md-4 control-label">Contraseña</label> 
					    <div class="col-md-4 inputGroupContainer">
					    <div class="input-group">
					  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					  <input name="contrasena" placeholder="Contraseña" class="form-control"  type="password">
					    </div>
					  </div>
					</div>

					<!-- Select Basic -->

					<!-- Success message -->
					<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>

					<!-- Button -->
					<div class="form-group">
					  <label class="col-md-4 control-label"></label>
					  <div class="col-md-4"><br>
					   <input type="submit" class="btn btn-success" value="Ingresar" name="registro" id="registro">
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