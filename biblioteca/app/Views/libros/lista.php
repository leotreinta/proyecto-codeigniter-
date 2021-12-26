<?=$cabecera ?>
<a href="<?=base_url('crear')?>">Crear un libro</a>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <td>#</td>
                <td>Imagen</td>
                <td>Nombre</td>
                <td>Acciones</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($libros as $libro): ?>
            <tr>
                <td><?=$libro['id']; ?></td>
                <td><?=$libro['imagen']; ?></td>
                <td><?=$libro['nombre'];?></td>
                <td>Editar/
                    
                <a href="<?=base_url('borrar/'.$libro['id']);?>" class="btn btn-danger" type="button">Borrar</a>
                    
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?=$pie?>
 