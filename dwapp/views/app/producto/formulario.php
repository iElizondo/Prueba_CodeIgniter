<div class="row">
    <div class="col">
        </div>
            <div class="col">
            <h2><?php echo $titulo; ?></h2>
            <?php echo validation_errors(); ?>
            <form method="post">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="input" name="nombre" class="form-control" placeholder="Nombre" value="<?php echo $producto_item['id'] ? $producto_item['nombre'] : ""; ?>"/><br />
                </div>
                <div class="form-group">
                    <label for="tipo">Tipo</label>
                    <select name="tipo" class="form-control">
                        <option value="">Seleccionar</option>
                        <?php foreach ($this->config->item('tipoproductos') as $id => $tipo): 
                            $activo = '';
                            if($producto_item['id']){
                                $activo = 'selected';
                            }
                            ?>
                            <option value="<?=$id?>" <?=$activo?>><?=$tipo['nombre']?></option>
                        <?php endforeach;?>
                    </select>
                    <br/>
                </div>
                <div class="form-group">
                    <label for="tarifa">Tarifa IVA</label>
                    <select name="tarifa" class="form-control">
                        <option value="">Seleccionar</option>
                        <?php foreach ($this->config->item('tarifas_iva') as $id => $tarifa): 
                            $activo = '';
                            if($producto_item['id']){
                                $activo = 'selected';
                            }
                            ?>
                            <option value="<?=$id?>" <?=$activo?> ><?=$tarifa?></option>
                        <?php endforeach;?>
                    </select>
                    <br/>
                </div>
                <div class="form-group">
                    <label for="medida">Tipo Medida</label>
                    <select name="medida" class="form-control">
                    <option value="">Seleccionar</option>
                        <?php foreach ($this->config->item('medidas') as $id => $medida): 
                            $activo = '';
                            if($producto_item['id']){
                                $activo = 'selected';
                            }
                            ?>
                            <option value="<?=$id?>" <?=$activo?> ><?=$medida?></option>
                        <?php endforeach;?>
                    </select>
                    <br/>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Enviar</button>
            </form>
            </div>
        <div class="col">
    </div>
</div>