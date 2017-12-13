    <div class="footer-top-area wow fadeIn">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-about-us">
                        <a href="index.php"><img src="img/logo-fruteria-gray.png" alt="Logo Frutería Bilbao 610 Gris"></a>
                        <p>Nuestra empresa ha sido creada para llevar a su hogar un servicio integral e innovador en la venta de verduras y frutas a domicilio. Frutería Bilbao Ofrece, un concepto de vida saludable basado en una alimentación sana y natural.</p>
                        <div class="footer-social">
                            <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="https://twitter.com/?lang=es" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="https://www.youtube.com/" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="https://www.linkedin.com/" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Navegación de Usuario</h2>
                        <ul>
                            <?php if($_SESSION[user_id]){?>
                            <li><a href="mis-datos.php?id=<?php echo $_SESSION[user_id]?>"><i class="fa fa-user" aria-hidden="true"></i> Mis datos</a></li>
                            <li><a href="carrito.php"><i class="fa fa-shopping-cart"></i> Mi Carrito</a></li>
                            <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Salir</a></li>
                            <?php }else{?>
                            <li><a href="login.php"><i class="fa fa-sign-in"></i>Iniciar Sesión</a></li>
                            <li><a href="registro.php"><i class="fa fa-user"></i> Registrarse</a></li>
                            <?php }?>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Newsletter</h2>
                        <p>Regístrese en nuestro boletín y obtenga ofertas exclusivas que no encontrará en ningún otro sitio directamente a correo electrónico</p>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="Ingrese su Email">
                                <input type="submit" value="Suscribirse">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->
    <footer class="footer-bottom-area wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2017 Frutería Bilbao 610. Todos Los Derechos Reservados. Creado con mucho <i class="fa fa-heart"></i> por <a href="https://www.behance.net/josemachucasazo" target="_blank">José Machuca</a></p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <span>Pago seguro con </span>
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </footer> <!-- End footer bottom area -->