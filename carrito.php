<?php 
error_reporting(E_ALL ^ E_NOTICE);
require_once("conexion.php")?>
<?php 
if(!$_SESSION[user_id]){
$_SESSION[volver]=$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
header("Location: login.php");
}
?>
<?php	
	if(isset($_GET[idElm])&& $_GET[idElm]<>""){
		$q="DELETE FROM compras WHERE 1 AND id='$_GET[idElm]'";
		$r=$conn->query($q);
	}
      $q="SELECT * FROM compras WHERE 1 AND cliente='$_SESSION[user_id]' ORDER BY fecha DESC";
      $r = $conn->query($q); 
      $t = $r->num_rows;
      
    $query=" SELECT id, nombre, frase_promocional, precio, codigo, categoria FROM productos ORDER BY fecha DESC";
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
    </style>
  </head>
  <body>
   
    <!-- header -->
    <?php include("header.php");?><!-- fin header -->
    <!-- Menu Principal -->
    <?php include("menu.php");?>    
    <!-- End Menu Principal -->
    
    
    
    <div class="product-big-title-area wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Carrito De Compras</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                               
                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="woocommerce">
                                <div class="table-responsive">
                                    <table cellspacing="0" class="shop_table cart">
                                        <thead>
                                            <tr>
                                                <th class="product-thumbnail"><i class="fa fa-file-image-o" aria-hidden="true"></i> Foto</th>
                                                <th class="product-name"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Producto</th>
                                                <th class="product-price"><i class="fa fa-usd" aria-hidden="true"></i> Precio</th>
                                                <th class="product-quantity">Cantidad</th>
                                                <th class="product-subtotal"><i class="fa fa-usd" aria-hidden="true"></i> Total</th>
                                                <th><i class="fa fa-cart-plus" aria-hidden="true"></i> Cantidad</th>
                                                <th><i class="fa fa-times" aria-hidden="true"></i> Eliminar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php while ($row = $r->fetch_assoc()){?>
                                            <tr class="cart_item wow fadeIn">
                                                <td class="product-thumbnail">
                                                  <img width="145" height="145" alt="<?php echo $row[nombre]?>" class="shop_thumbnail" src="img/<?php echo $row[codigo]?>.jpg">
                                                </td>

                                                <td class="product-name">
                                                    <?php echo $row[nombre]?>
                                                </td>

                                                <td class="product-price">
                                                    <span class="amount">$<?php echo number_format($precio=$row[precio], 0, ',', '.');?>
                                                    </span> 
                                                </td>

                                                <td class="product-quantity">
                                                    <div class="quantity buttons_added">
                                                        <?php echo $cantidad=$row[cantidad]?>
                                                    </div>
                                                </td>

                                                <td class="product-subtotal">
                                                    <span class="amount">$<?php echo number_format($sub=$precio*$cantidad); $subtotal+=$sub?></span> 
                                                </td>
                                                <td>
                                                    <a href="modificar.php?id=<?php echo $row[id];?>&codigo=<?php echo $row[codigo];?>" class="btn btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true" title="modificar"></span></a>
                                                </td>
                                                <td>
                                                    <a href="carrito.php?idElm=<?php echo $row[id]?>" onClick="return confirm('¿Está seguro que desea eliminar esta compra?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                                </td>
                                            </tr>
                                            <?php }?>  
                                        </tbody>
                                    </table>
                                </div>
                            <div class="cart-collaterals wow fadeIn">
                            
                                <div class="cart_totals col-sm-6 col-xs-12">
                                    <h2>Total Carrito</h2>

                                    <table cellspacing="0">
                                        <tbody>
                                            <tr class="shipping">
                                                <th>Costo De Envío</th>
                                                <td>$<?php 
                                                    if($subtotal > 50000){
                                                    $envio=0;
                                                    } elseif($subtotal >25000){
                                                    $envio=2000;
                                                    } else {
                                                    $envio=5000;
                                                    }
                                                    echo number_format($envio,0, ',', '.');?>
                                               </td>
                                            </tr>

                                             <tr id="descuento" <?php if($subtotal <= 50000) : ?>class="descuento"<?php endif;?>>
                                                  <td class="success">Descuento 10%</td>
                                                  <td class="success">-$<?php 
                                                        if($subtotal > 50000){
                                                            echo number_format($descuento=($subtotal) *0.10, 0, ',', '.');                
                                                        }else{
                                                           $descuento=0; 
                                                        }
                                                ?></td>
                                            </tr>
                                            <tr>
                                                <td>Subtotal</td>
                                                <td>$<?php echo number_format($subtotal=($subtotal+$envio)-$descuento, 0, ',', '.');?></td>
                                            </tr>
                                            <tr>
                                                <td>iva 19%</td>
                                                <td>$<?php echo number_format($iva = $subtotal*0.19, 0, ',', '.');?></td>
                                            </tr>

                                            <tr class="order-total">
                                                <th>Total Pedido</th>
                                                <td><strong><span class="amount">$<?php echo number_format($total = $subtotal+$iva, 0, ',', '.');?></span></strong> </td>
                                            </tr>
                                            <tr>
                                                <td>Confirme Su Compra</td>
                                                <td>
                                                    <form id="form1" method="post" action="confirmacion.php">
                                                        <input type="submit" name="button" id="button" value="comprar" class="btn btn-success">
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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