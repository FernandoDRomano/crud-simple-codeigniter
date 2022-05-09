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
    <title>Crear persona</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <h2 class="text-center mt-5">Crear Persona</h2>
                
                <?php echo validation_errors(); ?>

                <form action="<?php echo base_url() ?>index.php/persona/store" method="POST" class="border shadow-lg py-3 px-4">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" value="<?php echo set_value("nombre") ?>" name="nombre" id="nombre" class="form-control" placeholder="Ingrese su nombre">
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" value="<?php echo set_value("apellido") ?>" name="apellido" id="apellido" class="form-control" placeholder="Ingrese su apellido">
                    </div>
                    <div class="form-group">
                        <label for="edad">Edad</label>
                        <input type="number" value="<?php echo set_value("edad") ?>" name="edad" id="edad" class="form-control" placeholder="Ingrese su edad">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>