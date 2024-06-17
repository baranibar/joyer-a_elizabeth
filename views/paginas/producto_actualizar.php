<?php 
        include 'header.php';
?>

<body>

    <div class="col-sm-6 mt-5 mx-auto">
        <h2>Actualizar Joyas</h2>
    </div>
    <!-- Start Contact -->
    
    <div class="container py-1">
        <form class="" method="POST" enctype="multipart/form-data">
            <div class="row py-5">
                <form class="col-md-9 m-auto" method="post" role="form">
                    <div class="row">
                        <?php foreach($productos as $producto):?> 
                            <div class="form-group col-md-12 mb-3">
                                <label for="inputname">Nombre</label>
                                <input type="text" class="form-control mt-1" id="nombre" name="producto[nombre]" placeholder="Name" value='<?php echo $producto->nombre; ?>'>
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <label for="inputname">Descripción</label>
                                <textarea class="form-control mt-1" id="descripcion" name="producto[descripcion]" placeholder="Message" rows="3"><?php echo $producto->descripcion; ?></textarea>
                            </div>
                        
                            <div class="form-group col-md-12 mb-3">
                                <label for="inputcategoria">Categoría</label>
                                <select class="form-control" id="id_categoria" name="producto[id_categoria]">
                                    <?php foreach($categorias as $categoria): ?> 
                                        <option value="<?php echo $categoria->id_categoria; ?>" 
                                            <?php echo ($categoria->id_categoria == $producto->id_categoria) ? 'selected' : ''; ?>>
                                            <?php echo $categoria->nombre; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <label for="inputemail">Género</label>
                                <select class="form-control" id="genero" name="producto[genero]">
                                    <option value="" disabled selected><?php echo $producto->genero; ?></option>
                                    <option value="Hombre" <?php echo (($producto->genero)=='Hombre') ? 'selected': ''; ?>>Hombre</option>
                                    <option value="Mujer" <?php echo (($producto->genero)=='Mujer') ? 'selected': ''; ?>>Mujer</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <label for="inputmoneda">Moneda</label>
                                <select class="form-control" id="id_moneda" name="producto[id_moneda]">                                    
                                    <?php foreach($monedas as $moneda):?> 
                                        <option value="<?php echo $moneda->id_moneda; ?>">                                            
                                            <?php echo in_array($moneda->id_moneda,$ids_moneda_select) ? '' : ''; ?>
                                            <?php echo $moneda->nombre; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <label for="precio">Precio</label>
                                <input type="number" value='<?php echo $producto->precio; ?>' class="form-control mt-1" id="precio" name="producto[precio]" placeholder="Precio" min="0" step="0.01" required>
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <label for="peso">Peso</label>
                                <input type="number" value='<?php echo $producto->peso; ?>' class="form-control mt-1" id="peso" name="producto[peso]" placeholder="Peso" min="0" step="0.01" required>
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <label for="largo">Largo</label>
                                <input type="number" value='<?php echo $producto->largo; ?>' class="form-control mt-1" id="largo" name="producto[largo]" placeholder="Largo" min="0" step="0.01" required>
                            </div>
                        
                            <div class="form-group">
                                <label for="materiales">Materiales</label>
                                    <select multiple class="form-control" id="materiales" name="producto[id_material][]">
                                        <?php foreach($materiales as $material):?> 
                                            <option value="<?php echo $material->id_material; ?>"
                                                <?php echo in_array($material->id_material, $ids_materiales_select) ? 'selected' : ''; ?>>
                                                <?php echo $material->nombre; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <label for="inputemail">Estado</label>
                                <select class="form-control" id="estado" name="producto[estado]">
                                    <option value="" disabled selected><?php echo $producto->estado; ?></option>
                                    <option value="Activo" <?php echo (($producto->estado)=='Activo') ? 'selected': ''; ?>>Activo</option>
                                    <option value="Inactivo" <?php echo (($producto->estado)=='Inactivo') ? 'selected': ''; ?>>Inactivo</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <label for="inputname">Imagen 1 Nombre:</label>
                                <input type="text" value='<?php echo $producto->imagen1_nombre; ?>' class="form-control mt-1" id="imagen1_nombre" name="producto[imagen1_nombre]" placeholder="Nombre imagen">
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <label for="inputname">Imagen 1 URL:</label>
                                <input type="text" value='<?php echo $producto->imagen1_url; ?>' class="form-control mt-1" id="imagen1_url" name="producto[imagen1_url]" placeholder="URL imagen">
                            </div>    
                            <div class="form-group col-md-12 mb-3">
                                <label for="inputname">Imagen 2 Nombre:</label>
                                <input type="text" value='<?php echo $producto->imagen2_nombre; ?>' class="form-control mt-1" id="imagen2_nombre" name="producto[imagen2_nombre]" placeholder="Nombre imagen">
                            </div>    
                            <div class="form-group col-md-12 mb-3">
                                <label for="inputname">Imagen 2 URL:</label>
                                <input type="text" value='<?php echo $producto->imagen2_url; ?>' class="form-control mt-1" id="imagen2_url" name="producto[imagen2_url]" placeholder="URL imagen">
                            </div>    
                            <div class="form-group col-md-12 mb-3">
                                <label for="inputname">Imagen 3 Nombre:</label>
                                <input type="text" value='<?php echo $producto->imagen3_nombre; ?>' class="form-control mt-1" id="imagen3_nombre" name="producto[imagen3_nombre]" placeholder="Nombre imagen">
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <label for="inputname">Imagen 3 URL:</label>
                                <input type="text" value='<?php echo $producto->imagen3_url; ?>' class="form-control mt-1" id="imagen3_url" name="producto[imagen3_url]" placeholder="URL imagen">
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