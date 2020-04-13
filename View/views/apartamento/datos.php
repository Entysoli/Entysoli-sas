<?php 
$conexion=mysqli_connect('localhost','root','','entornos');
$continente=$_POST['conjunto'];

	$sql="SELECT idBloque,
			 idConjunto
		from bloque 
		where idConjunto='$continente'";

	$result=mysqli_query($conexion,$sql);

	$cadena="<select class='form-input' id='bloque' name='bloque'>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.$ver[0].'</option>';
	}

	echo  $cadena."</select>";

?>