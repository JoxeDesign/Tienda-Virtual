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
      $q="SELECT * FROM compras WHERE 1 AND cliente='$_SESSION[user_id]' ORDER BY fecha DESC";
      $r = $conn->query($q); 
      $t = $r->num_rows;
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <?php include("head.php");?>
    <style>
    .descuento{
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
                        <h2>Gracias Por Su Preferencia</h2>
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
                        <div class="woocommerce">

                            <h2>Su Compra Fué Realizada con Éxito</h2>
                            <div class="table-responsive col-xs-12">
                                    <table cellspacing="0" class="shop_table cart">
                                        <thead>
                                            <tr>
                                                <th class="product-thumbnail"><i class="fa fa-file-image-o" aria-hidden="true"></i> Foto</th>
                                                <th class="product-name"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Producto</th>
                                                <th class="product-price"><i class="fa fa-usd" aria-hidden="true"></i> Precio</th>
                                                <th class="product-quantity">Cantidad</th>
                                                <th class="product-subtotal"><i class="fa fa-usd" aria-hidden="true"></i> Total</th>
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
                                            </tr>
                                            <?php }?>  
                                        </tbody>
                                    </table>
                                </div>
                            <div class="cart_totals col-xs-12 wow fadeIn">
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
                                        </tbody>
                                    </table>
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