<!DOCTYPE html>
<html lang="en">

<?php
include '../../../../public/styleTables.php';
include '../../../../public/HeadDataTables.php';

?>
<title>Incidentes</title>

<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Incidentes</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="example" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Tipo</th>
                                            <th>Asunto</th>
                                            <th>Descripcion</th>
                                            <th>Evidencia</th>
                                            <th>idConjunto</th>
                                            <th>Apto</th>
                                            <th>C.C Propietario</th>
                                            <th>Fecha Reporte</th>
                                            <th>Fecha Limite</th>
                                            <th>Estado</th>
                                            <th>Contratista</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <!--ESTRUCTURA PARA ALMACENAR DATOS A GESTIONAR-->
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">
                                    <div id="content-data"></div>
                                </div>

                            </div>

                            <!--CODIGO ENCARGADO DE GUARDAR LOS DATOS EN LA ESTRUCTURA ANTERIOR-->
                            <script>
                                $(document).ready(function() {
                                    var dataTable = $('#example').DataTable({
                                        "processing": true,
                                        "serverSide": true,
                                        "ajax": {
                                            url: "coneccion.php",
                                            type: "post"
                                        }
                                    });
                                });
                            </script>

                            <!--LLAMADO A EL FORMULARIO DE EDICION DE DATOS-->
                            <script>
                                $(document).on('click', '#getEdit', function(e) {
                                    e.preventDefault();
                                    var ide = $(this).data('id');
                                    $('#content-data').html('');
                                    $.ajax({
                                        url: 'EditData.php',
                                        type: 'POST',
                                        data: 'id= ' + ide,
                                        dataType: 'html'
                                    }).done(function(data) {
                                        $('#content-data').html('');
                                        $('#content-data').html(data);
                                    }).fial(function() {
                                        $('#content-data').html('<p>Error</p>');
                                    });
                                });
                            </script>

                            </body>

</html>

<?php

$con = mysqli_connect('localhost', 'root', '', 'entornos') or die('fallo');
if (isset($_POST['btnEdit'])) {
    $new_id = mysqli_real_escape_string($con, $_POST['txtid']);
    $new_tipo = mysqli_real_escape_string($con, $_POST['txttip']);
    $new_asunto = mysqli_real_escape_string($con, $_POST['txtasc']);
    $new_descripcion = mysqli_real_escape_string($con, $_POST['txtdes']);
    $new_conjunto = mysqli_real_escape_string($con, $_POST['txtcon']);
    $new_apartamento = mysqli_real_escape_string($con, $_POST['txtapa']);
    $new_propietario = mysqli_real_escape_string($con, $_POST['txtpro']);
    $new_fechaR = mysqli_real_escape_string($con, $_POST['txtfRe']);
    $new_fechaL = mysqli_real_escape_string($con, $_POST['txtfLi']);
    $new_estado = mysqli_real_escape_string($con, $_POST['txtest']);
    $new_contratista = mysqli_real_escape_string($con, $_POST['contratista']);

    $sqlupdate = "UPDATE incidente 
    set  TipoIncidente='$new_tipo', Asunto='$new_asunto', Descripcion='$new_descripcion', idConjunto='$new_conjunto', idApartamento='$new_apartamento', idPropietario = '$new_propietario', fechaReporte = '$new_fechaR', fechaLimite = '$new_fechaL', Estado = '$new_estado', Id_Contratista = '$new_contratista' where idIncidente='$new_id';";
    $ad = "UPDATE contratistas SET Disponibilidad = 'Ocupado' WHERE cedula = '$new_contratista';";
    $rad = mysqli_query($con, $ad);
    $result_update = mysqli_query($con, $sqlupdate);
    if ($result_update) {
        echo '<script>window.location.href="DataTables.php"</script>';
    } else {
        echo  $sqlupdate; //'<script>alert("No se actualizó")</script>';
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sqldelete = "DELETE FROM incidente where idIncidente='$id'";
    $result = mysqli_query($con, $sqldelete);
    if ($result) {
        echo '<script>window.location.href="DataTables.php"</script>';
    } else {
        echo '<script>alert("No se ha borrado")</script>';
    }
}

?>
<script src="../../Public/assets/js/app.min.js"></script>
<!-- JS Libraies -->
<!-- Page Specific JS File -->
<!-- Template JS File -->
<script src="../../Public/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="../../Public/assets/js/custom.js"></script>
<!-- Custom JS File -->