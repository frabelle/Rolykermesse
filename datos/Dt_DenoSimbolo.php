<?php

include_once("../entidades/tbl_moneda.php");
include_once("../datos/Dt_tbl_moneda.php");

$mon = new tbl_moneda();
$dtMon = new Dt_tbl_moneda();

//$mon=$_POST['moneda'];
$mon=$_POST['moneda'];
	
    $cadena="<span class='input-group-text'> ";
    

    if($mon == null){
        
        $valor = "N/A";
        
    } else {
        
        foreach(($dtMon->BuscarSimbolo($mon)) as $r):
            $valor = $r->__GET('simbolo');
        endforeach;

    }

    //var_dump($valor);

	echo $valor;
	
?>
                                                            