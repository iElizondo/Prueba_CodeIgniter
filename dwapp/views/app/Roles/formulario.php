<div class="row form-general">
    <div class="col">
    <div class="encabezado">
        <h2><?php echo $titulo; ?></h2>
        <a class="btn btn-ligh atras" href="<?php echo site_url('producto/index/'); ?>"><i class="fas fa-arrow-left">Atrás</i></a>
    </div>
    <?php echo validation_errors(); ?>
    <form method="post">
        <div class="form-group">
            <label for="rol">Rol</label>
            <input type="input" name="rol" class="form-control" placeholder="Rol" value="<?php //echo $producto_item['id'] ? $producto_item['nombre'] : ""; ?>"/><br/>
        </div>
        <label for="rol">Secciones</label>
        <div class="row">
            <div class="col">
                <input type="checkbox">Productos<br>
                <input type="checkbox">Clientes
            </div>
            <div class="col">
                <input type="checkbox">Facturas Emitidas<br>
                <input type="checkbox">Facturas Recibidas
            </div>
            <div class="col">
                <input type="checkbox">Roles <br>
                <input type="checkbox">Usuarios<br>
                <input type="checkbox">Reportes
            </div>
        </div>
        <button type="submit" name="submit" class="btn boton b-crear">Guardar</button>
    </form>
    </div>
</div>