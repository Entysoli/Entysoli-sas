<?php
$con = mysqli_connect('localhost', 'root', '', 'entornos') or die('fallo');
if (isset($_REQUEST['id'])) {
    $id = intval($_REQUEST['id']);
    $sql = "select * from incidente where IdIncidente=$id";
    $run = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($run)) {
        $IdIncidente = $row[0];
        $TipoIncidente = $row[1];
        $Asunto = $row[2];
        $Descripcion = $row[3];
        $Evidencia = $row[4];
        $idConjunto = $row[5];
        $idApartamento = $row[6];
        $idPropietario = $row[7];
        $fechaReporte =  $row[8];
        $fechaLimite =  $row[9];
        $Estado = $row[10];
        $id_Contratista = $row[11];
    }
?>
    <?php

    $query = "SELECT cedula, Nombre, Tipo, Apellido FROM contratistas WHERE Disponibilidad = 'Disponible';";
    $resultado = $con->query($query);

    $que = "SELECT cedula, Nombre, Apellido, Tipo FROM contratistas WHERE cedula = '$id_Contratista'";
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
                            <label class="col-sm-4 control-label" for="txtid">#</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtid" name="txtid" value="<?php echo $IdIncidente; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtname">Tipo</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtname" name="txttip" value="<?php echo $TipoIncidente; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txttel">Asunto</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtape" name="txtasc" value="<?php echo $Asunto; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtdir">Descripcion</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtdir" name="txtdes" value="<?php echo $Descripcion; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtid">Conjunto</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtcel" name="txtcon" value="<?php echo $idConjunto; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtid">Apartamento</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtmail" name="txtapa" value="<?php echo $idApartamento; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtid"># Propietario</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txttipo" name="txtpro" value="<?php echo $idPropietario; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtid">Fecha Reporte</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtemp" name="txtfRe" value="<?php echo $fechaReporte; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtid">Fecha Limite</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtemp" name="txtfLi" value="<?php echo $fechaLimite; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtid">Estado</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtemp" name="txtest" value="<?php echo $Estado; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtid">Contratista</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="contratista" id="contratista">
                                    <option value="<?php error_reporting(0); $rowa['cedula'] ?>"><?php echo "Actual" . ": " . $rowa['Nombre'] . " " .  $rowa['Apellido'] . "|" .  " " . $rowa['Tipo'] ?></option>
                                    <?PHP while ($row = $resultado->fetch_assoc()) {
                                        if ($row['cedula'] != $rowa['cedula']) { ?>
                                            <option value="<?php echo $row['cedula'] ?>">
                                                <?php
                                                echo $row['Nombre'] . " " .  $row['Apellido'] . "|" .  " " . $row['Tipo'] ?></option>
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
<script type="text/javascript">
    $(document).ready(function() {
        $('#contratista').val();
        recargarLista();

        $('#contratista').change(function() {
            recargarLista();
        });
    })
</script>