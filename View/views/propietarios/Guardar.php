<?php

include("../../models/conexion.php");

if (isset($_POST['Guardar'])){
    $cedula = $_POST['cedula'];
    $nombre =$_POST['nombre'];
    $apellido =$_POST['apellido'];
    $telefono =$_POST['telefono'];
    $conjunto= $_POST['conjunto'];
    $idPer = $_SESSION['id'];

    $query = "INSERT INTO propietario (Cedula, Nombre, Apellido, Telefono, idCon, idPersona) 
    VALUES ('$cedula', '$nombre', '$apellido', '$telefono', '$conjunto', '$idPer');";
    $result= mysqli_query($conn, $query);
    if (!$result){
        die("fallo!!");
    }

    header("Location: index.php");
}

?>