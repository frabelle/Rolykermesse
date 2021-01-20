<?php

include_once("../entidades/vw_denominacion.php");
include_once("../datos/Dt_vw_denominacion.php");

$deno = new vw_denominacion();
$dtDeno = new Dt_vw_denominacion();

//$mon=$_POST['moneda'];
$deno=$_POST['moneda'];

    if($deno == null){
        
        $cadena = "";
        
    } else {
        
        foreach(($dtDeno->BuscarValores($deno)) as $r):
            $cadena=$cadena.'<option value='.$r->__GET('id_Denominacion').'>'.$r->__GET('valor').'</option>';
        endforeach;

    }

	echo $cadena;
	
?>
                                                            