<?php 
error_reporting(E_ALL ^ E_NOTICE);
require_once('conexion.php');
?>
<?php
$max=24;
$por_pagina = 24;
$pag=0;
if(isset($_GET["pag"]) && $_GET["pag"] <>""){
    $pag=$_GET["pag"];
}
$inicio=$pag * $max;

if (isset($_GET["total"]) && $pag != 0) {
    $total = $_GET["total"];
    $por_pagina = $por_pagina*($pag+1);
}

$consulta = (isset($_REQUEST["consulta"]))? $_REQUEST["consulta"] : "";

if($consulta != ""){

    $pre    = (isset($_REQUEST["pre"]))?  $_REQUEST["pre"] : "";
    $cat    = (isset($_REQUEST["cat"]))?  $_REQUEST["cat"] : "";
    $s      = (isset($_REQUEST["s"]))?    $_REQUEST["s"]   : "";

    if($pre != ""){
        $list = explode(";",$pre);
        $desde = $list[0];
        $hasta = $list[1];
        $conditions[] = " precio BETWEEN '$desde' AND '$hasta' ";
    }
    if($cat != ""){
        $cat = utf8_decode($cat);
        $conditions[] = " categoria = '$cat' ";
    }
    if($s != ""){
        $conditions[] = " (nombre LIKE '%$s%' OR descripcion LIKE '%$s%' OR frase_promocional LIKE '%$s%' ) ";
    }

    $query =   "SELECT id,nombre,codigo, frase_promocional, precio FROM productos
            ";

    if(isset($conditions)){
        $query .= " WHERE ".implode(" AND ",$conditions);
    }

    $query .= " ORDER BY fecha DESC
            ";
    
    $query_limit = $query." LIMIT $inicio,$max";
    
}
else{
    
    $query = "SELECT * FROM productos ORDER BY codigo
             ";
    
    $query_limit = $query." LIMIT $inicio,$max";
       
}
    
$qMaximoPrecio = "SELECT MIN(precio) AS precio_min, MAX(precio) AS precio_max FROM productos";
$respMaximoPrecio = $conn->query($qMaximoPrecio);
$rowMaximoPrecio = $respMaximoPrecio->fetch_assoc();

$minPrecio = $rowMaximoPrecio["precio_min"];
$maxPrecio = $rowMaximoPrecio["precio_max"];

/*
if(isset($_GET[s]) && $_GET[s]<>""){
$whe=" AND (nombre LIKE '%$_GET[s]%' OR descripcion  LIKE '%$_GET[s]%' OR frase_promocional  LIKE '%$_GET[s]%') ";
$dir="&s=$_GET[s]";}

if(isset($_GET[cat]) && $_GET[cat]<>""){
$whe.=" AND categoria = '$_GET[cat]' ";
$dir.="&cat=$_GET[cat]";
}

if(isset($_GET[pre]) && $_GET[pre]<>""){
list($desde,$hasta)=explode("-",$_GET[pre]);
$whe.=" AND precio >= '$desde' AND precio <= '$hasta' "; $dir.="&pre=$_GET[pre]";
}
*/

//echo "<pre>$query</pre>";
//echo "<pre>$query_limit</pre>";
?>

<?php
/*$max=12;
$pag=0;
if(isset($_GET[pag]) && $_GET[pag] <>""){
$pag=$_GET[pag];
}
$inicio=$pag * $max;
$query=" SELECT nombre, frase_promocional, precio FROM productos ORDER BY fecha DESC";
$query_limit= $query ." LIMIT $inicio,$max";

if (isset($_GET[total])) {
$total = $_GET[total];
} else {

*/

$resource = $conn -> query($query);

