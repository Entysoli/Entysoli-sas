<?php
$con = mysqli_connect('localhost', 'root', '', 'entornos') or die('fallo');
if (isset($_REQUEST['id'])) {
    $id = intval($_REQUEST['id']);
    $sql = "select * from conjunto where idConjunto=$id";
    $run = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($run)) {
        $ide = $row[0];
        $nom = $row[1];
        $tel = $row[2];
        $dir = $row[3];
        $est = $row[4];
        $idp = $row[5];
        $numBloques = $row[6];

        
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
                            <label class="col-sm-4 control-label" for="txtid">id Conjunto</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtid" name="txtid" readonly value="<?php echo $ide; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtname">Nombre</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtname" name="txtname" value="<?php echo $nom; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txttel">Telefono</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txttel" name="txttel" value="<?php echo $tel; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtdir">Direccion</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtdir" name="txtdir" value="<?php echo $dir; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtid">Estado</label>
                            <div class="col-sm-6">
                                <select type="text" class="form-control" id="txtes" name="txtes" value="<?php echo $est; ?>">
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtid">ID Persona</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtidp" name="txtidp" readonly value="<?php echo $idp; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtid">Cant Bloques</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtcan" name="txtcan" value="<?php echo $numBloques; ?>">
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