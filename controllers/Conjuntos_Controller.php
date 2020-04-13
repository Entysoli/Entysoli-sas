<?php

require_once("../Model/Conjuntos_Model.php");

$conjunto = new Conjuntos_Model();
$MatrizConjuntos=$conjunto->getConjuntos();


require_once("../View/Conjuntos_View.php");

?>