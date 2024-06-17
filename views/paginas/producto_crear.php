<?php 
        include 'header.php';
?>

<body>

    <div class="col-sm-6 mt-5 mx-auto">
        <h2>Registrar Joyas</h2>
    </div>
    <!-- Start Contact -->
    
    <div class="container py-1">
        <form class="" method="POST" enctype="multipart/form-data">
            <div class="row py-5">
                <form class="col-md-9 m-auto" method="post" role="form">
                    <div class="row">
                        <div class="form-group col-md-12 mb-3">
                            <label for="inputname">Nombre</label>
                            <input type="text" class="form-control mt-1" id="nombre" name="producto[nombre]" placeholder="Name">
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label for="inputname">Descripción</label>
                            <textarea class="form-control mt-1" id="descripcion" name="producto[descripcion]" placeholder="Message" rows="3"></textarea>
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label for="inputcategoria">Categoría</label>
                            <select class="form-control" id="id_categoria" name="producto[id_categoria]">
                                <option value="" disabled selected>Seleccione la categoría</option>
                                <?php foreach($categorias as $categoria):?> 
                                    <option value=<?php echo $categoria->id_categoria; ?>><?php echo $categoria->nombre; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label for="inputemail">Género</label>
                            <select class="form-control" id="genero" name="producto[genero]">
                                <option value="" disabled selected>Seleccione el género</option>
                                <option value="Hombre">Hombre</option>
                                <option value="Mujer">Mujer</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label for="inputmoneda">Moneda</label>
                            <select class="form-control" id="moneda" name="producto[id_moneda]">
                                <option value="" disabled selected>Seleccione la moneda</option>
                                <?php foreach($monedas as $moneda):?> 
                                    <option value=<?php echo $moneda->id_moneda; ?>><?php echo $moneda->nombre; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label for="precio">Precio</label>
                            <input type="number" class="form-control mt-1" id="precio" name="producto[precio]" placeholder="Precio" min="0" step="0.01" required>
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label for="peso">Peso</label>
                            <input type="number" class="form-control mt-1" id="peso" name="producto[peso]" placeholder="Peso" min="0" step="0.01" required>
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label for="largo">Largo</label>
                            <input type="number" class="form-control mt-1" id="largo" name="producto[largo]" placeholder="Largo" min="0" step="0.01" required>
                        </div>
                        <div class="form-group">
                            <label for="materiales">Materiales</label>
                                <select multiple class="form-control" id="materiales" name="producto[id_material][]">
                                    <?php foreach($materiales as $material):?> 
                                        <option value=<?php echo $material->id_material; ?>><?php echo $material->nombre; ?></option>
                                    <?php endforeach; ?>
                                </select>
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label for="inputname">Imagen 1 Nombre:</label>
                            <input type="text" class="form-control mt-1" id="imagen1_nombre" name="producto[imagen1_nombre]" placeholder="Nombre imagen">
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label for="inputname">Imagen 1 URL:</label>
                            <input type="text" class="form-control mt-1" id="imagen1_url" name="producto[imagen1_url]" placeholder="URL imagen">
                        </div>    
                        <div class="form-group col-md-12 mb-3">
                            <label for="inputname">Imagen 2 Nombre:</label>
                            <input type="text" class="form-control mt-1" id="imagen2_nombre" name="producto[imagen2_nombre]" placeholder="Nombre imagen">
                        </div>    
                        <div class="form-group col-md-12 mb-3">
                            <label for="inputname">Imagen 2 URL:</label>
                            <input type="text" class="form-control mt-1" id="imagen2_url" name="producto[imagen2_url]" placeholder="URL imagen">
                        </div>    
                        <div class="form-group col-md-12 mb-3">
                            <label for="inputname">Imagen 3 Nombre:</label>
                            <input type="text" class="form-control mt-1" id="imagen3_nombre" name="producto[imagen3_nombre]" placeholder="Nombre imagen">
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label for="inputname">Imagen 3 URL:</label>
                            <input type="text" class="form-control mt-1" id="imagen3_url" name="producto[imagen3_url]" placeholder="URL imagen">
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