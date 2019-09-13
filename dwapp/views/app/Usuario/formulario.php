<div class="row form-general">
    <div class="col">
    <div class="encabezado">
        <h2><?php echo $titulo; ?></h2>
        <a class="btn btn-ligh atras" href="<?php echo site_url('usuario/index/'); ?>"><i class="fas fa-arrow-left">Atrás</i></a>
    </div>
    <?php echo validation_errors(); ?>
    <form method="post">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="input" name="nombre" class="form-control" placeholder="Nombre" value="<?php echo $usuario_item['id'] ? $usuario_item['nombre'] : ""; ?>"/><br />
        </div>
        <div class="form-group">
            <label for="usuario">Usuario</label>
            <input type="input" name="usuario" class="form-control" placeholder="Usuario" value="<?php echo $usuario_item['id'] ? $usuario_item['usuario'] : ""; ?>"/><br />
        </div>
        <div class="form-group">
            <label for="contrasena">Contraseña</label>
            <input type="password" name="contrasena" class="form-control" placeholder="Contraseña" value=""/><br />
        </div>
        <div class="form-group">
            <label for="rol">Rol</label>
            <select name="rol" class="form-control">
                <option value="">Seleccionar</option>
                <?php foreach ($roles as $id => $rol):
                    $activo = '';
                    if($usuario_item['rol'] == $rol['id']){
                        $activo = 'selected';
                    }
                    ?>
                    <option value="<?=$rol['id']?>" <?=$activo?>><?=$rol['rol']?></option>
                <?php endforeach;?>
            </select>
            <br/>
        </div>
        <button type="submit" name="submit" class="btn boton b-crear">Guardar</button>
    </form>
    </div>
</div>