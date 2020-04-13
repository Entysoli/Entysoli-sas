<?php

class Conjuntos_Model
{
    private $db;
    private $conjuntos;

    public function __construct()
    {

        require_once("Model/conectar.php");
        $this->db = conectar::conexion();
        $this->conjuntos = array();
    }


    public function getConjuntos()
    {
        $consulta = $this->db->query("SELECT * FROM conjunto");
        while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $this->conjuntos[] = $filas;
        }
        return $this->conjuntos;    
        
    }
}
