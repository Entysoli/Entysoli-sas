<!DOCTYPE html>
<html lang="en">


<?php
include '../../../../public/styleTables.php';
include '../../../../public/HeadDataTables.php';

?>
<title>Propietarios</title>
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Propietarios</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="example" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>C.C</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Telefono</th>
                                            <th>Conjunto</th>
                                            <th># Persona</th>
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
    $new_nom = mysqli_real_escape_string($con, $_POST['txtname']);
    $new_tel = mysqli_real_escape_string($con, $_POST['txttel']);
    $new_dir = mysqli_real_escape_string($con, $_POST['txtdir']);
    $new_es = mysqli_real_escape_string($con, $_POST['txtes']);
    $new_idp = mysqli_real_escape_string($con, $_POST['txtidp']);
    $new_can = mysqli_real_escape_string($con, $_POST['txtcan']);
    $sqlupdate = "UPDATE conjunto set Nombre='$new_nom', Telefono='$new_tel', Direccion='$new_dir', Estado='$new_es', idPersona='$new_idp', NumBloques='$new_can' where idConjunto='$new_id'";
    $result_update = mysqli_query($con, $sqlupdate);
    if ($result_update) {
        echo '<script>window.location.href="DataTables.php"</script>';
    } else {
        echo '<script>alert("No se actualizó")</script>';
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sqldelete = "DELETE FROM apartamento WHERE idConjunto ='$id';
    DELETE FROM propietario WHERE idCon='$id';
        DELETE FROM bloque WHERE idConjunto ='$id';
        DELETE FROM conjunto where idConjunto='$id';";


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