    <?php 
        include 'header.php';
    ?>

    <!-- Start Content -->
    <div class="container py-5">
        <form method="GET" action="/joyas">
            <div class="row">
                    <div class="col-lg-3">
                        <h1 class="h2 pb-4">Categorias</h1>
                        <?php foreach($categorias as $categoria):?>
                        <ul class="list-unstyled templatemo-accordion shop-left-menu">
                            <li class="pb-3">
                                <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="joyas?categoria=<?php echo $categoria->id_categoria; ?>">
                                    <?php echo $categoria->nombre; ?>
                                </a>
                            </li>
                        </ul>
                        <?php endforeach; ?>
                    </div>

                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6 pb-4">
                                <div class="d-flex">
                                    <select class="form-control">
                                        <option>Featured</option>
                                        <option>A to Z</option>
                                        <option>Item</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php foreach($productos as $producto):?>
                            <div class="col-12 col-md-4 ">
                                <div class="card mb-4 product-wap rounded-0 product-card">
                                    <a href="joyas_detalle?idproducto=<?php echo $producto->id_producto; ?>"><img class="card-img rounded-0 img-fluid" src='<?php echo $producto->imagen1_url; ?>' alt='imagen del producto'></a>
                                    
                                    <div class="card-body">
                                        <p href="shop-single.html" class="h3 text-decoration-none text-center"><?php echo $producto->nombre; ?></p>    
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
                                        <p class="text-center mb-0 product-card price">S/ <?php echo $producto->precio; ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="row">
                            <ul class="pagination pagination-lg justify-content-end">
                                <?php for ($i = 1; $i <= $totalPaginas; $i++) : ?>
                                    <li class="page-item <?php echo $i == $paginaActual ? 'active' : ''; ?>">
                                        <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="?pagina=<?php echo $i; ?>&categoria=<?php echo $categoriaId; ?>"><?php echo $i; ?></a>
                                    </li>
                                <?php endfor; ?>
                            </ul>
                        </div>
                    </div>
            </div>
        </form>
    </div>
    <!-- End Content -->

    <?php 
        include 'footer.php';
    ?>
    
</body>

</html>