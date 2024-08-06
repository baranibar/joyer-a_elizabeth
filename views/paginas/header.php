<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Elizabeth Joyería</title>

    <!-- Favicon -->
    <link rel="icon" href="build/img/corona_ico.png" type="image/png">
    <!-- Para más compatibilidad puedes añadir también estos -->
    <link rel="shortcut icon" href="build/img/corona_ico.png" type="image/png">

    <link rel="stylesheet" href="build/css/normalize.css">
    <link rel="stylesheet" href="build/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Enlace al archivo CSS de Bootstrap (estilos) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Enlace al archivo JavaScript de Bootstrap (funcionalidades) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

</head>
<body>

    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-pink navbar-light d-none d-lg-block fixed-top" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2 text-white"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">elizabethjoyeria@avcompany.com</a>
                    <i class="fa fa-phone mx-2 text-white"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">+51 908887910</a>
                </div>
                <div>
                    <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
    </nav>
        <!-- Close Top Nav -->

        <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top pt-5">
        <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand d-flex align-items-center" href="/inicio">
            <div class="logo-hover">
                <span class="h1 royal-text text-dark mb-0 mt-0">Elizabeth</span>
                <p class="text-center royal-text mb-0 mt-0">JOYERÍA</p>
            </div>
            <img src="build/img/corona_gold.png" alt="Logo" class="align-self-start">
        </a>     

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <?php if ($auth) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/admin">Admin</a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/inicio">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/joyas">Joyas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://wa.me/+51908887910">Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://wa.me/+51908887910">Contacto</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a>                    
                    <a class="nav-icon position-relative text-decoration-none" href="#">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"></span>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="#">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"></span>
                    </a>
                    <?php if ($auth) : ?>
                        <a class="nav-icon position-relative text-decoration-none" href="/logout">
                                <i class="fa fa-sign-out-alt text-dark mr-1"></i>
                                <!-- Puedes añadir un texto adicional si lo deseas -->
                                <!-- <span class="d-none d-lg-inline">Cerrar Sesión</span> -->
                        </a>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->