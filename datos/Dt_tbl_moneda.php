<?php

include_once("connect.php");

    class Dt_tbl_moneda extends Conexion{

        private $myCon;

        public function listarMonedas(){

            try {
                $this->myCon = parent::conectar();
                $result = array();
                $querySQL = "SELECT * FROM tbl_moneda WHERE estado<>3";

                $stm = $this->myCon->prepare($querySQL);
                $stm->execute();

                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){

                    $mon = new tbl_moneda();

                    $mon->__SET('id_moneda',$r->id_moneda);
                    $mon->__SET('nombre',$r->nombre);
                    $mon->__SET('simbolo',$r->simbolo);
                    $mon->__SET('estado',$r->estado);

                    $result[]=$mon;
                }

                $this->myCon = parent::desconectar();
                return $result;

            } catch(Exception $e) {

                die($e->getMessage());
                
            }

        }

        public function cbxMoneda()
        {
            try
            {
                $this->myCon = parent::conectar();
                $result = array();
                $querySQL = "SELECT * FROM tbl_moneda WHERE estado<>3;";
    
                $stm = $this->myCon->prepare($querySQL);
                $stm->execute();
    
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                {
                    $moneda = new tbl_moneda();
    
                    //_SET(CAMPOBD, atributoEntidad)			
                    $moneda->__SET('id_moneda', $r->id_moneda);
                    $moneda->__SET('nombre', $r->nombre);
                    
                    $result[] = $moneda;
    
                    //var_dump($result);
                }
                $this->myCon = parent::desconectar();
                return $result;
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }

        public function BuscarSimbolo($a)
        {
            try
            {
                $this->myCon = parent::conectar();
                $querySQL = "SELECT * FROM tbl_moneda WHERE id_moneda = ? AND estado<>3;";
    
                $stm = $this->myCon->prepare($querySQL);
                $stm->execute(array($a));

                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                {
                    $moneda = new tbl_moneda();
    
                    //_SET(CAMPOBD, atributoEntidad)			
                    $moneda->__SET('simbolo', $r->simbolo);
                    
                    $result[] = $moneda;
    
                    //var_dump($result);
                }
                $this->myCon = parent::desconectar();
                return $result;
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }

        public function ExisteSimbolo($a)
        {
            try
            {
                $this->myCon = parent::conectar();
                $querySQL = "SELECT * FROM tbl_moneda WHERE simbolo = ? AND estado<>3;";
    
                $stm = $this->myCon->prepare($querySQL);
                $stm->execute(array($a));

                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                {
                    $moneda = new tbl_moneda();
    
                    //_SET(CAMPOBD, atributoEntidad)			
                    $moneda->__SET('simbolo', $r->simbolo);
                    
                    $result[] = $moneda;
    
                    //var_dump($result);
                }
                $this->myCon = parent::desconectar();
                return $result;
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }

        public function BuscarMoneda($a)
        {
            try
            {
                $this->myCon = parent::conectar();
                $querySQL = "SELECT * FROM tbl_moneda WHERE id_moneda = ? AND estado<>3;";
    
                $stm = $this->myCon->prepare($querySQL);
                $stm->execute(array($a));

                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                {
                    $moneda = new tbl_moneda();
    
                    //_SET(CAMPOBD, atributoEntidad)			
                    $moneda->__SET('nombre', $r->nombre);
                    $moneda->__SET('simbolo', $r->simbolo);
                    
                    $result = $moneda;
    
                    //var_dump($result);
                }
                $this->myCon = parent::desconectar();
                return $result;
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }

        public function ExisteMoneda($a)
        {
            try
            {
                $this->myCon = parent::conectar();
                $querySQL = "SELECT * FROM tbl_moneda WHERE nombre = ? AND estado<>3;";
    
                $stm = $this->myCon->prepare($querySQL);
                $stm->execute(array($a));

                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                {
                    $moneda = new tbl_moneda();
    
                    //_SET(CAMPOBD, atributoEntidad)			
                    $moneda->__SET('nombre', $r->nombre);
                    $moneda->__SET('simbolo', $r->simbolo);
                    
                    $result = $moneda;
    
                    //var_dump($result);
                }
                $this->myCon = parent::desconectar();
                return $result;
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }

    public function registrarMoneda(tbl_moneda $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO tbl_moneda (nombre, simbolo, estado) 
		        VALUES (?, ?, ?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('nombre'),
			 $data->__GET('simbolo'),
			 $data->__GET('estado'),));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
    }
    
    public function actualizarMoneda(tbl_moneda $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE tbl_moneda SET 
						nombre = ?, 
						simbolo = ?,
						estado = ?
				    WHERE id_moneda = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					$data->__GET('nombre'), 
					$data->__GET('simbolo'), 
					$data->__GET('estado'),
					$data->__GET('id_moneda')
					)
				);
				$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			var_dump($e);
			die($e->getMessage());
		}
    }
    
    public function EliminarMoneda($data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE tbl_moneda SET 
						estado = 3
				    WHERE id_moneda = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					$data
					)
				);
				$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			var_dump($e);
			die($e->getMessage());
		}
    }


    }

?>