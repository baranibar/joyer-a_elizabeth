<?php 
        include 'header.php';
?>


<section class="vh-100" style="background-color: #9A616D;">
    <form class="" method="POST" enctype="multipart/form-data">
        <div class="container h-100 py-3">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                    <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                        alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                    </div>
                    <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">

                        <form>

                        <div class="d-flex align-items-center mb-3 pb-1 navbar-brand">
                            <img src="build/img/corona_gold.png" alt="Logo" class="align-self-start">
                            <span class="h1 royal-text text-dark mb-0 mt-0 ">Elizabeth Joyería</span>
                        </div>                       

                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="email" id="correo" name="usuario[correo]" class="form-control form-control-lg" placeholder="Email address">        
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="password" id="clave" name="usuario[clave]" class="form-control form-control-lg" placeholder="Password"/>
                        </div>

                        <div class="pt-1 mb-4">
                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                        </div>

                        <a class="small text-muted" href="#!">Forgot password?</a>
                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="#!"
                            style="color: #393f81;">Register here</a></p>
                        <a href="#!" class="small text-muted">Terms of use.</a>
                        <a href="#!" class="small text-muted">Privacy policy</a>
                        </form>

                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </form>
</section>

<?php 
        include 'footer.php';
?>

</body>
</html>