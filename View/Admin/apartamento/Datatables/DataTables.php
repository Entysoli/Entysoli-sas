<!DOCTYPE html>
<html lang="en">
<?php
include '../../../../public/styleTables.php';
include '../../../../public/HeadDataTables.php';

?>
<title>Apartamentos</title>
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Apartamentos</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="example" id="table-1">
                                <thead>
                                    <tr>
                                        <th>Num Apartamento</th>
                                        <th>Conjunto</th>
                                        <th>Bloque</th>
                                        <th>id Propiertario</th>
                                        <th>id Persona</th>
                                        <th>Estado</th>
                                        <th>Accion</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Num Apartamento</th>
                                        <th>Conjunto</th>
                                        <th>Bloque</th>
                                        <th>id Propiertario</th>
                                        <th>id Persona</th>
                                        <th>Estado</th>
                                        <th>Accion</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                                <div id="content-data"></div>
                            </div>

                        </div>



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

include '../../../../model/conectar.php';
if (isset($_POST['btnEdit'])) {
    $new_id = mysqli_real_escape_string($con, $_POST['txtid']);
    $new_conjunto = mysqli_real_escape_string($con, $_POST['conjunto']);
    $new_bloque = mysqli_real_escape_string($con, $_POST['idB']);
    $new_estado = mysqli_real_escape_string($con, $_POST['estado']);
    $new_idpropietario = mysqli_real_escape_string($con, $_POST['idP']);
    $new_idpersona = mysqli_real_escape_string($con, $_POST['idPer']);
    $sqlupdate = "UPDATE apartamento set
    idConjunto='$new_conjunto', idBloque='$new_bloque', Estado='$new_estado', idPropietario='$new_idpropietario' where idApartamento='$new_id'";
    $result_update = mysqli_query($con, $sqlupdate);
    if ($result_update) {
        echo '<script>window.location.href="DataTables.php"</script>';
    } else {
        echo $sqlupdate;
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sqldelete = "DELETE FROM apartamento where idApartamento='$id'";
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