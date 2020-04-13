<?php
$con = mysqli_connect('localhost', 'root', '', 'entornos') or die('fallo');
if (isset($_REQUEST['id'])) {
    $id = intval($_REQUEST['id']);
    $sql = "select * from contratistas where cedula=$id";
    $run = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($run)) {
        $cedula = $row[0];
        $nombre = $row[1];
        $apellido = $row[2];
        $direccion = $row[3];
        $telefono = $row[4];
        $correo = $row[5];
        $tipo = $row[6];
        $empresa = $row[7];
        $disponibilidad =  $row[8];
    }

?>
    <form class="form-horizontal" method="POST">
        <div class="modal-content">
            <div class="modal-head">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar Información</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtid">Cedula</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtid" name="txtid" value="<?php echo $cedula; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtname">Nombre</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtname" name="txtname" value="<?php echo $nombre; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txttel">Apellido</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtape" name="txtape" value="<?php echo $apellido; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtdir">Direccion</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtdir" name="txtdir" value="<?php echo $direccion; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtid">Telefono</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtcel" name="txtcel" value="<?php echo $telefono; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtid">Correo</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtmail" name="txtmail" value="<?php echo $correo; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtid">Tipo</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txttipo" name="txttipo" value="<?php echo $tipo; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtid">id Empresa</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtemp" name="txtemp" value="<?php echo $empresa; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtid">Disponibilidad</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="txtdisp" name="txtdisp" ">
                                    <option value="Disponible">Disponible</option>
                                    <option value="Ocupado">Ocupado</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" name="btnEdit">Guardar</button>
            </div>
        </div>
    </form>
<?php
} ?>