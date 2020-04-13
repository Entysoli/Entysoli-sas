<head>
<?php include("../../models/conexion.php"); ?>
<script src="../../js/vendor/jquery-3.3.1.js" ></script>
<?php include '../Public/nav-bar.php'; ?>
</head>

<?php include '../Public/slide-bar.php'; ?>
<?php include '../Public/style.php'; ?>
<link rel="stylesheet" href="../../css/jquery-ui.min.css">
<title>Contratistas</title>

<!-- INSERTAR TODOS LOS DATOS -->
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
            <input type="text" name="apellido" class="form-control" placeholder="Apellido" minlength="3" maxlength="50" tabindex="1" autofocus required>
            </div>

            <div class="form-group">
            <input type="password" name="contraseña" class="form-control" placeholder="Contraseña" minlength="5" maxlength="50" tabindex="2" autofocus required>
            </div>

            <div class="form-group">
            <select class="form-control" name="seleccion" id="seleccion">
                <option class="focus-input100" value="Gerente">Gerente</option>
                <option class="focus-input100" value="Propietario">Propietario</option>
                <option class="focus-input100" value="AdminConjunto">Admin de Conjunto</option>
            </select>
            </div>

            <div class="form-group">
            <input type="mail" name="Correo" class="form-control" placeholder="Correo" minlength="5" maxlength="50" tabindex="2" autofocus required>
            </div>

            <div class="card-footer text-right">
            <input type="submit" class="btn btn-primary mr-1t" name="Guardar" value="Guardar">
            <a href="Datatables/DataTables.php"><input type="button" class="btn btn-info" name="ver_propietarios" value="Ver Propietarios"> </a>
            </div>

    </div>
</div>

<?php include '../Public/general-Scripts.php'; ?>