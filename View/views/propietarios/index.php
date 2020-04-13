<head>
<?php include("../../models/conexion.php"); ?>
<script src="../../js/vendor/jquery-3.3.1.js" ></script>
<?php include '../Public/nav-bar.php'; ?>
</head>


<?php
$query = "SELECT idConjunto, Nombre FROM conjunto ORDER BY Nombre ASC;";
$resultado = $conn->query($query);
?>


<?php include '../Public/slide-bar.php'; ?>
<?php include '../Public/style.php'; ?>
<link rel="stylesheet" href="../../css/jquery-ui.min.css">
<title>Propietarios</title>
<!-- INSERTAR TODOS LOS DATOS -->

<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 ">
                <div class="card">
                  <div class="card-header">
                    <h4>Propietarios</h4>
                    </div>

    <div class="card-body">
        <form action="Guardar.php" method="POST" class="form-control" enctype="multipart/form-data">
            
        <div class="form-group">
            <input type="number" name="cedula" class="form-control" placeholder="cedula" minlength="3" maxlength="50" tabindex="1" autofocus required>
        </div>

        <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="nombre" minlength="3" maxlength="50" tabindex="1" autofocus required>
        </div>

        <div class="form-group">
            <input type="text" name="apellido" class="form-control" placeholder="apellido" minlength="5" maxlength="50" tabindex="2" autofocus required>
        </div>

        <div class="form-group">
            <input type="number" name="telefono" class="form-control" placeholder="telefono" minlength="8" maxlength="30" tabindex="3" autofocus required>
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

        <div class="card-footer text-right">
            <input type="submit" class="btn btn-primary mr-1t" name="Guardar" value="Guardar">
            <a href="Datatables/DataTables.php"><input type="button" class="btn btn-info" name="ver_propietarios" value="Ver Propietarios"> </a>
        </div>
    </div>
</div>

<script src="../../js/vendor/jquery-3.3.1.js"></script>
<script>
    $(document).ready(function() {
        $('#conjunto').val(0);
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
            url: "bloques.php",
            data: "conjunto=" + $('#conjunto').val(),
            success: function(r) {
                $('#Bloque').html(r);
            }
        })
    }
</script>


<?php include '../Public/general-Scripts.php'; ?>