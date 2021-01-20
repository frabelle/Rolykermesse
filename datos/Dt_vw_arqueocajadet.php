<?php

include_once("connect.php");

    class Dt_vw_arqueocajadet extends Conexion{

        private $myCon;

        public function listarArqueoD($id){

            try {
                $this->myCon = parent::conectar();
                $result = array();
                $querySQL = "SELECT * FROM vw_arqueocajadet where id_ArqueoCaja = ?";

                $stm = $this->myCon->prepare($querySQL);
                $stm->execute(array($id));

                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){

                    $acd = new vw_arqueocajadet();

                    $acd->__SET('id_ArqueoCaja',$r->id_ArqueoCaja);
                    $acd->__SET('nombre',$r->nombre);
                    $acd->__SET('valor',$r->valor);
                    $acd->__SET('cantidad',$r->cantidad);
                    $acd->__SET('subtotal',$r->subtotal);

                    $result[]=$acd;
                }

                $this->myCon = parent::desconectar();
                return $result;

            } catch(Exception $e) {

                die($e->getMessage());
                
            }

        }

    }

?>