$resource_limit = $conn->query($query_limit);
$total = $resource->num_rows;

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
        
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center padd-y-b-10">
                        <h2 class="wow fadeIn">Tienda</h2>
                        <h3 class="product-bit-title wow fadeIn">Filtros de Productos</h3>
                        <form class="form-inline" action="" method="get">
                            <input type="hidden" name="consulta" value="1" />
                            <select name="pre" id="" class="form-control" onChange="submit();">
                                <option value="">Rangos de Precios</option>
                                <option value="<?php echo $minPrecio; ?>;999" <?php if($_GET["pre"] == "".$minPrecio.";999") echo "selected"; ?>>Entre $<?php echo $minPrecio; ?> y $1.000</option>
                                <option value="1000;1999" <?php if($_GET["pre"] == "1000;1999") echo "selected"; ?>>Entre $1.000 y $2.000</option>
                                <option value="2000;2999" <?php if($_GET["pre"] == "2000;2999") echo "selected"; ?>>Entre $2.000 y $3.000</option>
                                <option value="3000;3999" <?php if($_GET["pre"] == "3000;3999") echo "selected"; ?>>Entre $3.000 y $4.000</option>
                                <option value="4000;4999" <?php if($_GET["pre"] == "4000;4999") echo "selected"; ?>>Entre $4.000 y $5.000</option>
                                <option value="5000;<?php echo $maxPrecio; ?>" <?php if($_GET["pre"] == "5000;".$maxPrecio."") echo "selected"; ?>>Sobre $5.000</option>
                            </select>
                            <select name="cat" class="form-control" id="" onChange="javascript: submit();">
                                <option value="">Categorías</option>
                                <?php 
                                $qc="SELECT categoria FROM `productos` GROUP BY categoria";
                                $rc=$conn->query($qc);
                                while($rowc = $rc->fetch_assoc()){
                                    
                                    $categoria  = utf8_encode($rowc["categoria"]);
                                    $cat_get    = $_REQUEST["cat"];
                                    
                                    $selected = "";
                                    if($categoria == $cat_get){
                                        $selected = "selected";
                                    }
                                    
                                    echo '<option value="'.$categoria.'" '.$selected.'>'.$categoria.'</option>';
                                     
                                    } ?>
                            </select>
                            <input type="text" class="form-control" name="s" value="<?php echo $_GET["s"]?>" onChange="submit();" placeholder="Palabra Clave">
                            <input type="submit" class="form-control" value="buscar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
      
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
               <?php  while ($row = $resource_limit->fetch_assoc()){?>
                <div class="col-md-3 col-sm-6 wow fadeIn">
                    <figure class="single-shop-product">
                        <div class="product-upper">
                            <a href="producto.php?id=<?php echo $row[id]?>"> <img src="img/<?php echo $row[codigo]?>.jpg" class="img-responsive img-thumbnail producto-tienda" alt="<?php echo $row[nombre]?>"></a>
                        </div>
                        <h2><a href="producto.php?id=<?php echo $row[id]?>"><?php echo $row[nombre]?></a></h2>
                        <div class="product-carousel-price">
                            <ins>$ <?php echo $row[precio]?> <?php echo $row[unidad]?></ins> Antes $<del><?php echo $row[precio]+($row[precio]*0.4)?></del>
                        </div>  
                        
                        <div class="product-option-shop">
                            <a href="producto.php?id=<?php echo $row[id]?>" class="btn btn-md btn-success"><span class="glyphicon glyphicon-eye-open"></span> Ver Producto</a>
                        </div>                       
                    </figure>
                </div>
                <?php }?>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                            <ul class="pager"> 
                                <?php if($pag-1 >= 0){?>
                                <li><a href="?pag=<?php echo $pag -1;?>&total=<?php echo $total?><?php echo $dir?>">Anterior</a></li>
                                <?php }?>
                                <li> <?php echo $inicio + 1;?> a <?php echo min($inicio + $max, $total) ?> de <?php echo $total;?></li>
                                <?php if($pag +1 <= $total_pag ){?>
                                <li><a href="?pag=<?php echo $pag + 1?>&total=<?php echo $total?><?php echo $dir?>">Siguiente</a></li>
                                <?php }?>
                            </ul>
                        </nav>                        
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