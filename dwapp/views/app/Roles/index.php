<div class="encabezado">
  <h2><?=$titulo?></h2>
  <a href="<?php echo site_url('roles/formulario'); ?>" class="btn boton b-crear">
      <i class="fas fa-plus"></i>
      Crear
  </a>
</div>

<table class="table">
  <thead class="thead-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Rol</th>
        <th scope="col" class="acction">Acción</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($rol as $item_rol): ?>
        <tr>
            <td><?php echo $item_rol['id']; ?></td>
            <td>
              <?php echo $item_rol['rol'];?>
            </td>
            <td><a id="btn_editar" class="btn boton btn-redomdo b-editar" href="<?php echo site_url('roles/formulario/'.$item_rol['id']); ?>"><i class="fas fa-edit"></i></a>
                <a id="btn_eliminar" class="btn boton btn-redomdo b-eliminar" onclick="return confirm('Seguro que desea Eliminar este registro?')" href="<?php echo site_url('roles/delete/'.$item_rol['id']); ?>"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
  </tbody>
</table>