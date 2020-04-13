<?php

include("../../models/conexion.php");

if (isset($_POST['guardar_proveedor'])){
    $idproveedor =$_POST['idProveedor'];
    $nombre =$_POST['Nombre'];
    $Apellido =$_POST['Apellido'];
    $direccion =$_POST['Direccion'];
    $telefono =$_POST['Telefono'];
    $correo =$_POST['Correo'];

    $query = "INSERT INTO proveedor(idProveedor,Nombre,Apellido,Direccion,Telefono,Correo) 
    VALUES ('$idproveedor','$nombre','$Apellido','$direccion','$telefono','$correo');";
    $result= mysqli_query($conn, $query);
    if (!$result){
        die("fallo!!");
    }

    header("Location: index.php");
}

?>