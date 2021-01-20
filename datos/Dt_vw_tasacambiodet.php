<?php

include_once("connect.php");

    class Dt_vw_tasacambiodet extends Conexion{

        private $myCon;

        public function listarTasaCD($id){

            try {
                $this->myCon = parent::conectar();
                $result = array();
                $querySQL = "SELECT * FROM vw_tasacambiodet where id_tasaCambio = ?";

                $stm = $this->myCon->prepare($querySQL);
                $stm->execute(array($id));

                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){

                    $vtcd = new vw_tasacambiodet();

                    $vtcd->__SET('tasa',$r->tasa);
                    $vtcd->__SET('fecha',$r->fecha);
                    $vtcd->__SET('tipoCambio',$r->tipoCambio);

                    $result[]=$vtcd;
                }

                $this->myCon = parent::desconectar();
                return $result;

            } catch(Exception $e) {

                die($e->getMessage());
                
            }

        }

    }

?>