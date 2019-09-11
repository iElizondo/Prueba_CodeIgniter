<div class="encabezado">
  <h2><?=$titulo?></h2>
  <a href="<?php echo site_url('producto/formulario'); ?>" class="btn boton b-crear">
      <i class="fas fa-plus"></i>
      Crear
  </a>
</div>

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
            <td>
              <?php 
                $nomTarifa = "";
                foreach($this->config->item('tarifas_iva') as $id => $tarifa){
                  if($id == $item_producto['tarifa_iva']){
                    $nomTarifa = $tarifa;
                  }
                }
                echo $nomTarifa;
              ?>
            </td>
            <td><?php echo $item_producto['nombre']; ?></td>
            <td><a id="btn_editar" class="btn boton btn-redomdo b-editar" href="<?php echo site_url('producto/formulario/'.$item_producto['id']); ?>"><i class="fas fa-edit"></i></a>
                <a id="btn_eliminar" class="btn boton btn-redomdo b-eliminar" onclick="return confirm('Seguro que desea Eliminar este registro?')" href="<?php echo site_url('producto/delete/'.$item_producto['id']); ?>"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
  </tbody>
</table>
