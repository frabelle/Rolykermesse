<?php

include_once("../entidades/tbl_moneda.php");
include_once("../datos/Dt_tbl_moneda.php");

include_once("../entidades/tbl_Denominacion.php");
include_once("../datos/Dt_tbl_Denominacion.php");

$mon = new tbl_moneda();
$dtMon = new Dt_tbl_moneda();
$dtDen = new Dt_tbl_Denominacion();

if($_POST) {

    $varAccion = $_POST['txtaccion'];

    switch($varAccion){

        case '1':
            try{
                $mon->__SET('nombre', $_POST['moneda']);
                $mon->__SET('simbolo', $_POST['simbolo']);
                $mon->__SET('estado', '1');

                if (($dtMon->ExisteMoneda($_POST['moneda']) == null) and 
                    ($dtMon->ExisteSimbolo($_POST['simbolo']) == null)) {

                    $dtMon->registrarMoneda($mon);
                    header("Location: ../dist/tbl_moneda.php?msjNewMon=1");
                    break;

                } else {
                    header("Location: ../dist/tbl_moneda.php?msjNewMon=3");    
                    break;
                }

            }catch (Exception $e){
                header("Location: ../dist/tbl_moneda.php?msjNewMon=2");
                die($e->getMessage());
            }

        case '2':
            try{
                $mon->__SET('id_moneda', $_POST['idM']);
                $mon->__SET('nombre', $_POST['moneda']);
                $mon->__SET('simbolo', $_POST['simbolo']);
                $mon->__SET('estado', '2');

                if (($dtMon->ExisteMoneda($_POST['moneda']) == null) or 
                    ($dtMon->ExisteSimbolo($_POST['simbolo']) == null)) {

                    $dtMon->actualizarMoneda($mon);
                    header("Location: ../dist/tbl_moneda.php?msjEditMon=1");
                    break;

                } else {
                    header("Location: ../dist/tbl_moneda.php?msjEditMon=3");    
                    break;
                }

            }catch (Exception $e) {

                header("Location: ../dist/tbl_moneda.php?msjEditMon=2");
                die($e->getMessage());
            }

        default:
            # code...
            break;
        
    }

}

if ($_GET) 
{
    try 
      {
          $mon->__SET('id_moneda', $_GET['delMon']);

        if ($dtDen->ExisteMoneda($_GET['delMon']) == null){
            
            $dtMon->eliminarMoneda($mon->__GET('id_moneda'));
            header("Location: ../dist/tbl_moneda.php?msjDelMon=1");

        } else {
            header("Location: ../dist/tbl_moneda.php?msjDelMon=3");
        }

          
      }
      catch(Exception $e)
      {
          header("Location: ../dist/tbl_moneda.php?msjDelMon=2");
          die($e->getMessage());
      }
  }

?>