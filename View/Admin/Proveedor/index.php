
<?php include '../../../public/style.php'; ?>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <?php include '../../../public/nav-bar.php'; ?>
            <!--NAV-BAR-->
            <?php include '../../../public/slide-bar.php'; ?>
<title>Proveedor</title>

<!-- INSERTAR TODOS LOS DATOS -->

<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 ">
                <div class="card">
                  <div class="card-header">
                    <h4>Proveedor</h4>
                    </div>

<div class="card-body">
            
            <form action="guardar_proveedor.php" method="POST" class="form" enctype="multipart/form-data">

            <div class="form-group">
                <input type="text" name="idProveedor" class="form-control" placeholder="Identificación" minlength="3" maxlength="50" tabindex="1" autofocus required>
            </div>

            <div class="form-group">
                <input type="text" name="Nombre" class="form-control" placeholder="Nombre" minlength="3" maxlength="50" tabindex="1" autofocus required>
            </div>

            <div class="form-group">
                <input type="text" name="Apellido" class="form-control" placeholder="Apellido" minlength="3" maxlength="50" tabindex="1" autofocus required>
            </div>

            <div class="form-group">
                <input type="text" name="Direccion" class="form-control" placeholder="direccion" minlength="5" maxlength="50" tabindex="2" autofocus required>
            </div>                    
                    
            <div class="form-group">
                <input type="text" name="Telefono" class="form-control" placeholder="telefono" minlength="8" maxlength="30" tabindex="3" autofocus required>
            </div>

            <div class="form-group">
                <input type="text" name="Correo" class="form-control" placeholder="correo electronico" minlength="8" maxlength="30" tabindex="3" autofocus required>
            </div>

            <div class="card-footer text-right">
                <input type="submit" class="btn btn-primary mr-1t" name="guardar_proveedor" value="guardar proveedor">
                <a href="Datatables/DataTables.php"><input type="button" class="btn btn-info" name="ver_conjuntos" value="ver proveedores"> </a>
            </div>

    </div>
</div>

<?php include '../../../public/forms.php'; ?>


    