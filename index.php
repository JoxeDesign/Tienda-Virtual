<?php 
error_reporting(E_ALL ^ E_NOTICE);
require_once('conexion.php');
?>
 <?php
$max=12;
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
    <!-- Slider Area -->
    <div class="slider-area wow fadeIn">
        <div class="zigzag-bottom"></div>
        <div id="slide-list" class="carousel carousel-fade slide" data-ride="carousel">
            
            <div class="slide-bulletz">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <ol class="carousel-indicators slide-indicators">
                                <li data-target="#slide-list" data-slide-to="0" class="active"></li>
                                <li data-target="#slide-list" data-slide-to="1"></li>
                                <li data-target="#slide-list" data-slide-to="2"></li>
                            </ol>                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <div class="single-slide">
                        <div class="slide-bg slide-one"></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="slide-content">
                                                <h2>Carrito de Compras </h2>
                                                <p>Para hacer sus pedido utilizaremos tecnologia de acuerdo a los tiempos de hoy "carrito de compras" adaptado a sus necesidades</p>
                                                <a href="tienda.php" class="readmore">Visite la tienda <i class="fa fa-shopping-cart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-slide">
                        <div class="slide-bg slide-two"></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="slide-content">
                                                <h2>Compre desde su casa</h2>
                                                <p>Nuestra empresa ha sido creada para llevar a su hogar un servicio integral e innovador en la venta de verduras y frutas a domicilio. Frutería</p>
                                                <a href="registro.php" class="readmore">Registrese En Nuestro Sitio <i class="fa fa-users"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-slide">
                        <div class="slide-bg slide-three"></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="slide-content">
                                                <h2>¿Dudas En su compra?</h2>
                                                <p>Déjenos su consulta y pronto nos comunicaremos con usted</p>
                                                <p><a href="mailto:fruteriabilbao@gmail.com">fruteriabilbao@gmail.com</a></p>
                                                <p><a href="tel:+5602 378 3086">(56 02) 378 3086</a></p>
                                                <p>O puede escrubirnos a través de nuestro formulario</p>
                                                <a href="contacto.php" class="readmore">Llene EL Formulario</a>
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
    </div> <!-- End slider area -->
    
    <div class="promo-area wow fadeIn">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
               <h2 class="section-title wow fadeIn">Nosotros</h2>
               <article class="col-md-6 wow fadeIn">
                   <h3>Reciba sus Productos en la Comodidad de su Hogar</h3>
                   <p>Nuestro servicio de verduras y frutas a domicilio a través de FRUTERIA BILBAO le proporciona la seguridad y calidad en sus compras desde la comodidad de su hogar, oficina o lugar de trabajo, usted puede hacer su pedido via internet con nuestro moderno sistema de "carrito de compras" incorporado a este sitioweb.</p>
                   <a href="nosotros.php" class="readmore">Lea mas de Nosotros</a>
               </article>
               <article class="col-md-6 wow fadeIn">
                   <h3>Reparto a Domicilio (Verduras, Frutas y más)</h3>
                   <ul class="list-unstyled">
                       <li><b>Compra Mínima:</b> La cantidad mínima de compra es $ 15.000.</li>
                       <li><b>Días de Entrega:</b>De Lunes a Sabado.</li>
                       <li><b>Horarios de Pedidos:</b> Frutería Bilbao entrega su pedido durante las tardes con la verduras frescas de la mañana.</li>
                       <li><b>Forma de Pago:</b> Una vez confirmado su pedido, usted recibira sus productos al recepcionar su pedido. El pago se hará en efectivo, cheque o transferencia bancaria.</li>
                       <li><b>Carrito de Compras:</b> Para hacer sus pedido utilizaremos tecnologia de acuerdo a los tiempos de hoy "carrito de compras" adaptado a sus necesidades</li>
                   </ul>
               </article>
            </div>
        </div>
    </div> <!-- End promo area -->
    
    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <h2 class="section-title">Últimos Productos</h2>
                <?php  while ($row = $resource->fetch_assoc()){?>
                <div class="col-md-4 wow fadeIn">
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
                <center>
                    <a href="tienda.php" class="btn btn-success">Ver todos los Productos</a>
                </center>
            </div>
        </div>
    </div> <!-- End product widget area -->
    <!-- Footer -->
    <?php include("footer.php");?><!-- End Footer -->
    <!-- JS -->
    <?php include("js.php");?><!-- End JS -->
  </body>
</html>