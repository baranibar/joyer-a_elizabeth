<?php 
        include 'header.php';
?>

<body>
    <form method="GET" action="/producto_actualizar">
    <div class="container-xl">
        <div class="row">
            <!-- Columna de Categorías -->
            <div class="col-lg-3 mt-5">
                <h1 class="h2 pb-4">Mantenimiento</h1>
                    <ul class="list-unstyled templatemo-accordion shop-left-menu">
                        <li class="pb-3">
                            <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="admin?mantenimiento=1; ?>">
                                Joyas
                            </a>
                        </li>
                    </ul>
                    <ul class="list-unstyled templatemo-accordion shop-left-menu">
                        <li class="pb-3">
                            <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="admin?mantenimiento=2; ?>">
                                Categorías
                            </a>
                        </li>
                    </ul>
                    <ul class="list-unstyled templatemo-accordion shop-left-menu">
                        <li class="pb-3">
                            <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="admin?mantenimiento=3; ?>">
                                Materiales
                            </a>
                        </li>
                    </ul>
                    <ul class="list-unstyled templatemo-accordion shop-left-menu">
                        <li class="pb-3">
                            <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="admin?mantenimiento=4; ?>">
                                Monedas
                            </a>
                        </li>
                    </ul>
            </div>

            <!-- Columna de Tabla de Mantenimiento -->
            <div class="col-lg-9">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <?php if ($mantenimiento=='1' || $mantenimiento == null) : ?>
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-6 mt-5">
                                        <h2>Joyas</h2>
                                    </div>
                                    <div class="col-sm-6 mt-5">
                                        <a href="/producto_crear" class="btn btn-success">
                                            <i class="fas fa-plus"></i> Nuevo
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-hover">
                                
                                    <thead>
                                        <tr>
                                            <th>Acción</th>
                                            <th>Id Producto</th>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Categoría</th>
                                            <th>Género</th>
                                            <th>Moneda</th>
                                            <th>Precio</th>
                                            <th>Peso</th>
                                            <th>Largo</th>
                                            <th>Estado</th>
                                            <th>Fecha creación</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($consultar as $consulta): ?>
                                            <tr>
                                                <td>
                                                    <a href="producto_actualizar?idproducto=<?php echo $consulta->id_producto; ?>" class="edit" data-toggle="modal"><i class="fas fa-edit"></i></a>
                                                </td>
                                                <td><?php echo $consulta->id_producto; ?></td>
                                                <td><?php echo $consulta->nombre; ?></td>
                                                <td><?php echo $consulta->descripcion; ?></td>
                                                <td><?php echo $consulta->categoria; ?></td>
                                                <td><?php echo $consulta->genero; ?></td>
                                                <td><?php echo $consulta->nombre_moneda; ?></td>
                                                <td><?php echo $consulta->precio; ?></td>
                                                <td><?php echo $consulta->peso; ?></td>
                                                <td><?php echo $consulta->largo; ?></td>
                                                <td><?php echo $consulta->estado; ?></td>
                                                <td><?php echo $consulta->fecha_creacion; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                            </table>
                        <?php endif; ?>

                        <?php if ($mantenimiento=='2') : ?>
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-6 mt-5">
                                        <h2>Categorías</h2>
                                    </div>
                                    <div class="col-sm-6 mt-5">
                                        <a href="/categoria_crear" class="btn btn-success">
                                            <i class="fas fa-plus"></i> Nuevo
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-hover">
                                
                                    <thead>
                                        <tr>
                                            <th>Acción</th>
                                            <th>Id Categoría</th>
                                            <th>Nombre</th>
                                            <th>Estado</th>
                                            <th>Fecha creación</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($consultar as $consulta): ?>
                                            <tr>
                                                <td>
                                                    <a href="categoria_actualizar?idcategoria=<?php echo $consulta->id_categoria; ?>" class="edit" data-toggle="modal"><i class="fas fa-edit"></i></a>
                                                </td>
                                                <td><?php echo $consulta->id_categoria; ?></td>
                                                <td><?php echo $consulta->nombre; ?></td>
                                                <td><?php echo $consulta->estado; ?></td>
                                                <td><?php echo $consulta->fecha_creacion; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                            </table>
                        <?php endif; ?>

                        <?php if ($mantenimiento=='3') : ?>
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-6 mt-5">
                                        <h2>Materiales</h2>
                                    </div>
                                    <div class="col-sm-6 mt-5">
                                        <a href="/material_crear" class="btn btn-success">
                                            <i class="fas fa-plus"></i> Nuevo
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-hover">
                                
                                    <thead>
                                        <tr>
                                            <th>Acción</th>
                                            <th>Id Material</th>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Estado</th>
                                            <th>Fecha creación</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($consultar as $consulta): ?>
                                            <tr>
                                                <td>
                                                    <a href="material_actualizar?idmaterial=<?php echo $consulta->id_material; ?>" class="edit" data-toggle="modal"><i class="fas fa-edit"></i></a>
                                                </td>
                                                <td><?php echo $consulta->id_material; ?></td>
                                                <td><?php echo $consulta->nombre; ?></td>
                                                <td><?php echo $consulta->descripcion; ?></td>
                                                <td><?php echo $consulta->estado; ?></td>
                                                <td><?php echo $consulta->fecha_creacion; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                            </table>
                        <?php endif; ?>

                        <?php if ($mantenimiento=='4') : ?>
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-6 mt-5">
                                        <h2>Monedas</h2>
                                    </div>
                                    <div class="col-sm-6 mt-5">
                                        <a href="/moneda_crear" class="btn btn-success">
                                            <i class="fas fa-plus"></i> Nuevo
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-hover">
                                
                                    <thead>
                                        <tr>
                                            <th>Acción</th>
                                            <th>Id Moneda</th>
                                            <th>Nombre</th>
                                            <th>Simbolo</th>
                                            <th>País</th>
                                            <th>Estado</th>
                                            <th>Fecha creación</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($consultar as $consulta): ?>
                                            <tr>
                                                <td>
                                                    <a href="moneda_actualizar?idmoneda=<?php echo $consulta->id_moneda; ?>" class="edit" data-toggle="modal"><i class="fas fa-edit"></i></a>
                                                </td>
                                                <td><?php echo $consulta->id_moneda; ?></td>
                                                <td><?php echo $consulta->nombre; ?></td>
                                                <td><?php echo $consulta->simbolo; ?></td>
                                                <td><?php echo $consulta->pais; ?></td>
                                                <td><?php echo $consulta->estado; ?></td>
                                                <td><?php echo $consulta->fecha_creacion; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Paginación -->
                <div class="row">
                    <ul class="pagination pagination-lg justify-content-end">
                        <?php for ($i = 1; $i <= $totalPaginas; $i++) : ?>
                            <li class="page-item <?php echo $i == $paginaActual ? 'active' : ''; ?>">
                                <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="?pagina=<?php echo $i; ?>&mantenimiento=<?php echo $mantenimiento; ?>"><?php echo $i; ?></a>
                                
                            </li>
                        <?php endfor; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </form>


<?php 
        include 'footer.php';
?>

</body>

</html>