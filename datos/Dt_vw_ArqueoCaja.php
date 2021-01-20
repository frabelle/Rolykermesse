<?php

include_once("connect.php");

    class Dt_vw_ArqueoCaja extends Conexion{

        private $myCon;

        public function listarArqueo(){

            try {
                $this->myCon = parent::conectar();
                $result = array();
                $querySQL = "SELECT * FROM vw_arqueocaja";

                $stm = $this->myCon->prepare($querySQL);
                $stm->execute();

                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){

                    $ac = new vw_ArqueoCaja();

                    $ac->__SET('id_ArqueoCaja',$r->id_ArqueoCaja);
                    $ac->__SET('nombre',$r->nombre);
                    $ac->__SET('fechaArqueo',$r->fechaArqueo);
                    $ac->__SET('granTotal',$r->granTotal);

                    $result[]=$ac;
                }

                $this->myCon = parent::desconectar();
                return $result;

            } catch(Exception $e) {

                die($e->getMessage());
                
            }

        }

        public function obtenerArqueoVw($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM vw_arqueocaja WHERE id_ArqueoCaja = ?";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));
			
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$ac = new vw_ArqueoCaja();

			$ac->__SET('id_ArqueoCaja', $r->id_ArqueoCaja);
            $ac->__SET('nombre', $r->nombre);
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