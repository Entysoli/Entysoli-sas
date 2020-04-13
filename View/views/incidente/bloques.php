<?php

include '../../models/conexion.php';

$idConjunto = $_POST['conjunto'];

$queryB = "SELECT idBloque, idConjunto FROM bloque where idConjunto = '$idConjunto' ORDER BY idConjunto ASC";
$resultadoB = mysqli_query($conn,$queryB);

$html = "<select id='Bloque' name='Bloque'>";
while($rowB = mysqli_fetch_row($resultadoB))
{
    $html = $html.'<option value='.$rowB[1].'>'.$rowB[0].'</option>';
    
}
echo $html."</select>";
?>