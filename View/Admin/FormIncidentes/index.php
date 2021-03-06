<?php 
include '../../../model/conectar.php';
$query = "SELECT idConjunto, Nombre FROM conjunto ORDER BY Nombre ASC;";
$resultado = $con->query($query);

?>
<?php include '../../../public/style.php'; ?>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <?php include '../../../public/nav-bar.php'; ?>
      <!--NAV-BAR-->
      <?php include '../../../public/slide-bar.php'; ?>
<title>Incidente</title>

<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 ">
                <div class="card">
                  <div class="card-header">
                    <h4>Incidente</h4>
                    </div>


<!-- INSERTAR TODOS LOS DATOS -->

<div class="card-body">
        <form action="registrarIncidente.php" method="POST" class="form" enctype="multipart/form-data">


        <div class="form-group">
            <select class="form-control" required name="PQRS" id="">
                <option value="peticion">Petición</option>
                <option value="queja">Queja</option>
                <option value="reclamo">Reclamo</option>
                <option value="sugerencia">Sugerencia</option>
            </select>
            </div>

            <div class="form-group">
            <select required class="form-control" name="conjunto" id="conjunto">
                <option value="0">Seleccione Conjunto</option>
                <?PHP while ($row = $resultado->fetch_assoc()) { ?>
                    <option value="<?php echo $row['idConjunto'] ?>">
                        <?php echo $row['idConjunto'];
                        echo ' | ';
                        echo $row['Nombre'] ?></option>
                <?php } ?>

            </select>
            </div>

            <div class="form-group">
            <input type="text" name="idPropietario" class="form-control" placeholder="Cedula propietario" minlength="1" maxlength="50" autofocus tabindex="4" required>
            </div>

            <div class="form-group">
            <input type="text" name="idApartamento" class="form-control" placeholder="Num Apartamento" minlength="1" maxlength="50" autofocus required tabindex="2">
            </div>
            
            <div class="form-group">
            <input type="text" name="Asunto" class="form-control" placeholder="Asunto" minlength="1" maxlength="50" autofocus required tabindex="4">
            </div>

            <div class="form-group">
            <textarea class="form-control" name="descripcion" placeholder="Da una descripcion de maximo 500 caracteres" id="" cols="30" rows="5" maxlength="500" required></textarea>
            </div>
            
            <div class="form-group">
            <input class="form-control" name="evidencia" type="file" id="" required>
            </div>

            <div class="form-group">
            <input class="form-control" id="datepicker" name="fecha_Limite" type="text" placeholder="Fecha limite para solución" required>
            </div>

            <div class="card-footer text-right">
            <input type="submit" class="btn btn-primary mr-1t" name="guardar_incidente" value="Guardar Incidente" required>
            </div>
    </div>

</div>
</div>

<script src="../../js/vendor/jquery-3.3.1.js"></script>
<script src="../../js/vendor/jquery-ui.min.js"></script>

<script>
    $("#datepicker").datepicker();
</script>

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


<?php include '../../../public/forms.php'; ?>