<?php

include("../../models/conexion.php");;

if (isset($_POST['guardar_incidente'])) {

    include '../../models/Correoinci/Phpmailer/index.php';


    date_default_timezone_set('America/Bogota');

    $PQRS = $_POST['PQRS'];
    $idConjunto = $_POST['conjunto'];
    $idPropietario = $_POST['idPropietario'];
    $idApartamento = $_POST['idApartamento'];
    $asunto = $_POST['Asunto'];
    $descripcion = $_POST['descripcion'];
    $evidencia = addslashes(file_get_contents($_FILES['evidencia']['tmp_name']));
    $fechaReporte = date('Y-m-d');
    $fechaLimite = $_POST['fecha_Limite'];
    $Estado = 'No solucionado';

    $query = "INSERT INTO incidente(idConjunto,Asunto,Evidencia,idPropietario,idApartamento,fechaReporte, Descripcion,TipoIncidente, Estado) 
VALUES ('$idConjunto','$asunto','$evidencia','$idPropietario',$idApartamento,'$fechaReporte','$descripcion','$PQRS','$Estado')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("fallo!!");
    }else{
        echo "Se ha notificado correctamente tu informe";
    }

    header("Location: index.php");
}
