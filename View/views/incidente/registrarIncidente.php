<?php

include("../../models/conexion.php");;

if (isset($_POST['guardar_incidente'])) {
    //include '../../models/Correoinci/Phpmailer/index.php';
    date_default_timezone_set('America/Bogota');

    $PQRS = $_POST['PQRS'];
    $idConjunto = $_POST['conjunto'];
    $idPropietario = $_POST['idPropietario'];
    $idApartamento = $_POST['idApartamento'];
    $asunto = $_POST['Asunto'];
    $descripcion = $_POST['descripcion'];
    $evidencia = addslashes(file_get_contents($_FILES['evidencia']['tmp_name']));
    $fechaReporte = date('Y-m-d');
    $fecha = $_POST['fecha_Limite'];
    $f = explode('/', $fecha);
    $fechaLimite = $f[2] . "-" . $f[0] . "-" . $f[1];
    $Estado = 'No solucionado';



    $query = "INSERT INTO incidente(idConjunto,Asunto,Evidencia,idPropietario,idApartamento,fechaReporte,fechaLimite, Descripcion,TipoIncidente, Estado) 
    VALUES ('$idConjunto','$asunto','$evidencia','$idPropietario','$idApartamento','$fechaReporte','$fechaLimite','$descripcion','$PQRS','$Estado')";
    $result = mysqli_query($conn, $query);
    header('location: index.php');
    echo $query;
}
