<?php 
error_reporting(E_ALL ^ E_NOTICE);
require_once('conexion.php');
?>
<?php 
if(!$_SESSION[user_id]){
$_SESSION[volver]=$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
header("Location: login.php");
}
?>
<?php
	if($_POST[enviar] == "Modificar"){
		echo $q="UPDATE `clientes` SET `email` = '$_POST[email]', `telefono` = '$_POST[telefono]', `nacionalidad` = '$_POST[nacionalidad]', `direccion` = '$_POST[direccion]', `numero` = '$_POST[numero]', `comuna` = '$_POST[comuna]', `contrasena` = '$_POST[contrasena]' WHERE `clientes`.`id` = $_POST[id];";
		$resource=$conn->query($q);
		header("Location: index.php");
	}
?>
<?php
if($_GET[id]==0){
       header("Location: index.php"); 
        }
$query=" SELECT * FROM clientes WHERE id='$_GET[id]'";
$resource = $conn->query($query); 
$total = $resource->num_rows;
$row = $resource->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <?php include("head.php");?>
    <style>
    .descuento{
        display: none;
        background-color: greenyellow;
    }  
    #success_message{ 
        display: none;
    }
    </style>
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
                        <h2>Ingreso / Registro</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
			    <form class="well form-horizontal" method="post"  id="Modificar" name="Modificar">
					<fieldset>

					<!-- Nombre de Formulario -->
					<legend><center><h2><b>Actualiza tus Datos</b></h2></center></legend><br>

					<!-- Nombre input-->

					<div class="form-group">
					  <label class="col-md-4 control-label">Nombre</label>  
					  <div class="col-md-4 inputGroupContainer">
					  <div class="input-group">
					  <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
					  <input  name="nombre" id="nombre" placeholder="Ingrese Nombre de Producto" class="form-control"  type="text" value="<?php echo $row[nombre]?>" disabled>
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
					  <input  name="usuario" id="usuario" placeholder="Usuario" class="form-control"  type="text" value="<?php echo $row[usuario]?>" disabled>
					    </div>
					  </div>
					</div>

					<!-- Text input-->

					<div class="form-group">
					  <label class="col-md-4 control-label">Actualizar Contraseña</label> 
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
    </div>
    <!-- Footer -->
    <?php include("footer.php");?><!-- End Footer -->   
    <!-- JS -->
    <?php include("js.php");?><!-- End JS -->
  </body>
</html>