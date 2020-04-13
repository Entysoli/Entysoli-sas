<?php

$con = mysqli_connect('localhost', 'root', '', 'entornos') or die('fallo');

$requ = $_REQUEST;
$col = array(
    0 => 'idIncidente',
    1 => 'TipoIncidente',
    2 => 'Asunto',
    4 => 'Evidencia',
    5 => 'idConjunto',
    3 => 'Descripcion',
    6 => 'idApartamento',
    7 => 'idPropietario',
    8 => 'fechaReporte',
    9 => 'fechaLimite',
    10 =>'Estado',
    11 =>'Id_Contratista'
);

$img = base64_encode($col[4]);

$sql = "SELECT * FROM incidente";
$query = mysqli_query($con, $sql);

$TD = mysqli_num_rows($query);

$TF = $TD;

$sql = "SELECT * FROM  incidente WHERE 1=1";

if (!empty($requ['search']['value'])) {
    $sql .= " AND (idProveedor like '" . $requ['search']['value'] . "%' ";
    $sql .= " OR Nombre like '" . $requ['search']['value'] . "%' ";
    $sql .= " OR Apellido like '" . $requ['search']['value'] . "%' ";
    $sql .= " OR Direccion like '" . $requ['search']['value'] . "%' ";
    $sql .= " OR Telefono like '" . $requ['search']['value'] . "%' ";
    $sql .= " OR   Correo     like '" . $requ['search']['value'] . "%' )";
}
$query = mysqli_query($con, $sql);
$TD = mysqli_num_rows($query);

$sql .= " ORDER BY " . $col[$requ['order'][0]['column']] . "   " . $requ['order'][0]['dir'] . "    LIMIT " .
    $requ['start'] . "  ," . $requ['length'] . "     ";
$query = mysqli_query($con, $sql);

$data = array();



while ($row = mysqli_fetch_array($query)) {
    $SD = array();
    $SD[] = $row[0];
    $SD[] = $row[1];
    $SD[] = $row[2];
    $SD[] = $row[3];
    $SD[] = $img;
    $SD[] = $row[5];
    $SD[] = $row[6];
    $SD[] = $row[7];
    $SD[] = $row[8];
    $SD[] = $row[9];
    $SD[] = $row[10];
    $SD[] = $row[11];
    $SD[] = '<button type="button" id="getEdit" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal" data-id="' . $row[0] . '"><i class="glyphicon glyphicon-pencil">&nbsp;</i>Modificar</button>
             <a href="DataTables.php?delete=' . $row[0] . '" onclick="return confirm(\'¿Quieres borrar el id: ' . $row[0] . ' ?\')" class="btn btn-danger btn-xs" ><i class="glyphicon glyphicon-trash">&nbsp;</i>Eliminar</a>';

    $data[] = $SD;
}
$json_data = array(
    "draw" => intval($requ['draw']),
    "recordsTotal" => intval($TD),
    "recordsFiltered" => intval($TF),
    "data" => $data
);
echo json_encode($json_data);
