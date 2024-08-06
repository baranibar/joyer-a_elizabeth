    <!-- Start Footer -->

    <!-- Botón de WhatsApp -->
    <a href="https://wa.me/+51908887910" class="whatsapp-button" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>
    
    <footer class="bg-pink" id="tempaltemo_footer">
        <div class="container">
            <form method="GET" action="/joyas">
                <div class="row">

                    <div class="col-md-4 pt-5">
                        <h2 class="h2 royal-text text-light border-bottom pb-3 border-light logo">Elizabeth Joyeria</h2>
                        <ul class="list-unstyled text-light footer-link-list">
                            <li>
                                <i class="fa fa-phone fa-fw"></i>
                                <a class="text-decoration-none" href="tel:010-020-0340">+51 908887910</a>
                            </li>
                            <li>
                                <i class="fa fa-envelope fa-fw"></i>
                                <a class="text-decoration-none" href="mailto:info@company.com">elizabethjoyeria@avcompany.com</a>
                            </li>
                        </ul>
                    </div>
                        <div class="col-md-4 pt-5">
                            <h2 class="h2 text-light border-bottom pb-3 border-light">Colecciones</h2>
                            <ul class="list-unstyled text-light footer-link-list">
                                <?php foreach($categorias as $categoria):?>
                                    <li><a class="text-decoration-none" href="joyas?categoria=<?php echo $categoria->id_categoria; ?>"><?php echo $categoria->nombre; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <div class="col-md-4 pt-5">
                            <h2 class="h2 text-light border-bottom pb-3 border-light">Información</h2>
                            <ul class="list-unstyled text-light footer-link-list">
                                <li><a class="text-decoration-none" href="/inicio">Inicio</a></li>
                                <li><a class="text-decoration-none" href="/joyas">Joyas</a></li>
                                <li><a class="text-decoration-none" href="https://wa.me/+51908887910">Nosotros</a></li>
                                <li><a class="text-decoration-none" href="https://wa.me/+51908887910">Conctacto</a></li>
                            </ul>
                        </div>
                </div>
            </form>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <label class="sr-only" for="subscribeEmail">Email address</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control bg-dark border-light" id="subscribeEmail" placeholder="Email address">
                        <div class="input-group-text btn-success text-light">Subscribe</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-center text-light mb-0 mt-0">
                            Copyright &copy; 2024 AV Company
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->