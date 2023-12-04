<?php
require_once('../Models/cls_invitado.model.php');
$invitado = new Clase_Invitados();
switch ($_GET['op']) {
    case 'todos':
        $datos = array(); //defino un arreglo
        $datos = $invitado->todos(); //llamo al modelo de invitado e invoco al procedimiento todos y almaceno en una variable
        while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
            $todos[] = $fila;
        }
        echo json_encode($todos); //devuelvo el arreglo en formato json
        break;

    case 'uno':
        $Id = $_GET['Id'];
        $datos = array(); //defino un arreglo
        $datos = $invitado->uno($Id); //llamo al modelo de invitado e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos);
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;

    case 'insertar':
        $Cedula = $_POST['Cedula'];
        $Nombres = $_POST['Nombres'];
        $Apellidos = $_POST['Apellidos'];
        $Telefono = $_POST['Telefono'];
        $Edad = $_POST['Edad'];
        $Sexo = $_POST['Sexo'];
        $Correo = $_POST['Correo'];
        $datos = array(); // Defino arreglo
        $datos = $invitado->insertar($Cedula, $Nombres, $Apellidos, $Telefono, $Edad, $Sexo, $Correo); // Llamo al modelo de invitado e invoco al procedimiento insertar y almaceno en una variable
        echo json_encode($datos); // Devuelvo el arreglo en formato json
        break;

    case 'actualizar':
        $Id = $_POST['Id'];
        $Cedula = $_POST['Cedula'];
        $Nombres = $_POST['Nombres'];
        $Apellidos = $_POST['Apellidos'];
        $Telefono = $_POST['Telefono'];
        $Edad = $_POST['Edad'];
        $Sexo = $_POST['Sexo'];
        $Correo = $_POST['Correo'];
        $datos = array();
        $datos = $invitado->actualizar($Id, $Cedula, $Nombres, $Apellidos, $Telefono, $Edad, $Sexo, $Correo);
        echo json_encode($datos);
        break;

    case 'eliminar':
        $Id = $_POST['Id'];
        $datos = array();
        $datos = $invitado->eliminar($Id);
        echo json_encode($datos);
        break;

    case "cedula_repetida":
        $Cedula = $_POST["Cedula"];
        $datos = array(); //defino un arreglo
        $datos = $invitado->cedula_repetida($Cedula); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
    case "verifica_correo":
        $Correo = $_POST["Correo"];
        $datos = array(); //defino un arreglo
        $datos = $invitado->verifica_correo($Correo); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
}
