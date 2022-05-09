<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Listado de personas</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <h2 class="text-center mt-5 mb-3">Listado de Personas</h2>
                <a href="<?php echo base_url() ?>index.php/persona/create" class="btn btn-primary mb-3">Crear</a>
                <table class="table table-sm">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">APELLIDO</th>
                        <th scope="col">EDAD</th>
                        <th scope="col">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($personas as $key => $persona): ?>
                        <tr>
                            <th><?php echo $persona->persona_id; ?></th>
                            <td><?php echo $persona->nombre; ?></td>
                            <td><?php echo $persona->apellido; ?></td>
                            <td><?php echo $persona->edad; ?></td>
                            <td>
                                <a href="<?php echo base_url() ?>index.php/persona/edit/<?php echo $persona->persona_id ?>" class="btn btn-warning text-white">Editar</a>
                                <a href="<?php echo base_url() ?>index.php/persona/destroy/<?php echo $persona->persona_id ?>" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    </table>
            </div>
        </div>
    </div>
</body>
</html>