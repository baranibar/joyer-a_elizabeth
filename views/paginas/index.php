    <?php 
        include 'header.php';
    ?>

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <!--<ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>-->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="w-75" src="build/img/joya1_banner.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1">Descubre la Elegancia del Oro</h1>
                                <p class="h3">
                                    Explora nuestra exclusiva colección de joyas de oro puro y encuentra la pieza perfecta para cada ocasión.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="w-75" src="build/img/joya2_banner.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Brilla con Nuestra Plata</h1>
                                <p class="h3">
                                    Descubre las joyas de plata que destacan por su diseño único y su brillo incomparable.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="w-75" src="build/img/joya3_banner.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <div class="text-align-left">
                                    <h1 class="h1">Ofertas Exclusivas en Joyería</h1>
                                    <p class="h3">
                                        Aprovecha nuestros descuentos especiales en una selección de joyas de oro y plata. ¡No te lo pierdas!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->

    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <form method="GET" action="/joyas">
            <div class="row text-center pt-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Conoce nuestras colecciones</h1>
                </div>
            </div>
            <div class="row">
                
                <?php foreach($nuestas_colecciones as $categoria):?> 
                <div class="col-12 col-md-3 p-4 mt-3 ">
                    <a href="joyas?categoria=<?php echo $categoria->id_categoria; ?>"><img src=<?php echo $categoria->imagen1_url; ?> class="rounded-circle img-fluid gold-border"></a>
                    <h5 class="text-center mt-3 mb-3"><?php echo $categoria->nombre; ?></h5>
                    <p class="text-center">
                        <a class="btn btn-primary" href="joyas?categoria=<?php echo $categoria->id_categoria; ?>">Ver más</a>
                    </p>
                </div>
                <?php endforeach; ?>
            </div>
        </form>
    </section>
    <!-- End Categories of The Month -->

    <!-- Start Featured Product -->
    <section class="bg-light">
        <form method="GET" action="/joyas_detalle">
            <div class="container py-5">
                <div class="row text-center py-3">
                    <div class="col-lg-6 m-auto">
                        <h1 class="h1">LO MÁS VENDIDO</h1>
                        <p>
                            Joyas de plata y oro elaboradas a mano por artesanos peruanos
                        </p>
                    </div>
                </div>
                <div class="row">
                    
                    <?php foreach($productos as $producto):?> 
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card h-100 product-card">
                            <a href="joyas_detalle?idproducto=<?php echo $producto->id_producto; ?>">
                                <img src=<?php echo $producto->imagen1_url; ?> class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <ul class="list-unstyled d-flex justify-content-between">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                    </li>
                                    <li class="text-muted text-right product-card price">S/ <?php echo $producto->precio; ?></li>
                                </ul>
                                <a href="joyas_detalle?idproducto=<?php echo $producto->id_producto; ?>" class="h2 text-decoration-none text-dark"><?php echo $producto->nombre; ?></a>
                                <p class="card-text">
                                <?php echo $producto->descripcion; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                
            </div>
        </form>
    </section>
    <!-- End Featured Product -->

    <?php 
        include 'footer.php';
    ?>
    

</body>
</html>