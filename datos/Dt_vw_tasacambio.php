<?php

include_once("connect.php");

    class Dt_vw_tasacambio extends Conexion{

        private $myCon;

        public function listarTasaC(){

            try {
                $this->myCon = parent::conectar();
                $result = array();
                $querySQL = "SELECT * FROM vw_tasacambio";

                $stm = $this->myCon->prepare($querySQL);
                $stm->execute();

                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){

                    $vtc = new vw_tasacambio();

                    $vtc->__SET('id_tasaCambio',$r->id_tasaCambio);
                    $vtc->__SET('original',$r->original);
                    $vtc->__SET('cambio',$r->cambio);
                    $vtc->__SET('mes',$r->mes);
                    $vtc->__SET('anio',$r->anio);

                    $result[]=$vtc;
                }

                $this->myCon = parent::desconectar();
                return $result;

            } catch(Exception $e) {

                die($e->getMessage());
                
            }

        }

        public function obtenerTasa($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM vw_tasacambio WHERE id_tasaCambio = ?";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));
			
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$tc = new vw_tasacambio();

			$tc->__SET('id_tasaCambio', $r->id_tasaCambio);
            $tc->__SET('original', $r->original);
            $tc->__SET('cambio', $r->cambio);
            $tc->__SET('mes',$r->mes);
            $tc->__SET('anio',$r->anio);
            
			$this->myCon = parent::desconectar();
			return $tc;
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    }

?>