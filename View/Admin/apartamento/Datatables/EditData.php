<?php
include '../../../../model/conectar.php';
if (isset($_REQUEST['id'])) {
    $id = intval($_REQUEST['id']);
    $sql = "select * from apartamento where idApartamento=$id";
    $run = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($run)) {
        $ide = $row[0];
        $ico = $row[1];
        $idb = $row[2];
        $idp = $row[3];
        $id = $row[4];
        $es = $row[5];
    }

    $query = "SELECT idConjunto, Nombre FROM conjunto ORDER BY Nombre ASC;";
    $resultado = $con->query($query);
?>

    <?php
    $que = "SELECT idConjunto, Nombre FROM conjunto WHERE idConjunto = '$ico'";
    $actual = $con->query($que);
    $rowa = $actual->fetch_assoc();

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
                            <label class="col-sm-4 control-label" for="txtid">id Apartamento</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtid" name="txtid" value="<?php echo $ide; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtname">id Conjunto</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="txtCon" id="contratista">
                                    <option value="<?php error_reporting(0);
                                                    $rowa['idConjunto'] ?>"><?php echo "Actual" . ": " . $rowa['idConjunto'] . ' | ' . $rowa['Nombre'] ?></option>
                                    <?PHP while ($row = $resultado->fetch_assoc()) {
                                        if ($row['idConjunto'] != $rowa['idConjunto']) { ?>
                                            <option value="<?php echo $row['idConjunto'] ?>">
                                                <?php
                                                echo $row['idConjunto'] . ' | ' . $row['Nombre'] ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txttel">id Bloque</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="idB" name="idB" value="<?php echo $idb; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtdir">C.C Propietario</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $idp; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtid">id Persona</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="idP" name="idP" value="<?php echo $id; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtid">Estado</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="idPer" name="idPer" value="<?php echo $es; ?>">
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