<?php
    $insertar = new ControladorUsuarios;
    $insertar -> guardarUsuario();
?>
<body>
    <h1>Registrar Usuarios</h1>
    <div class="formulario">
        <form action="" enctype="multipart/form-data" method="post">
            <label for="nombre">Nombre:</label>
            <input class="texto" type="text" id="nombre" name="nombre" required><br><br>

            <label for="telefono">Telefono de emergencia:</label>
            <input class="texto" type="text" id="telefono" name="telefono" required><br><br>
            
            <label for="correo">Correo electronico:</label>
            <input class="texto" type="email" id="correo" name="correo" required><br><br>
            
            <input type="submit" name="guardar" value="Guardar" class="btn btn-primary">
        </form>
    </div>