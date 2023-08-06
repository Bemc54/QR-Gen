<?php
$qr = ControladorUsuarios::consultaUsuariosId();
foreach($qr as $row=>$item){
}

require_once "phpqrcode/qrlib.php";

if (isset($_GET["id"])) {
    // Obtener el ID del usuario seleccionado
    $idUsuario = $_GET["id"];
    // Obtener los datos del formulario

    // Crear una cadena de texto con la información deseada
    $informacion = "Nombre: " . $item[1] . "\n" . "Correo electronico: " . $item[2] . "\n" . "Telefono de emergencia: " . $item[3];

    // Generar el nombre de archivo único para el código QR
    $archivoQR = "qrcodes/" . $item[2] . "" . uniqid() . ".png";

    // Generar el código QR y guardarlo como imagen
    QRcode::png($informacion, $archivoQR, QR_ECLEVEL_L, 5);

    echo'
        <script>
            Swal.fire({
                title: "¡QR generado!",
                text: "Guardado en tu carpeta con: '.$item[2].'",
                icon: "success",
                confirmButtonText: "OK",
            }).then((result) => {
                if (result.isConfirmed) {
                // Redireccionar a la página deseada
                window.location.href="index.php?seccion=listaUsuarios";
                }
            });
        </script>
    ';
}
?>
