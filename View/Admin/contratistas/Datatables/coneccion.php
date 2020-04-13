<?php

$con = mysqli_connect('localhost', 'root', '', 'entornos') or die('fallo');

$requ = $_REQUEST;
$col = array(
    0 => 'cedula',
    1 => 'Nombre',
    2 => 'Apellido',
    3 => 'Direccion',
    4 => 'Telefono',
    5 => 'Correo',
    6 => 'Tipo',
    7 => 'idProveedor',
    8 => 'Disponibilidad'
);

$sql = "select * from contratistas";
$query = mysqli_query($con, $sql);

$TD = mysqli_num_rows($query);

$TF = $TD;

$sql = "select * from contratistas where 1=1";

if (!empty($requ['search']['value'])) {
    $sql .= " AND (cedula like '" . $requ['search']['value'] . "%' ";
    $sql .= " OR Nombre like '" . $requ['search']['value'] . "%' ";
    $sql .= " OR Apellido like '" . $requ['search']['value'] . "%' ";
    $sql .= " OR Direccion like '" . $requ['search']['value'] . "%' ";
    $sql .= " OR Telefono like '" . $requ['search']['value'] . "%' ";
    $sql .= " OR Correo like '" . $requ['search']['value'] . "%' ";
    $sql .= " OR Tipo like '" . $requ['search']['value'] . "%' ";
    $sql .= " OR idProveedor like '" . $requ['search']['value'] . "%' ";
    $sql .= " OR   Disponibilidad     like '" . $requ['search']['value'] . "%' )";
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
    $SD[] = $row[4];
    $SD[] = $row[5];
    $SD[] = $row[6];
    $SD[] = $row[7];
    $SD[] = $row[8];
    $SD[] = '<button type="button" id="getEdit" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal" data-id="'.$row[0].'"><i class="glyphicon glyphicon-pencil">&nbsp;</i>Modificar</button>
             <a href="DataTables.php?delete='.$row[0].'" onclick="return confirm(\'¿Quieres borrar el id: '.$row[0].' ?\')" class="btn btn-danger btn-xs" ><i class="glyphicon glyphicon-trash">&nbsp;</i>Eliminar</a>';

    $data[] = $SD;
}
$json_data = array(
    "draw" => intval($requ['draw']),
    "recordsTotal" => intval($TD),
    "recordsFiltered" => intval($TF),
    "data" => $data
);
echo json_encode($json_data);
