<div class="row form-general">
    <div class="col">
    <div class="encabezado">
        <h2><?php echo $titulo; ?></h2>
        <a class="btn btn-ligh atras" href="<?php echo site_url('roles/index/'); ?>"><i class="fas fa-arrow-left">Atrás</i></a>
    </div>
    <?php echo validation_errors(); ?>
    <form method="post">
        <div class="form-group">
            <label for="rol">Rol</label>
            <input type="input" name="rol" class="form-control" placeholder="Rol" value="<?php echo isset($rol_item['id']) ? $rol_item['rol'] : ""; ?>"/><br/>
        </div>
        <label for="rol">Secciones</label>
        <div class="row">
        <?php foreach($this->config->item('menu') as $categoria => $items): ?>
            <div class="col custom-control custom-checkbox my-1 mr-sm-2">
            <?php foreach ($items['enlaces'] as $menu => $value): 
                $activo = '';?>
                <?php 
                if(isset($rol_item['id'])){
                    foreach ($rol_item['secciones'] as $key => $value) {
                        if($value == $menu){
                            $activo = 'checked';
                        }?>
                <?php }
                    } ?>
                <div class="custom-control custom-checkbox my-1 mr-sm-2">
                    <input type="checkbox" <?=$activo?> name="permisos[]" class="custom-control-input" id='<?php echo "chk_$menu"; ?>' value='<?php echo "$menu"; ?>'>
                    <label class="custom-control-label" for='<?php echo "chk_$menu"; ?>'><?php echo $menu ?></label><br>
                </div>
                <?php endforeach; ?>
            </div> 
        <?php endforeach; ?>
        </div>
        <button type="submit" name="submit" class="btn boton b-crear">Guardar</button>
    </form>
    </div>
</div>