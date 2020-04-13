<!DOCTYPE html>
<html>

<head>
    <?php include '../Public/nav-bar.php'; ?>
    <script src="../../js/vendor/jquery-3.3.1.js"></script>
</head>

<?php
session_start();
$Admin = $_SESSION['id'];
$conexion = mysqli_connect('localhost', 'root', '', 'entornos');
$query = "SELECT idConjunto, Nombre FROM conjunto WHERE Admin = '$Admin' ORDER BY Nombre ASC;";
$resultado = $conexion->query($query);
?>


<?php include '../Public/slide-bar.php'; ?>
<?php include '../Public/style.php'; ?>
<link rel="stylesheet" href="../../css/jquery-ui.min.css">
<title>Gestion de apartamento</title>

<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 ">
                <div class="card">
                  <div class="card-header">
                    <h4>Gestion de Apartamentos</h4>
                    </div>


        <div class="card-body">
            <form action="guardar_apartamento.php" method="POST" class="form" enctype="multipart/form-data">
               
            <div class="form-group">
                <input class="form-control" type="number" name="idApartamento" placeholder="idApartamento">
            </div>

            <div class="form-group">
                <select class="form-control" name="conjunto" id="conjunto">
                <option value="0">Seleccione Conjunto</option>
                <?PHP while ($row = $resultado->fetch_assoc()) { ?>
                    <option value="<?php echo $row['idConjunto'] ?>">
                        <?php
                        echo $row['Nombre'] ?></option>
                <?php } ?>
            </select>
            </div>

            <div class="form-group">
                <select class="form-control" name="bloque" id="Bloque">
            </div>

            <div class="form-group">
                <input type="number" class="form-control" name="cedulaPropietario" placeholder="Cedula Propietario">
            </div>

            <div class="form-group">
                <select class="form-control" name="estado" id="">
                <option value="Activo">Activo</option>
                <option value="InActivo">Inactivo</option>
            </select>
            </div>

            <div class="card-footer text-right">
                <input type="submit" class="btn btn-primary mr-1t" name="guardar_apartamento" value="Guardar Apartamento" required>
                <a href="Datatables/DataTables.php"> <input type="button" class="btn btn-info" name="ver_apartamento" value="ver Apartamento"> </a>
            </div>

</html>
<script type="text/javascript">
    $(document).ready(function() {
        $('#conjunto').val(1);
        recargarLista();

        $('#conjunto').change(function() {
            recargarLista();
        });
    })
</script>
<script type="text/javascript">
    function recargarLista() {
        $.ajax({
            type: "POST",
            url: "datos.php",
            data: "conjunto=" + $('#conjunto').val(),
            success: function(r) {
                $('#Bloque').html(r);
            }
        });
    }
</script>

<?php include '../Public/general-Scripts.php'; ?>