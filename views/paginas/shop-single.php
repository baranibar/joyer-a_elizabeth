    <?php 
        include 'header.php';
    ?>
    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="build/css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="build/css/slick-theme.css">

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

    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <?php foreach($productos as $producto):?>
                        <div class="card mb-3 product-card">
                            <img class="card-img img-fluid" src=<?php echo $producto->imagen1_url; ?> alt="Card image cap" id="product-detail">
                        </div>
                    <?php endforeach; ?>
                    <div class="row">
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-dark fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </div>
                        <!--End Controls-->
                        <!--Start Carousel Wrapper-->
                        <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                            <!--Start Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">

                                <!--First slide-->
                                <div class="carousel-item active">
                                    <div class="row ">
                                        <?php foreach($productos_carrusel as $producto):?>
                                            <div class="col-4 ">
                                                <a href="#">
                                                    <img class="card-img img-fluid product-card " src=<?php echo $producto->imagen1_url; ?> alt="Product Image 1">
                                                </a>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <!--/.First slide-->
                            </div>
                            <!--End Slides-->
                        </div>
                        <!--End Carousel Wrapper-->
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <?php foreach($productos as $producto):?>
                        <div class="card product-card">
                            <div class="card-body">
                                <h6>SKU:<?php echo $producto->id_producto; ?></h6>
                                <?php if ($auth) : ?>
                                   <a href="producto_actualizar?idproducto=<?php echo $producto->id_producto; ?>"><h1 class="h2"><?php echo $producto->nombre; ?></h1></a>
                                <?php else : ?>
                                    <h1 class="h2"><?php echo $producto->nombre; ?></h1>
                                <?php endif; ?>
                                <p class="h3 py-2"><?php echo $producto->simbolo_moneda; ?> <?php echo $producto->precio; ?></p>
                                <p class="py-2">
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                </p>

                                <h6>Descripción:</h6>
                                <p><?php echo $producto->descripcion; ?></p>

                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <h6>Categoría:</h6>
                                    </li>
                                    <li class="list-inline-item">
                                        <p class=""><strong><?php echo $producto->categoria; ?></strong></p>
                                    </li>
                                </ul>
                                
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <h6>Género:</h6>
                                    </li>
                                    <li class="list-inline-item">
                                        <p class=""><strong><?php echo $producto->genero; ?></strong></p>
                                    </li>
                                </ul>

                                <h6>Materiales:</h6>
                                    <?php foreach($materiales as $material):?>
                                            <li><?php echo $material->nombre; ?></li>
                                    <?php endforeach; ?>
                                <form action="" method="GET">
                                    <input type="hidden" name="product-title" value="Activewear">
                                    <div class="row pb-3 mt-5">
                                        <div class="col d-grid">
                                            <a href="https://wa.me/+51923114523" class="btn btn-primary" target="_blank">Comprar</a>                                            
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->

    <!-- Start Article -->
    <section class="py-5">
        <div class="container">
            <div class="row text-left p-2 pb-3">
                <h4>Productos relacionados</h4>
            </div>

            <!--Start Carousel Wrapper-->
            <div id="carousel-related-product">
                <?php foreach($productos_categoria as $producto):?>        
                    <div class="p-2 pb-3">
                        <div class="product-wap card product-card">
                            <form method="GET" action="/joyas_detalle">
                                    <a href="joyas_detalle?idproducto=<?php echo $producto->id_producto; ?>"><img class="card-img rounded-0 img-fluid" src='<?php echo $producto->imagen1_url; ?>' alt='imagen del producto'></a>                                
                            </form>
                                <div class="card-body">
                                    <a href="shop-single.html" class="h3 text-decoration-none"><?php echo $producto->nombre; ?></a>
                                    <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                        <li class="pt-2">
                                            <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled d-flex justify-content-center mb-1">
                                        <li>
                                            <i class="text-warning fa fa-star"></i>
                                            <i class="text-warning fa fa-star"></i>
                                            <i class="text-warning fa fa-star"></i>
                                            <i class="text-warning fa fa-star"></i>
                                            <i class="text-warning fa fa-star"></i>
                                        </li>
                                    </ul>
                                    <p class="text-center mb-0 product-card price"><?php echo $producto->simbolo_moneda; ?> <?php echo $producto->precio; ?></p>
                                </div>
                        </div>
                    </div>                         
                <?php endforeach; ?>
            </div>


        </div>
    </section>
    <!-- End Article -->


    <?php 
        include 'footer.php';
    ?>

    <!-- Start Script -->
    <script src="build/js/jquery-1.11.0.min.js"></script>
    <script src="build/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="build/js/bootstrap.bundle.min.js"></script>
    <script src="build/js/templatemo.js"></script>
    <script src="build/js/custom.js"></script>
    <!-- End Script -->

    <!-- Start Slider Script -->
    <script src="build/js/slick.min.js"></script>
    <script>
        $('#carousel-related-product').slick({
            infinite: true,
            arrows: false,
            slidesToShow: 4,
            slidesToScroll: 3,
            dots: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                }
            ]
        });
    </script>
    <!-- End Slider Script -->

</body>

</html>