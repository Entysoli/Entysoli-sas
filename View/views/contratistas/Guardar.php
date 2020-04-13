<?php

include("../../models/conexion.php");

if (isset($_POST['Guardar'])) {

    $cedula =$_POST['cedula'];
    $nombre =$_POST['nombre'];
    $apellido =$_POST['apellido'];
    $direccion =$_POST['direccion'];
    $telefono =$_POST['telefono'];
    $correo =$_POST['correo'];
    $tipo =$_POST['rol'];
    $empresa =$_POST ['idproveedor'];
    $disponibilidad = 'Disponible';
    

    $query = "INSERT INTO contratistas (cedula,Nombre,Apellido,Direccion,Telefono,Correo,Tipo,idProveedor,Disponibilidad)
    VALUES ('$cedula','$nombre','$apellido','$direccion','$telefono','$correo','$tipo','$empresa','$disponibilidad')";
    $result= mysqli_query($conn, $query);

    if (!$result){
    echo "error! no se ha guardado" ;
    }
    header('location:index.php');
}

?>