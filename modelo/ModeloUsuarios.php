<?php
    include 'conexion.php';
    class ModeloUsuarios{
        static function selectUsuarios($tabla){
            $sql = "select * from $tabla;";
            $rs = Conexion::conectar()->query($sql);
            return $rs;
            $rs -> close();
        }

        static function insertarUsuarios($tabla,$datos){
            $sql = "insert into $tabla (id, nombre, correo, telefono) values (null, '$datos[nombre]','$datos[correo]','$datos[telefono]');";
            $rs = Conexion::conectar()->query($sql);
            return $rs;
        }

        static function selectUsuariosId($tabla, $id){
            $sql = "select * from $tabla where id = '$id';";
            $rs = Conexion::conectar()->query($sql);
            return $rs;
            $rs->close();
        }

        static function deleteUsuario($tabla, $id)
        {
            $sql = "delete from $tabla where id='$id';";
            $rs = Conexion::conectar()->query($sql);
            return $rs;
        }
    }
?>