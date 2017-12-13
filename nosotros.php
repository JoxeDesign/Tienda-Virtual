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
    
    <!-- Encabezado -->
    <div class="product-big-title-area padd">
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
            <div class="row padd-y-b-10">
                <h3 class="text-center padd-y-b-10">Bienvenidos a Frutería Bilbao</h3>
                <article class="col-md-6">
                    <h4><i class="fa fa-truck"></i> Reciba sus Productos en la Comodidad de su Hogar</h4>
                    <p>Nuestro servicio de verduras y frutas a domicilio a través de FRUTERIA BILBAO le proporciona la seguridad y calidad en sus compras desde la comodidad de su hogar, oficina o lugar de trabajo, usted puede hacer su pedido via internet con nuestro moderno sistema de "carrito de compras" incorporado a este sitioweb.</p>
                    <p>Nuestra empresa ha sido creada para llevar a su hogar un servicio integral e innovador en la venta de verduras y frutas a domicilio. Frutería Bilbao Ofrece, un concepto de vida saludable basado en una alimentación sana y natural.</p>
                    <p>Para ello, buscamos y seleccionamos los mejores productos, para que disfrute de los sabores y aromas que ofrecen las verduras y frutas frescas.</p>
                </article>
                <article class="col-md-6">
                    <h4><i class="fa fa-truck"></i> Reparto a Domicilio (Verduras, Frutas y más)</h4>
                    <p>La comodidad que presenta el servicio de verduras y frutas a domicilio es extraordinario ya que las ventajas comparativas son muchas</p> 
                    <ul class="list-unstyled">
                        <li>Entrega a domicilio de verduras y frutas frescas de primera calidad.</li>
                        <li>Verduras y frutas seleccionadas y clasificadas, para una entrega de productos en óptimas condiciones.</li>
                        <li>Los mismos precios de ferias libres.</li>
                        <li>Mejor relación precio y calidad.</li>
                        <li>Economía en sus compras en tiempo y dinero.</li>
                        <li>Más tiempo para dedicar a su familia.</li>
                        <li>Compra fácil y rápida, con gran comodidad para el cliente.</li>
                        <li>Sin costos de envío (Sobre $50.000 en compras)</li>
                        <li>Descubres las ventajas de comprar desde la comodidad de su hogar.</li>
                    </ul>   
                </article>
            </div>
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
                            <i class="fa fa-cart-plus"></i>
                            <p>Compre ahora directo desde su casa</p>
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