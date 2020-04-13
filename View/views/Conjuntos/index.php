<!DOCTYPE html>
<html>

<head>
<?php include "../../models/conexion.php"; ?>
<script src="../../js/vendor/jquery-3.3.1.js" ></script>
<?php include '../Public/nav-bar.php'; ?>
</head>



<?php include '../Public/slide-bar.php'; ?>
<?php include '../Public/style.php'; ?>
<link rel="stylesheet" href="../../css/jquery-ui.min.css">
<title>Conjuntos</title>
<!-- INSERTAR TODOS LOS DATOS -->


<div class="main-content">
  <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 ">
                <div class="card">
                  <div class="card-header">
                    <h4>Conjuntos</h4>
                    </div>

    <div class="card-body">
        <form action="guardar_conjunto.php" method="POST" class="form" enctype="multipart/form-data">

            <div class="form-header">
                
            </div>

            <div class="form-group">
            <input type="text" name="nit" class="form-control" placeholder="Nit" minlength="3" maxlength="50" tabindex="1" autofocus required>
            </div>
            
            <div class="form-group">
            <input type="text" name="nombre_conjunto" class="form-control" placeholder="Nombre" minlength="3" maxlength="50" tabindex="1" autofocus required>
            </div>

            <div class="form-group">
            <input type="text" name="telefono" class="form-control" placeholder="Telefono" minlength="5" maxlength="50" tabindex="2" autofocus required>
            </div>

            <div class="form-group">
            <input type="text" name="direccion_conjunto" class="form-control" placeholder="Direccion" minlength="5" maxlength="50" tabindex="2" autofocus required>
            </div>

            <div class="form-group">
            <label for="" class="form-label">Estado de acceso</label>
            <select type="text" name="estado" class="form-control" placeholder="Estado" minlength="5" maxlength="30" tabindex="3" autofocus required>
                
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
            </select>
            </div>

            <div class="form-group">
            <input type="number" name="Bloques" class="form-control" placeholder="Cantidad de Bloques" tabindex="3" autofocus required>
            </div>

            <div class="card-footer text-right">
            <input type="submit" class="btn btn-primary mr-1t" name="guardar_conjunto" value="Guardar conjunto">
                <a href="Datatables/DataTables.php"><input type="button" class="btn btn-info" name="ver_conjuntos" value="ver conjuntos"> </a>
            </div>
            </section>
    </div>
</div>


<?php include '../Public/general-Scripts.php'; ?>