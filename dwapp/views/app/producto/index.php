
        <table calss="table">
            <thead>
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
                    <td><a href="#">Editar</a>
                        <a href="#">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>