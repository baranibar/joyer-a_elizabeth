<?php 
        include 'header.php';
?>

<body>

    <div class="col-sm-6 mt-5 mx-auto">
        <h2>Registrar Moneda</h2>
    </div>
    <!-- Start Contact -->
    
    <div class="container py-1">
        <form class="" method="POST" enctype="multipart/form-data">
            <div class="row py-5">
                <form class="col-md-9 m-auto" method="post" role="form">
                    <div class="row">
                        <div class="form-group col-md-12 mb-3">
                            <label for="inputname">Nombre moneda</label>
                            <input type="text" class="form-control mt-1" id="nombre" name="moneda[nombre]" placeholder="Nombre moneda">
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label for="inputname">Símbolo moneda</label>
                            <input type="text" class="form-control mt-1" id="descripcion" name="moneda[simbolo]" placeholder="Símbolo moneda">
                        </div>             
                        <div class="form-group col-md-12 mb-3">
                            <label for="inputname">País moneda</label>
                            <input type="text" class="form-control mt-1" id="descripcion" name="moneda[pais]" placeholder="País moneda">
                        </div>                   
                    </div>
                    <div class="row">
                        <div class="col text-end mt-2">
                            <button type="submit" class="btn btn-success btn-lg px-3">Registrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </form>    
    </div>
    
    <!-- End Contact -->


<?php 
        include 'footer.php';
?>

</body>

</html>