<?php

include '../../../model/conectar.php';

if (isset($_POST['Guardar'])){
    $cedula = $_POST['cedula']; 
    $nombre =$_POST['nombre']; 
    $apellido = $_POST['apellido'];
    $contraseña =$_POST['contraseña']; 
    $idRol =$_POST['seleccion'];
    $correo =$_POST['Correo'];
    $pass_cifrado = password_hash($contraseña,PASSWORD_DEFAULT);

    $query = "INSERT INTO usuarios (Cedula, Nombre, Apellido,Password, Rol,Correo) 
    VALUES ('$cedula', '$nombre', '$apellido','$pass_cifrado', '$idRol','$correo');";

    echo "$query";
    $result= mysqli_query($con, $query);
    if (!$result){
        die("fallo!!");
    }

    header("Location: index.php");
}
