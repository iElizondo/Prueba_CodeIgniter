<div class="row">
    <div class="col">
    <h2><?php echo $titulo; ?></h2>
    <?php echo validation_errors(); ?>
    <form method="post">
        <div class="form-group">
            <label for="nombre_completo">Nombre Completo</label>
            <input type="input" name="nombre_completo" class="form-control" placeholder="Nombre Completo" value="<?php echo $cliente_item['id'] ? $cliente_item['nombre'] : ""; ?>"/><br />
        </div>
        <div class="form-group">
            <label for="tipo">Tipo Identificación</label>
            <select name="tipo" class="form-control">
                <option value="">Seleccionar</option>
            <?php foreach ($this->config->item('identificacion') as $id => $tipo_identificacion): 
                    $activo = '';
                    if($cliente_item['tipo_id']){
                        $activo = 'selected';
                    }
                ?>
            <option value="<?=$id?>" <?=$activo?>><?=$tipo_identificacion?></option>
                <?php endforeach;?>
            </select>
            <br/>
        </div>
        <div class="form-group">
            <label for="identificacion">Identificación</label>
            <input type="input" name="identificacion" class="form-control" placeholder="Identificación" value="<?php echo $cliente_item['id'] ? $cliente_item['identificacion'] : ""; ?>"/><br />
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="input" name="telefono" class="form-control" placeholder="Telefono" value="<?php echo $cliente_item['id'] ? $cliente_item['telefono'] : ""; ?>"/><br />
        </div>
        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" name="correo" class="form-control" placeholder="Correo" value="<?php echo $cliente_item['id'] ? $cliente_item['correo'] : ""; ?>"/><br />
        </div>
        <div class="form-group">
            <label for="provincia">Provincia</label>
            <select name="provincia" id="provincia" class="form-control">
                <option value="">Seleccionar</option>
                <?php foreach ($this->config->item('provincias_hc') as $id => $provincia): 
                    $activo = '';
                    if($cliente_item['id']){
                        $activo = 'selected';
                    }
                    ?>
                    <option value="<?=$id?>" <?=$activo?> ><?=$provincia?></option>
                <?php endforeach;?>
            </select>
            <br/>
        </div>
        <div class="form-group">
            <label for="canton">Canton</label>
            <select name="canton" id="canton" class="form-control">
           
            </select>
            <br/>
        </div>
        <div class="form-group">
            <label for="distrito">Distrito</label>
            <select name="distrito" id="distrito" class="form-control">
            
            </select>
            <br/>
        </div>
        <div class="form-group">
            <label for="otras_senas">Otras Señas</label>
            <input type="text" name="otras_senas" class="form-control" placeholder="Otras Señas" value="<?php echo $cliente_item['id'] ? $cliente_item['otrassenas'] : ""; ?>"/><br />
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Enviar</button>
    </form>
    </div>
</div>

<script type="text/javascript">
    <?php
        $cantones  = $this->config->item('cantones_hc');
        $distritos = $this->config->item('distritos_hc');
    ?>
    var cantones = <?php echo json_encode($cantones);?>;
	var distritos = <?php echo json_encode($distritos);?>;

    jQuery(document).ready(function(){
        jQuery("#provincia").change(function() {
            jQuery('#canton option').remove();
            jQuery('#distrito option').remove();
            jQuery("#canton").append('<option value="">Seleccione</option>');
			jQuery.each( cantones[this.value], function( id, nombre ){
				jQuery("#canton").append('<option value="'+id+'">'+nombre+'</option>');
			});
	    });

        jQuery("#canton").change(function() {
            jQuery('#distrito option').remove();
            jQuery("#distrito").append('<option value="">Seleccione</option>');
            var idprovincia = jQuery( "#provincia" ).val();
			jQuery.each( distritos[idprovincia][this.value], function( id, nombre ){
				jQuery("#distrito").append('<option value="'+id+'">'+nombre+'</option>');
			});
	    });
    });

</script>