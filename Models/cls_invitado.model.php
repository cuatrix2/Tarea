<?php
require_once('cls_conexion.model.php');
class Clase_Invitados
{

    public function todos()
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `invitados`";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    public function uno($Id)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `invitados` WHERE `Id`='$Id'";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function insertar($Cedula,$Nombres, $Apellidos, $Telefono, $Edad, $Sexo, $Correo){
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "INSERT INTO `invitados`(`Cedula`,`Nombres`, `Apellidos`, `Telefono`, `Edad`, `Sexo`, `Correo`) VALUES ('$Cedula','$Nombres','$Apellidos','$Telefono','$Edad','$Sexo','$Correo')";
            $result = mysqli_query($con, $cadena);
            return 'ok';
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    
    }
    public function actualizar($Id,$Cedula, $Nombres, $Apellidos, $Telefono, $Edad, $Sexo, $Correo){
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "UPDATE `invitados` SET `Cedula`='$Cedula',`Nombres`='$Nombres',`Apellidos`='$Apellidos',`Telefono`='$Telefono',`Edad`='$Edad',`Sexo`='$Sexo',`Correo`='$Correo' WHERE `Id`='$Id'";
            $result = mysqli_query($con, $cadena);
            return 'ok';
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($Id){  
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "delete from invitados where Id=$Id";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    public function cedula_repetida($Cedula)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT count(*) as cedula_repetida FROM `invitados` WHERE `Cedula`= '$Cedula'";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function verifica_correo($Correo)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT count(*) as cedula_repetida FROM `invitados` WHERE `Correo`= '$Correo'";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
}
