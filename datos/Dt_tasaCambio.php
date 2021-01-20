<?php

include_once("Connect.php");

    class Dt_tasaCambio extends Conexion{
        
        private $myCon;

        public function obtenerTasa($id)
        {
            try 
            {
                $this->myCon = parent::conectar();
                $querySQL = "SELECT * FROM tbl_tasacambio WHERE id_tasaCambio = ?";
                $stm = $this->myCon->prepare($querySQL);
                $stm->execute(array($id));
                
                $r = $stm->fetch(PDO::FETCH_OBJ);
    
                $ts = new tbl_tasaCambio();
    
                $ts->__SET('id_tasaCambio', $r->id_tasaCambio);
                $ts->__SET('id_monedaO', $r->id_monedaO);
                $ts->__SET('id_monedaC', $r->id_monedaC);
                $ts->__SET('mes',$r->mes);
                $ts->__SET('anio',$r->anio);
                
                $this->myCon = parent::desconectar();
                return $ts;
            } 
            catch (Exception $e) 
            {
                die($e->getMessage());
            }
        }



    }


?>