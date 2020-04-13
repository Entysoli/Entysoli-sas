<?php

include("../../models/conexion.php");

if (isset($_POST['guardar_apartamento'])){
    //$apartamento =$_POST['id_apartamento']; 
    $id=$_POST['idApartamento'];
    $idConjunto=$_POST['conjunto'];
    $idBloque=$_POST['bloque'];
    $idPropietario=$_POST['cedulaPropietario'];
    $idPersona=$_SESSION['id'];
    $estado=$_POST['estado'];

    $query = "INSERT INTO apartamento(idApartamento,idConjunto,idBloque,idPropietario,idPersona,Estado)
    VALUES ('$id','$idConjunto','$idBloque','$idPropietario','$idPersona','$estado')";
    
    $result= mysqli_query($conn, $query);
    if (!$result){
        print('Verifique los datos ingresados.');
        
    }
    header('location: index.php');
    
}

?>