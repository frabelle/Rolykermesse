<?php

include_once("connect.php");

    class Dt_tbl_ArqueoCaja extends Conexion{
        
        private $myCon;

        public function obtenerArqueo($id)
        {
            try 
            {
                $this->myCon = parent::conectar();
                $querySQL = "SELECT * FROM tbl_arqueocaja WHERE id_ArqueoCaja = ?";
                $stm = $this->myCon->prepare($querySQL);
                $stm->execute(array($id));
                
                $r = $stm->fetch(PDO::FETCH_OBJ);
    
                $ac = new tbl_ArqueoCaja();
    
                $ac->__SET('id_ArqueoCaja', $r->id_ArqueoCaja);
                $ac->__SET('idKermesse', $r->idKermesse);
                $ac->__SET('fechaArqueo', $r->fechaArqueo);
                $ac->__SET('granTotal',$r->granTotal);
                
                $this->myCon = parent::desconectar();
                return $ac;
            } 
            catch (Exception $e) 
            {
                die($e->getMessage());
            }
        }


    }


?>