<?php

include '../../../model/conectar.php';


if (isset($_POST['guardar_conjunto'])) {
    $nit = $_POST['nit'];
    $nombre = $_POST['nombre_conjunto'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion_conjunto'];
    $estado = $_POST['estado'];
    $idPersona = $_SESSION['id'];
    $NumBloques = $_POST['Bloques'];


    $query = "INSERT INTO conjunto(idConjunto,Nombre,Telefono,Direccion,Estado,idPersona,NumBloques) 
    VALUES ('$nit','$nombre','$telefono', '$direccion','$estado','$idPersona','$NumBloques')";

    $result = mysqli_query($con, $query);
    $consultCon= "select max(idConjunto) as Cod from conjunto;";
    $r = mysqli_query($con, $consultCon);
    $idConjunto = $r->fetch_row();   
 
    for ($i = 1; $i <= $NumBloques; $i++) {
        $q = "INSERT INTO bloque (idBloque, idConjunto) VALUES ($i, $nit /*idConjunto[0]*/)";
        $result = mysqli_query($con, $q);
    }

    if (!$result) {
        echo "<script>alert('Verifique los datos que ha ingresado');</script>";
        
    }else{
        echo "<script>alert('Registro exitoso');</script>";
        header('location:index.php');
    }
    
}
