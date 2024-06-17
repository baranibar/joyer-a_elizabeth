<?php 
        include 'header.php';
?>

<body>

    <div class="col-sm-6 mt-5 mx-auto">
        <h2>Actualizar moneda</h2>
    </div>
    <!-- Start Contact -->
    
    <div class="container py-1">
        <form class="" method="POST" enctype="multipart/form-data">
            <div class="row py-5">
                <form class="col-md-9 m-auto" method="post" role="form">
                    <div class="row">
                        <?php foreach($monedas as $moneda):?> 
                            <div class="form-group col-md-12 mb-3">
                                <label for="inputname">Nombre moneda</label>
                                <input type="text" class="form-control mt-1" id="nombre" name="moneda[nombre]" placeholder="Nombre moneda" value='<?php echo $moneda->nombre; ?>'>
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <label for="inputname">Simbolo moneda</label>
                                <input type="text" class="form-control mt-1" id="descripcion" name="moneda[simbolo]" placeholder="Simbolo moneda" value='<?php echo $moneda->simbolo; ?>'>
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <label for="inputname">País moneda</label>
                                <input type="text" class="form-control mt-1" id="descripcion" name="moneda[pais]" placeholder="País moneda" value='<?php echo $moneda->pais; ?>'>
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <label for="inputemail">Estado</label>
                                <select class="form-control" id="estado" name="moneda[estado]">
                                    <option value="" disabled selected><?php echo $moneda->estado; ?></option>
                                    <option value="Activo" <?php echo (($moneda->estado)=='Activo') ? 'selected': ''; ?>>Activo</option>
                                    <option value="Inactivo" <?php echo (($moneda->estado)=='Inactivo') ? 'selected': ''; ?>>Inactivo</option>
                                </select>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-center mt-2">
                            <button type="submit" class="btn btn-success btn-lg px-3">Actualizar</button>
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