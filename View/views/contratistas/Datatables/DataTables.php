<!DOCTYPE html>
<html lang="en">

<head>
<?php include '../../PublicForm/nav-bar.php'; ?>
<?php include '../../PublicForm/slide-bar.php'; ?>
<?php include '../../PublicForm/style.php'; ?>

<script src="../../../js/Datatables.min.js"></script>
    <script src="../../../js/Boostrap1.js"></script>
    <script src="../../../js/vendor/jquery-3.3.1.js"></script>
    <script src="../../../js/vendor/dataTables.min.js"></script>
</head>

<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Listado de contratistas</h4>
                  </div>
                  <div class="card-body">
                    <div class="section-title mt-0"></div>
                    <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Cedula</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Direccion</th>
                <th scope="col">Telefono</th>
                <th scope="col">Correo</th>
                <th scope="col">Tipo</th>
                <th scope="col">id Proveedor</th>
                <th scope="col">Disponibilidad</th>
                <th scope="col">Accion</th>
            </tr>
            </thead>

            <!--<tfoot>
                <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Tipo</th>
                    <th>id Proveedor</th>
                    <th>Disponibilidad</th>
                    <th>Accion</th>

                </tr>
            </tfoot>-->
        </table>
    </div>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div id="content-data"></div>
        </div>

    </div>


    <script>
        $(document).ready(function() {
            var dataTable = $('#table').DataTable({
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
    $new_nom = mysqli_real_escape_string($con, $_POST['txtname']);
    $new_ape = mysqli_real_escape_string($con, $_POST['txtape']);
    $new_dir = mysqli_real_escape_string($con, $_POST['txtdir']);
    $new_cel = mysqli_real_escape_string($con, $_POST['txtcel']);
    $new_mail = mysqli_real_escape_string($con, $_POST['txtmail']);
    $new_tipo = mysqli_real_escape_string($con, $_POST['txttipo']);
    $new_emp = mysqli_real_escape_string($con, $_POST['txtemp']);
    $new_disp = mysqli_real_escape_string($con, $_POST['txtdisp']);




    $sqlupdate = "UPDATE contratistas set Nombre='$new_nom', Apellido='$new_ape', Direccion ='$new_dir' ,Telefono='$new_cel',  Correo='$new_mail', Tipo = '$new_tipo', idProveedor = '$new_emp', Disponibilidad = '$new_disp' where cedula='$new_id'";
    $result_update = mysqli_query($con, $sqlupdate);
    if ($result_update) {
        echo '<script>window.location.href="DataTables.php"</script>';
    } else {
        echo '<script>alert("No se actualizó")</script>';
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sqldelete = "DELETE FROM contratistas where cedula='$id'";
    $result = mysqli_query($con, $sqldelete);
    if ($result) {
        echo '<script>window.location.href="DataTables.php"</script>';
    } else {
        echo '<script>alert("No se ha borrado")</script>';
    }
}

?>

<?php include '../../PublicForm/general-Scripts.php'; ?>