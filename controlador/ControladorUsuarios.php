<?php
    class ControladorUsuarios{
        static function consultaUsuarios(){
            $tabla = 'usuario';
            $usuarios = ModeloUsuarios::selectUsuarios($tabla);
            $arreglo = $usuarios -> fetch_all();
            return $arreglo;
        }

        static function guardarUsuario(){
            if(isset($_POST["guardar"]))
            {
                $tabla = 'usuario';
                $datos = array("nombre" => $_POST["nombre"], "correo" => $_POST["correo"], "telefono" => $_POST["telefono"]);
                $respuesta = ModeloUsuarios::insertarUsuarios($tabla, $datos);
                if($respuesta>0){
                    echo'
                        <script>
                            alert("Usuario guardado");
                            window.location.href="index.php?seccion=inicio";
                        </script>
                    ';
                }
                else{
                    echo'
                        <script>
                            alert("Error al guardar");
                        </script>
                    ';
                }
            }
        }

        static function consultaUsuariosID(){
            if(isset($_GET["id"]))
            {
                $tabla = 'usuario';
                $id = $_GET["id"];
                $respuesta = ModeloUsuarios::selectUsuariosId($tabla, $id);
                $usuario = $respuesta->fetch_all();
                return $usuario;
            }
        }

        static function borrarUsuario()
        {
            if(isset($_GET["accion"]) && $_GET["accion"]=="eliminar")
            {
                $tabla = 'usuario';
                $id = $_GET["id"];
                $respuesta = ModeloUsuarios::deleteUsuario($tabla, $id);
                if($respuesta>0)
                {
                    echo '
                        <script>
                            alert("Borrado correctamente");
                        </script>
                    ';
                }
            }
        }
    }
?>