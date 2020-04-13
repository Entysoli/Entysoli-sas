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
                    <h4>Listado de Administradores</h4>
                  </div>
                  <div class="card-body">
                    <div class="section-title mt-0"></div>
                    <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Cedula</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Telefono</th>
                <th scope="col">idConjunto</th>
                <th scope="col">Accion</th>
            </tr>
            </thead>

            <tfoot>
                <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>idConjunto</th>
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
    $new_nom = mysqli_real_escape_string($con, $_POST['txtname']);
    $new_cor = mysqli_real_escape_string($con, $_POST['txtCorreo']);
    $new_tel = mysqli_real_escape_string($con, $_POST['txtTelefono']);
    $new_con = mysqli_real_escape_string($con, $_POST['txtidCon']);
    $sqlupdate = "UPDATE adminconjunto set Nombre='$new_nom', Correo='$new_cor', Telefono='$new_tel', idConjunto='$new_con' where Cedula='$new_id'";
    $result_update = mysqli_query($con, $sqlupdate);
    if ($result_update) {
        echo '<script>window.location.href="DataTables.php"</script>';
    } else {
        echo '<script>alert("No se actualizó")</script>';
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sqldelete = "DELETE FROM adminconjunto where Cedula='$id'";
    $result = mysqli_query($con, $sqldelete);
    if ($result) {
        echo '<script>window.location.href="DataTables.php"</script>';
    } else {
        echo '<script>alert("No se ha borrado")</script>';
    }
}

?>

<?php include '../../PublicForm/general-Scripts.php'; ?>