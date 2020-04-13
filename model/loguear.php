<?php

require 'conectar.php';
error_reporting(0);
$rol = $_POST['seleccion'];
$id = $_POST['identificacion'];
$Usuario = $_POST['Usuario'];
$Clave = $_POST['Clave'];


$q = "SELECT COUNT(*) as contar from usuarios 
where Cedula='$id' and Correo = '$Usuario' and Password ='$Clave' and Rol = '$rol' ";
$consulta = mysqli_query($con, $q);
$array = mysqli_fetch_array($consulta);

$_SESSION['id'] = $id;
$_SESSION['username'] = $Usuario;
$_SESSION['password'] = $Clave;

if($rol == 'Gerente'){

    if ($array['contar'] > 0) {
        session_start();
        $Usuario;
        include 'Correo/Phpmailer/index.php';
      
        header("location: ../View/Admin/index.php");
    
    } else {
        session_start();
        error_reporting(0);
        $Usuario= $_SESSION ['username'];
    
        echo "<h1>$Usuario, NO ESTÁ AUTORIZADO </h1>";   
        echo " <script> window.location.replace('../project.php') </script>";
    }
}
if($rol == 'Propietario'){
if ($array['contar'] > 0) {
    session_start();
    $Usuario;
    include 'Correo/Phpmailer/index.php';
    header("location: ../views/FormIncidentes/index.php");

} else {
    session_start();
    error_reporting(0);
    $Usuario= $_SESSION ['username'];

    echo "<h1>$Usuario, NO ESTÁ AUTORIZADO </h1>";   
    echo " <script> window.location.replace('../project.php') </script>";
}
}
if($rol == 'AdminConjunto'){
    if ($array['contar'] > 0) {
        session_start();
        $Usuario;
        header("location: ../views/GestionApartamento/Datatables/DataTables.php");
    
    } else {
        session_start();
        error_reporting(0);
        $Usuario= $_SESSION ['username'];
    
        echo "<h1>$Usuario, NO ESTÁ AUTORIZADO </h1>";   
        echo " <script> window.location.replace('../project.php') </script>";
    }
    }