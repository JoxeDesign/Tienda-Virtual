<?php 
error_reporting(E_ALL ^ E_NOTICE);
require_once('conexion.php');
?>
 <?php
$max=9;
$pag=0;
if(isset($_GET[pag]) && $_GET[pag] <>""){
$pag=$_GET[pag];
}
$inicio=$pag * $max;
$query=" SELECT * FROM productos ORDER BY fecha DESC";
$query_limit= $query ." LIMIT $inicio,$max";
$resource = $conn->query($query_limit);
if (isset($_GET[total])) {
$total = $_GET[total];
} else {
$resource_total = $conn -> query($query);
$total = $resource_total->num_rows;
}
$total_pag = ceil($total/$max)-1;
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
    
    <!-- Encabezado -->
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Nosotros</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Encabezado -->
    
    
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-thumbs-o-up"></i>
                        <p>Política de devolución al instante</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-truck"></i>
                        <p>Despacho Gratis Sobre Los $50.000</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-lock"></i>
                        <p>Pague Seguro con Sus Tarjetas Bancarias</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <a href="tienda.php">
                            <i class="fa fa-cart-plus"></i>
                            <p>Compre ahora directo desde su casa</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->
    
    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <h2 class="section-title">Últimos Productos</h2>
                <?php  while ($row = $resource->fetch_assoc()){?>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <div class="single-wid-product">
                            <a href="producto.php?id=<?php echo $row[id]?>"><img src="img/<?php echo $row[codigo]?>.jpg" alt="" class="product-thumb img-thumbnail"></a>
                            <h2><a href="producto.php?id=<?php echo $row[id]?>"><?php echo $row[nombre]?></a></h2>
                            <div class="product-wid-price">
                               <ins>$ <?php echo $row[precio]?> <?php echo $row[unidad]?></ins> Antes $<del><?php echo $row[precio]+($row[precio]*0.4)?></del>
                            </div>                            
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div> <!-- End product widget area -->
    
    <!-- Footer -->
    <?php include("footer.php");?><!-- End Footer -->
    <!-- JS -->
    <?php include("js.php");?><!-- End JS -->
  </body>
</html>