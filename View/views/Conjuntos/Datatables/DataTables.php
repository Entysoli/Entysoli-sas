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
                    <h4>Listado de Conjuntos</h4>
                  </div>
                  <div class="card-body">
                    <div class="section-title mt-0"></div>
                    <table class="table table-striped" id="example">
            <thead>
            <tr>
                <th scope="col">id Conjunto</th>
                <th scope="col">Nombre</th>
                <th scope="col">Telefono</th>
                <th scope="col">Direccion</th>
                <th scope="col">Estado</th>
                <th scope="col">id Persona</th>
                <th scope="col">Cant Bloques</th>
                <th scope="col">Accion</th>
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
<?php include '../../PublicForm/general-Scripts.php'; ?>