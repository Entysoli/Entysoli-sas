<!DOCTYPE html>
<html lang="en">

<head>
<?php include '../../PublicForm/nav-bar.php'; ?>
<?php include '../../PublicForm/slide-bar.php'; ?>
<?php include '../../PublicForm/style.php'; ?>
</head>

<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Listado de incidentes</h4>
                  </div>
                  <div class="card-body">
                    <div class="section-title mt-0"></div>
                    <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tipo</th>
                <th scope="col">Asunto</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Evidencia</th>
                <th scope="col">Conjunto</th>
                <th scope="col">Apto</th>
                <th scope="col">C.C. Propietario</th>
                <th scope="col">Fecha Reporte</th>
                <th scope="col">Fecha Solucion</th>
                <th scope="col">Estado</th>
                <th scope="col">Contratista</th>
                <th scope="col">Accion</th>
            </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Tipo</th>
                    <th>Asunto</th>
                    <th>Descripcion</th>
                    <th>Evidencia</th>
                    <th>Conjunto</th>
                    <th>Apto</th>
                    <th>C.C. Propietario</th>
                    <th>Fecha Reporte</th>
                    <th>Fecha Solucion</th>
                    <th>Estado</th>
                    <th>Contratista</th>
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

$con = mysqli_connect('localhost', 'root', '', 'entornos') or die('fallo');
if (isset($_POST['btnEdit'])) {
    $new_id = mysqli_real_escape_string($con, $_POST['txtid']);
    $new_tipo = mysqli_real_escape_string($con, $_POST['txttip']);
    $new_asu = mysqli_real_escape_string($con, $_POST['txtasc']);
    $new_des = mysqli_real_escape_string($con, $_POST['txtdes']);
    $new_con = mysqli_real_escape_string($con, $_POST['txtcon']);
    $new_apa = mysqli_real_escape_string($con, $_POST['txtapa']);
    $new_pro = mysqli_real_escape_string($con, $_POST['txtpro']);
    $new_fRe = mysqli_real_escape_string($con, $_POST['txtfRe']);
    $new_fLi = mysqli_real_escape_string($con, $_POST['txtfLi']);
    $new_est = mysqli_real_escape_string($con, $_POST['txtest']);
    $new_cont = mysqli_real_escape_string($con, $_POST['contratista']);


    $sqlupdate = "UPDATE incidente set TipoIncidente='$new_tipo', Asunto='$new_asu', Descripcion ='$new_des' ,idConjunto='$new_con', idApartamento='$new_apa', idPropietario = '$new_pro', fechaReporte = '$new_fRe', fechaLimite = '$new_fLi', Estado  ='$new_est', Id_Contratista='$new_cont' WHERE idIncidente='$new_id'";
    $result_update = mysqli_query($con, $sqlupdate);

    $sqlupdate = "UPDATE contratistas set Disponibilidad='Ocupado' WHERE cedula='$new_cont'";
    $result_update = mysqli_query($con, $sqlupdate);
    if ($result_update) {
        echo '<script>window.location.href="DataTables.php"</script>';
    } else {
        echo '<script>alert("NO se Actualizó ")</script>';
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sqldelete = "DELETE FROM incidente where IdIncidente='$id'";
    $result = mysqli_query($con, $sqldelete);
    if ($result) {
        echo '<script>window.location.href="DataTables.php"</script>';
    } else {
        echo '<script>alert("No se ha borrado")</script>';
    }
}

?>

<?php include '../../PublicForm/general-Scripts.php'; ?>