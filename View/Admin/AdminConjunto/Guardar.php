<?php

include("../../../model/conectar.php");

session_start();
if (isset($_POST['Guardar'])){
    $cedula = $_POST['cedula'];
    $nombre =$_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo =$_POST['correo'];
    $telefono =$_POST['telefono'];
    $conjunto= $_POST['conjunto'];
    $idPer = $_SESSION['id'];

    $query = "INSERT INTO adminconjunto (Cedula, Nombre, Apellido, Correo, Telefono, idConjunto, idPersona) 
    VALUES ('$cedula', '$nombre', '$apellido' ,'$correo', '$telefono', '$conjunto', '$idPer');";
    $result= mysqli_query($con, $query);
    if (!$result){
        die("fallo!!");
    }

    header("Location: index.php");
}

?>