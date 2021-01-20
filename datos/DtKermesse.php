<?php
include_once("Connect.php");

class DtKermesse extends Conexion

{
    private $myCon;

    public function listarKer()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT * FROM tbl_kermesse";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$ker = new kermesse ();

				//_SET(CAMPOBD, atributoEntidad)			
				$ker->__SET('id_kermesse', $r->id_kermesse);
				$ker->__SET('idParroquia', $r->idParroquia);
				$ker->__SET('nombre', $r->nombre);
				$ker->__SET('fInicio', $r->fInicio);
				$ker->__SET('fFinal', $r->fFinal);
				$ker->__SET('descripcion', $r->descripcion);
                $ker->__SET('estado', $r->estado);	
                $ker->__SET('usuario_creacion', $r->usuario_creacion);		
                $ker->__SET('fecha_creacion', $r->fecha_creacion);	
                $ker->__SET('usuario_modificacion', $r->usuario_modificacion);	
                $ker->__SET('fecha_modificacion', $r->fecha_modificacion);	
                $ker->__SET('usuario_eliminacion', $r->usuario_eliminacion);	
                $ker->__SET('fecha_eliminacion', $r->fecha_eliminacion);		

				$result[] = $ker;

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
	
	public function comboKermesse()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT id_kermesse, nombre FROM dbkermesse.tbl_kermesse 
			WHERE id_kermesse;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$ker = new kermesse();

				//_SET(CAMPOBD, atributoEntidad)			
				$ker->__SET('id_kermesse', $r->id_kermesse);
				$ker->__SET('nombre', $r->nombre);
				$result[] = $ker;

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
    
}