<?php
$con = mysqli_connect('localhost', 'root', '', 'entornos') or die('fallo');
if (isset($_REQUEST['id'])) {
    $id = intval($_REQUEST['id']);
    $sql = "select * from incidente where idIncidente=$id";
    $run = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($run)) {
        $ide = $row[0];
        $Tipo = $row[1];
        $Asunto = $row[2];
        $descripcion = $row[3];
        $idCon = $row[5];
        $idA = $row[6];
        $FechaL = $row[9];
        $estado = $row[10];
        $idCont = $row[11];
    }

?>
    <?php
    $query = "SELECT idIncidente, TipoIncidente, Asunto, Estado FROM Incidente ORDER BY Nombre ASC;";
    $resultado = $con->query($query);
    ?>
    <form class="form-horizontal" method="POST">
        <div class="modal-content">
            <div class="modal-head">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h1 class="modal-title">Editar Información</h1>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtid">Num Incidente</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtid" name="txtid" value="<?php echo $ide; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtname">Tipo</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtname" name="txtTipo" value="<?php echo $Tipo; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txttel">Asunto</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txttel" name="txtAsunto" value="<?php echo $Asunto; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtdir">Descripcion</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtdir" name="txtdescripcion" value="<?php echo $descripcion; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtid">Num Conjunto</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtidp" name="txtidA" value="<?php echo $idCon; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtid">Num Apartamento</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtidp" name="txtidA" value="<?php echo $idA; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtid">Fecha Limite</label>
                            <div class="col-sm-6">
                                <input type="txt" data-date-formate="dd-mm-yyyy" class="form-control" id="txtidp" name="txtFechaL" value="<?php echo $FechaL; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtid">Estado</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="txtEstado" id="">
                                    <option value="Solucionado">Solucionado</option>
                                    <option value="En proceso">En proceso</option>
                                    <option value="No Solucionado">No Solucionado</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtid">id Contratista</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtidp" name="cedula" value="<?php echo $idCon; ?>">
                            </div>
                        </div>

                    </div>
                </form>
            </div>


            <div style="overflow:scroll;" class="modal-body">
                <table style="width: 100%;text-align: center">
                    <h4>Contratistas</h4>
                    <tr>
                        <th style="border: solid 1px black; padding: 10px">Cedula</th>
                        <th style="border: solid 1px black; padding: 10px">Tipo</th>
                        <th style="border: solid 1px black; padding: 10px">Disponibilidad</th>
                    </tr>
                    <?php
                    $sqle = "SELECT Cedula, Tipo, Disponibilidad FROM contratistas WHERE Disponibilidad = 'Disponible'";
                    $contr = mysqli_query($con, $sqle); ?>
                    <?php
                    foreach ($contr as $contratista) {
                        echo "<tr><td>" . $contratista['Cedula'] . "</td>" . "<td>" . $contratista['Tipo'] . "</td>" . "</td>" . "<td>" . $contratista['Disponibilidad'] . "</td>";
                    }
                    ?>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" name="Asignar">Asignar</button>
            </div>
            <?php 
            $cont = $_POST['cedula'];
            $est = $_POST['txtEstado'];
            ?>
        </div>
    </form>


    <?php
    if (isset($_POST['Asignar'])) {
        $sq = "UPDATE incidente SET id_Contratista = '$cont', Estado ='$est' where idIncidente = '$id'";
        $contr = mysqli_query($con, $sq);
    }
    ?>
<?php
} ?>