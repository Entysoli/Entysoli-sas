<?php
include '../../../../model/conectar.php';
$query = "SELECT idConjunto, Nombre FROM conjunto ORDER BY Nombre ASC;";
$resultado = $con->query($query);

if (isset($_REQUEST['id'])) {
    $id = intval($_REQUEST['id']);
    $sql = "select * from adminconjunto where Cedula=$id";
    $run = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($run)) {
        $ide = $row[0];
        $nom = $row[1];
        $ape = $row[2];
        $cor = $row[3];
        $tel = $row[4];
        $cont = $row[5];
    }

?>

    <?php
    $que = "SELECT idConjunto, Nombre FROM conjunto WHERE Admin = '$id'";
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
                            <label class="col-sm-4 control-label" for="txtname">Apellido</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtape" name="txtape" value="<?php echo $ape; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txttel">Correo</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtCorreo" name="txtCorreo" value="<?php echo $cor; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtdir">Telefono</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtTelefono" name="txtTelefono" value="<?php echo $tel; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtid">ID Conjunto</label>
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


<script src="../../Public/js/vendor/jquery-3.3.1.js"></script>
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