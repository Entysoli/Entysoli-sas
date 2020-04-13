<?php

$con = mysqli_connect('localhost', 'root', '', 'entornos') or die('fallo');

$requ = $_REQUEST;
//COLUMNAS DE LA BASE DE DATOS
$col = array(
    0 => 'idApartamento',
    1 => 'idConjunto',
    2 => 'idBloque',
    3 => 'idPropietario',
    4 => 'idPersona',
    5 => 'Estado'
);
$sql = "select * from apartamento";
$query = mysqli_query($con, $sql);

$TD = mysqli_num_rows($query);

$TF = $TD;

$sql = "select * from apartamento where 1=1";

//CODIGO PARA BUSCAR EN LA TABLA LOS VALORES QUE ESTAN ALMACENADOS EN LA BASE DE DATOS
if (!empty($requ['search']['value'])) {
    $sql .= " AND (idApartamento like '" . $requ['search']['value'] . "%' ";
    $sql .= " OR idConjunto like '" . $requ['search']['value'] . "%' ";
    $sql .= " OR idBloque like '" . $requ['search']['value'] . "%' ";
    $sql .= " OR Estado like '" . $requ['search']['value'] . "%' ";
    $sql .= " OR idPropietario like '" . $requ['search']['value'] . "%' ";
    $sql .= " OR   idPersona     like '" . $requ['search']['value'] . "%' )";
}
$query = mysqli_query($con, $sql);
$TD = mysqli_num_rows($query);

//CODIGO PARA DAR UN ORDEN ASCENDENTE O DESCENDENTE A LOS CAMPOS DE LA TABLA

$sql .= " ORDER BY " . $col[$requ['order'][0]['column']] . "   " . $requ['order'][0]['dir'] . "    LIMIT " .
    $requ['start'] . "  ," . $requ['length'] . "     ";
$query = mysqli_query($con, $sql);

$data = array();


//ESTRUCTURA PARA PODER VISUALIZAR Y GESTIONAR LOS DATOS DE LA TABLA
while ($row = mysqli_fetch_array($query)) {
    $SD = array();
    $SD[] = $row[0];
    $SD[] = $row[1];
    $SD[] = $row[2];
    $SD[] = $row[3];
    $SD[] = $row[4];
    $SD[] = $row[5];
    $SD[] = '<button type="button" id="getEdit" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal" data-id="'.$row[0].'"><i class="glyphicon glyphicon-pencil">&nbsp;</i>Modificar</button>
             <a href="DataTables.php?delete='.$row[0].'" onclick="return confirm(\'¿Quieres borrar el id: '.$row[0].' ?\')" class="btn btn-danger btn-xs" ><i class="glyphicon glyphicon-trash">&nbsp;</i>Eliminar</a>';

    $data[] = $SD;
}

//CRUD PARA LA BASE DE DATOS

$json_data = array(
    "draw" => intval($requ['draw']),
    "recordsTotal" => intval($TD),
    "recordsFiltered" => intval($TF),
    "data" => $data
);
echo json_encode($json_data);