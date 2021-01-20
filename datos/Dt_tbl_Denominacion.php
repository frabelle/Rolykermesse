<?php

include_once("connect.php");

    class Dt_tbl_Denominacion extends Conexion{

        private $myCon;

        public function obtenerDenominacion($id)
        {
            try 
            {
                $this->myCon = parent::conectar();
                $querySQL = "SELECT * FROM tbl_denominacion WHERE id_Denominacion = ? AND estado<>3";
                $stm = $this->myCon->prepare($querySQL);
                $stm->execute(array($id));
                
                $r = $stm->fetch(PDO::FETCH_OBJ);
    
                $den = new tbl_Denominacion();
    
                $den->__SET('id_Denominacion', $r->id_Denominacion);
                $den->__SET('idMoneda', $r->idMoneda);
                $den->__SET('valor', $r->valor);
                $den->__SET('valor_letras',$r->valor_letras);
                
                $this->myCon = parent::desconectar();
                return $den;
            } 
            catch (Exception $e) 
            {
                die($e->getMessage());
            }
		}
		
		public function ExisteDenominacion($mon, $val)
        {
            try 
            {
                $this->myCon = parent::conectar();
                $querySQL = "SELECT * FROM tbl_denominacion WHERE idMoneda = ? AND valor = ? AND estado<>3";
                $stm = $this->myCon->prepare($querySQL);
                $stm->execute(array($mon,$val));
                
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                {
					$den = new tbl_Denominacion();
    
                    //_SET(CAMPOBD, atributoEntidad)			
                    $den->__SET('idMoneda', $r->idMoneda);
                	$den->__SET('valor', $r->valor);
                    
                    $result[] = $den;
    
                    //var_dump($result);
                }
                
                $this->myCon = parent::desconectar();
                return $den;
            } 
            catch (Exception $e) 
            {
                die($e->getMessage());
            }
		}

		public function ExisteMoneda($mon)
        {
            try 
            {
                $this->myCon = parent::conectar();
                $querySQL = "SELECT * FROM tbl_denominacion WHERE idMoneda = ? AND estado<>3";
                $stm = $this->myCon->prepare($querySQL);
                $stm->execute(array($mon));
                
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                {
					$den = new tbl_Denominacion();
    
                    //_SET(CAMPOBD, atributoEntidad)			
                    $den->__SET('idMoneda', $r->idMoneda);
                	$den->__SET('valor', $r->valor);
                    
                    $result[] = $den;
    
                    //var_dump($result);
                }
                
                $this->myCon = parent::desconectar();
                return $den;
            } 
            catch (Exception $e) 
            {
                die($e->getMessage());
            }
		}
		
		public function ExisteValorLetras($a)
        {
            try
            {
                $this->myCon = parent::conectar();
                $querySQL = "SELECT * FROM tbl_denominacion WHERE valor_letras = ? AND estado<>3";
    
                $stm = $this->myCon->prepare($querySQL);
                $stm->execute(array($a));

                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                {
					$den = new tbl_Denominacion();
    
                    //_SET(CAMPOBD, atributoEntidad)			
                    $den->__SET('idMoneda', $r->idMoneda);
                	$den->__SET('valor', $r->valor);
                    
                    $result[] = $den;
    
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

        public function registrarDenominacion(tbl_Denominacion $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO tbl_denominacion (idMoneda, valor, valor_letras, estado) 
		        VALUES (?, ?, ?, ?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('idMoneda'),
             $data->__GET('valor'),
             $data->__GET('valor_letras'),
			 $data->__GET('estado'),));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
    }

    public function actualizarDenominacion(tbl_Denominacion $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE tbl_denominacion SET 
						idMoneda = ?, 
						valor = ?,
                        valor_letras = ?,
						estado = ?
				    WHERE id_Denominacion = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					$data->__GET('idMoneda'), 
                    $data->__GET('valor'), 
                    $data->__GET('valor_letras'),
					$data->__GET('estado'),
					$data->__GET('id_Denominacion')
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

    public function EliminarDenominacion($data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE tbl_denominacion SET 
						estado = 3
				    WHERE id_Denominacion = ?";

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