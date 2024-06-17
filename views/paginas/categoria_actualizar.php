<?php 
        include 'header.php';
?>

<body>

    <div class="col-sm-6 mt-5 mx-auto">
        <h2>Actualizar Categoría</h2>
    </div>
    <!-- Start Contact -->
    
    <div class="container py-1">
        <form class="" method="POST" enctype="multipart/form-data">
            <div class="row py-5">
                <form class="col-md-9 m-auto" method="post" role="form">
                    <div class="row">
                        <?php foreach($categorias2 as $categoria):?> 
                            <div class="form-group col-md-12 mb-3">
                                <label for="inputname">Nombre</label>
                                <input type="text" class="form-control mt-1" id="nombre" name="categoria[nombre]" placeholder="Name" value='<?php echo $categoria->nombre; ?>'>
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <label for="inputemail">Estado</label>
                                <select class="form-control" id="estado" name="categoria[estado]">
                                    <option value="" disabled selected><?php echo $categoria->estado; ?></option>
                                    <option value="Activo" <?php echo (($categoria->estado)=='Activo') ? 'selected': ''; ?>>Activo</option>
                                    <option value="Inactivo" <?php echo (($categoria->estado)=='Inactivo') ? 'selected': ''; ?>>Inactivo</option>
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