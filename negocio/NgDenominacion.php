<?php

include_once("../entidades/tbl_Denominacion.php");
include_once("../datos/Dt_tbl_Denominacion.php");

include_once("../entidades/vw_denominacion.php");
include_once("../datos/Dt_vw_denominacion.php");

$den = new tbl_Denominacion();
$vwden = new vw_denominacion();

$dtden = new Dt_tbl_Denominacion();
$dtvwden = new Dt_vw_denominacion();

if($_POST) {

    $varAccion = $_POST['txtaccion'];

    switch($varAccion){

        case '1':
            try{
                $den->__SET('idMoneda', $_POST['moneda']);
                $den->__SET('valor', $_POST['valor']);
                $den->__SET('valor_letras', $_POST['valorLetras']);
                $den->__SET('estado', '1');

                if ( ($dtden->ExisteDenominacion($_POST['moneda'],$_POST['valor']) == null) and
                    ($dtden->ExisteValorLetras($_POST['valorLetras']) == null)) {

                    $dtden->registrarDenominacion($den);
                    header("Location: ../dist/vw_denominacion.php?msjNewDen=1");
                    break;

                } else {
                    header("Location: ../dist/vw_denominacion.php?msjNewDen=3");    
                    break;
                }

            }catch (Exception $e){
                header("Location: ../dist/vw_denominacion.php?msjNewDen=2");
                die($e->getMessage());
            }

        case '2':
            try{
                $den->__SET('id_Denominacion', $_POST['idD']);
                $den->__SET('idMoneda', $_POST['moneda']);
                $den->__SET('valor', $_POST['valor']);
                $den->__SET('valor_letras', $_POST['valorLetras']);
                $den->__SET('estado', '2');

                if ( ($dtden->ExisteDenominacion($_POST['moneda'],$_POST['valor']) == null) or
                    ($dtden->ExisteValorLetras($_POST['valorLetras']) == null)) {

                    $dtden->actualizarDenominacion($den);
                    header("Location: ../dist/vw_denominacion.php?msjEditDen=1");
                    break;

                } else {
                    header("Location: ../dist/vw_denominacion.php?msjEditDen=3");
                    break;
                }

            }catch (Exception $e){
                header("Location: ../dist/vw_denominacion.php?msjEditDen=2");
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
          $den->__SET('id_Denominacion', $_GET['delDeno']);
          $vwden = $dtvwden->BuscarEquivalente($_GET['delDeno']);

          if($dtvwden->ExisteDenominacion($vwden->__GET('equivalente')) == null ){

            $dtden->EliminarDenominacion($den->__GET('id_Denominacion'));
            header("Location: ../dist/vw_denominacion.php?msjDelDen=1");

          } else {
            header("Location: ../dist/vw_denominacion.php?msjDelDen=3");
          }

          
      }
      catch(Exception $e)
      {
          header("Location: ../dist/vw_denominacion.php?msjDelDen=2");
          die($e->getMessage());
      }
  }

?>