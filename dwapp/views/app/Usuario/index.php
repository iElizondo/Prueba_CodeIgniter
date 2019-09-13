<div class="encabezado">
  <h2><?=$titulo?></h2>
  <a href="<?php echo site_url('usuario/formulario'); ?>" class="btn boton b-crear">
      <i class="fas fa-plus"></i>
      Crear
  </a>
</div>

<table class="table">
  <thead class="thead-dark">
    <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Usuario</th>
        <th scope="col">Rol</th>
        <th scope="col" class="acction">Acción</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($usuario as $item_usuario): ?>
        <tr>
            <td><?php echo $item_usuario['nombre']; ?></td>
            <td><?php echo $item_usuario['usuario'];?></td>
            <td><?php 
                foreach ($roles as $id => $rol){
                    if($rol['id'] == $item_usuario['rol']){
                        echo $rol['rol'];
                    }
                }?>
            </td>
            <td><a id="btn_editar" class="btn boton btn-redomdo b-editar" href="<?php echo site_url('usuario/formulario/'.$item_usuario['id']); ?>"><i class="fas fa-edit"></i></a>
                <a id="btn_eliminar" class="btn boton btn-redomdo b-eliminar" onclick="return confirm('Seguro que desea Eliminar este registro?')" href="<?php echo site_url('usuario/delete/'.$item_usuario['id']); ?>"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
  </tbody>
</table>