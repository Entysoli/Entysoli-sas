<?php

include("../../models/conexion.php");

if (isset($_POST['Guardar'])){
    $cedula = $_POST['cedula'];
    $nombre =$_POST['nombre'];
    $correo =$_POST['correo'];
    $telefono =$_POST['telefono'];
    $conjunto= $_POST['conjunto'];
    $idPer = $_SESSION['id'];

    $query = "INSERT INTO adminconjunto (Cedula, Nombre, Correo, Telefono, idConjunto, idPersona) VALUES ('$cedula', '$nombre', '$correo', '$telefono', '$conjunto', '$idPer');";
    $result= mysqli_query($conn, $query);
    if (!$result){
        die("fallo!!");
    }

    header("Location: index.php");
}

?>