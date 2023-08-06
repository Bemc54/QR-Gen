<div class="col-12">
    <a class="btn btn-primary" href="index.php?seccion=registrarUsuario">Nuevo Usuario</a>
    <a class="btn btn-success" href="index.php?seccion=exportarExcel">Exportar a Excel</a>
    <table class="table display" id="myTable" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $eliminar = new ControladorUsuarios;
                $eliminar -> borrarUsuario();

                $lista=ControladorUsuarios::consultaUsuarios();
                foreach($lista as $row => $item)
                {
                    echo
                    '
                        <tr>
                          <td>'.$item[0].'</td>
                          <td>'.$item[1].'</td>
                          <td>'.$item[2].'</td>
                          <td>'.$item[3].'</td>
                          <td>
                            <a href="index.php?seccion=generar_qr&id='.$item[0].'"><i class="btn btn-secondary">Generar QR</i></a>
                            <a href="index.php?seccion=listaUsuarios&accion=eliminar&id='.$item[0].'"><i class="fa fa-trash"></i></a>
                          </td>
                       </tr>
                    ';
                }
            ?>
        </tbody>
    </table>
</div>