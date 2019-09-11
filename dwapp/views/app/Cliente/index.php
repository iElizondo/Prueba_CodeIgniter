<div class="encabezado">
  <h2><?=$titulo?></h2>
  <a href="<?php echo site_url('cliente/formulario'); ?>" class="btn boton b-crear">
      <i class="fas fa-plus"></i>
      Crear
  </a>
</div>

<table class="table">
  <thead class="thead-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Teléfono</th>
        <th scope="col">Correo</th>
        <th scope="col">Identeficación</th>
        <th scope="col" class="acction">Acción</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($clientes as $item_cliente): ?>
        <tr>
            <td><?php echo $item_cliente['id']; ?></td>
            <td><?php echo $item_cliente['nombre']; ?></td>
            <td><?php echo $item_cliente['telefono']; ?></td>
            <td><?php echo $item_cliente['correo']; ?></td>
            <td><?php echo $item_cliente['identificacion']; ?></td>
            <td><a class="btn boton btn-redomdo b-editar" href="<?php echo site_url('cliente/formulario/'.$item_cliente['id']); ?>"><i class="fas fa-edit"></i></a>
                <a class="btn boton btn-redomdo b-eliminar" onclick="return confirm('Seguro que desea Eliminar este registro?')" href="<?php echo site_url('cliente/delete/'.$item_cliente['id']); ?>"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
  </tbody>
</table>