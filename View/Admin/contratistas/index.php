<!-- INSERTAR TODOS LOS DATOS -->

<?php
$conexion = mysqli_connect('localhost', 'root', '', 'entornos');
$query = "SELECT idRol, nombreRol FROM rol ORDER BY idRol ASC;";
$resultado = $conexion->query($query);
$que = "SELECT idProveedor, Nombre FROM proveedor ORDER BY idProveedor ASC;";
$result = $conexion->query($que);
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
      <title>Contratistas</title>

      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 ">
                <div class="card">
                  <div class="card-header">
                    <h4>Contratistas</h4>
                  </div>

                  <div class="card-body">
                    <form action="Guardar.php" method="POST" class="form" enctype="multipart/form-data">


                      <div class="form-group">
                        <input type="text" name="cedula" class="form-control" placeholder="Cedula" minlength="3" maxlength="50" tabindex="1" autofocus required>
                      </div>

                      <div class="form-group">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre" minlength="3" maxlength="50" tabindex="1" autofocus required>
                      </div>

                      <div class="form-group">
                        <input type="text" name="apellido" class="form-control" placeholder="Apellido" minlength="5" maxlength="50" tabindex="2" autofocus required>
                      </div>

                      <div class="form-group">
                        <input type="text" name="direccion" class="form-control" placeholder="Direccion" tabindex="3" autofocus>
                      </div>

                      <div class="form-group">
                        <input type="text" name="telefono" class="form-control" placeholder="Telefono" minlength="8" maxlength="30" tabindex="3" autofocus required>
                      </div>

                      <div class="form-group">
                        <input type="text" name="correo" class="form-control" placeholder="Correo" tabindex="1" autofocus required>
                      </div>

                      <div class="form-group">
                        <select class="form-control" name="rol" id="rol">
                          <option value="0">Tipo Contratista</option>
                          <option value="Jardinero">Jardinero</option>
                          <option value="Aseador">Aseador</option>
                          <option value="Todero">Todero</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <select class="form-control" name="idproveedor" id="empresa">
                          <option value="0">Empresa a la que pertenece</option>
                          <?PHP while ($row = $result->fetch_assoc()) { ?>
                            <option value="<?php echo $row['idProveedor'] ?>">
                              <?php
                              echo $row['Nombre'] ?></option>
                          <?php } ?>
                        </select>
                      </div>

                      <div class="card-footer text-right">
                        <input type="submit" class="btn btn-primary mr-1t" name="Guardar" value="Guardar">
                        <a href="Datatables/DataTables.php"><input type="button" class="btn btn-info" name="vercontra" value="Ver Contratistas"> </a>
                      </div>

                  </div>
                </div>

                <?php include '../../../public/forms.php'; ?>
