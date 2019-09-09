<a href="<?php echo site_url('producto/formulario'); ?>" class="btn boton b-crear">
    <i class="fas fa-plus"></i>
    Crear
</a>

<table class="table">
  <thead class="thead-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">IVA</th>
        <th scope="col">Nombre</th>
        <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($producto as $item_producto): ?>
        <tr>
            <td><?php echo $item_producto['id']; ?></td>
            <td><?php echo $item_producto['tarifa_iva']; ?></td>
            <td><?php echo $item_producto['nombre']; ?></td>
            <td><a class="btn boton btn-redomdo b-editar" href="<?php echo site_url('producto/formulario/'.$item_producto['id']); ?>"><i class="fas fa-edit"></i></a>
                <a class="btn boton btn-redomdo b-eliminar" href="<?php echo site_url('producto/delete/'.$item_producto['id']); ?>"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
  </tbody>
</table>