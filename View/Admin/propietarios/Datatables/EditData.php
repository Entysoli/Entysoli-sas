<?php
$con = mysqli_connect('localhost', 'root', '', 'entornos') or die('fallo');
if (isset($_REQUEST['id'])) {
    $id = intval($_REQUEST['id']);
    $sql = "select * from propietario where Cedula=$id";
    $run = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($run)) {
        $ide = $row[0];
        $nom = $row[1];
        $tel = $row[2];
        $dir = $row[3];
        $idp = $row[4];
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
                                <input type="text" class="form-control" id="txtid" name="txtid" value="<?php echo $ide; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtname">Nombre</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtname" name="txtname" value="<?php echo $nom; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txttel">Apellido</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txttel" name="txttel" value="<?php echo $tel; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtdir">Telefono</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtdir" name="txtdir" value="<?php echo $dir; ?>">
                            </div>
                        </div>

                        <?php

                        $query = "SELECT idConjunto, Nombre FROM conjunto ORDER BY Nombre ASC;";
                        $resultado = $con->query($query);

                        ?>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtid">Conjunto</label>
                            <div class="col-sm-6">
                            <select class="form-control"  required class="form-input" name="conjunto" id="conjunto">
                                <option value="0">Seleccione Conjunto</option>
                                <?PHP while ($row = $resultado->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['idConjunto'] ?>">
                                        <?php
                                        echo $row['Nombre'] ?></option>
                                <?php } ?>

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