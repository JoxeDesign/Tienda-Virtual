<?php 
error_reporting(E_ALL ^ E_NOTICE);
require_once('conexion.php'); ?>
<?php 
if(!$_SESSION[user_id]){
$_SESSION[volver]=$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
header("Location: login.php");
}
?>
<?php
	if($_POST[comprar] == "Modificar"){
		//print_r($_POST);
		$q="UPDATE `compras` SET `cantidad` = '$_POST[cantidad]' WHERE `compras`.`id` = $_POST[id];";
		//print_r($q);
		$resource=$conn->query($q);
		header("Location: carrito.php");
	}
?>
<?php
if($_GET[id]==0){
            header("Location: index.php"); 
        }
$query=" SELECT * FROM productos WHERE codigo='$_GET[codigo]'";
$resource = $conn->query($query); 
$total = $resource->num_rows;
$row = $resource->fetch_assoc();

$queryCompras=" SELECT * FROM compras WHERE id='$_GET[id]'";
$resourceCompra = $conn->query($queryCompras); 
$total = $resourceCompra->num_rows;
$rowCompra = $resourceCompra->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
  <head>

    <?php include("head.php");?>
    
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
                        <h2><b>Modificar Cantidad </b> <?php echo $row[nombre]?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                
                <div class="col-md-12">
                    <div class="product-content-right">
                        
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="img/<?php echo $row[codigo]?>.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-9">
                                <div class="product-inner">
                                    <h2 class="product-name"><?php echo $row[nombre]?></h2>
                                    <p><i class="fa fa-quote-left" aria-hidden="true"></i> <span class="frase-promo"><?php echo $row[frase_promocional]?> </span><i class="fa fa-quote-right " aria-hidden="true"></i></p>
                                    <div class="product-inner-price">
                                        <ins>$ <?php echo $row[precio]?> <?php echo $row[unidad]?></ins>  
                                        Antes $<del><?php echo $row[precio]+($row[precio]*0.4)?></del>
                                    </div> 

                                    
                                    <form method="post" name="comprar" id="comprar" class="cart">
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="Cantidad" value="<?php echo $rowCompra[cantidad]?>" name="cantidad" min="1" step="1">
                                            <input type="hidden" name="id" id="id" value="<?php echo $_GET[id]?>">
                                            <input type="hidden" name="codigo" id="codigo" value="<?php echo $row[codigo]?>">
                                            <input type="hidden" name="nombre" id="nombre" value="<?php echo $row[nombre]?>">
                                            <input type="hidden" name="precio" id="precio" value="<?php  echo $row[precio]?>">
                                            <input type="hidden" name="cliente" id="cliente" value="<?php echo $_SESSION[user_id]?>">
                                        </div>
                                        <input type="submit" name="comprar" id="comprar" value="Modificar" class="add_to_cart_button">
                                    </form>   
                                    
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Descripción de Producto</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">+ Información</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Descripción de Producto</h2>  
                                                <p><?php echo $row[descripcion]?></p>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <div class="submit-review">
                                                    <p><b>Unidad de Medida:</b> <?php echo $row[unidad]?></p>
                                                    <p><b>Código :</b> <?php echo $row[codigo]?></p>
                                                    <p><b>Categoría :</b> <?php echo $row[categoria]?></p>
                                                    <p><b>¿Producto en Promoción?: </b> <?php echo $row[promocion]?></p>
                                                    <p><b>¿Disponible?: </b> <?php echo $row[disponibilidad]?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include("footer.php");?><!-- End Footer -->
    <!-- JS -->
    <?php include("js.php");?><!-- End JS -->
  </body>
</html>