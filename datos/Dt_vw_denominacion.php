<?php

include_once("connect.php");

class Dt_vw_denominacion extends Conexion{

    private $myCon;

    public function listarDeno(){

        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM vw_denominacion";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){

                $vd = new vw_denominacion();

                $vd->__SET('id_Denominacion',$r->id_Denominacion);
                $vd->__SET('nombre',$r->nombre);
                $vd->__SET('valor',$r->valor);
                $vd->__SET('valor_letras',$r->valor_letras);
                $vd->__SET('equivalente',$r->equivalente);

                $result[]=$vd;
            }

            $this->myCon = parent::desconectar();
            return $result;

        } catch(Exception $e) {

            die($e->getMessage());
            
        }

    }

    public function BuscarValores($a)
        {
            try
            {
                $this->myCon = parent::conectar();
                $result = array();
                $querySQL = "SELECT * FROM vw_denominacion where nombre = 
                (select nombre from tbl_moneda where id_moneda = ?);";
    
                $stm = $this->myCon->prepare($querySQL);
                $stm->execute(array($a));

                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                {
                    $deno = new vw_denominacion();
    
                    //_SET(CAMPOBD, atributoEntidad)
                    $deno->__SET('id_Denominacion', $r->id_Denominacion);			
                    $deno->__SET('valor', $r->valor);
                    
                    $result[] = $deno;
    
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

        public function ExisteDenominacion($a)
        {
            try
            {
                $this->myCon = parent::conectar();
                $result = array();
                $querySQL = "SELECT * FROM dbkermesse.vw_denominacion WHERE equivalente = 
                (SELECT valor from vw_arqueocajadet where valor = ? LIMIT 1);";
    
                $stm = $this->myCon->prepare($querySQL);
                $stm->execute(array($a));

                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                {
                    $deno = new vw_denominacion();
    
                    //_SET(CAMPOBD, atributoEntidad)
                    $deno->__SET('id_Denominacion', $r->id_Denominacion);			
                    $deno->__SET('valor', $r->valor);
                    
                    $result[] = $deno;
    
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

        public function BuscarEquivalente($a)
        {
            try
            {
                $this->myCon = parent::conectar();
                $querySQL = "SELECT equivalente FROM vw_denominacion WHERE id_Denominacion = ?;";
    
                $stm = $this->myCon->prepare($querySQL);
                $stm->execute(array($a));

                $deno = new vw_denominacion();
    
                $r = $stm->fetch(PDO::FETCH_OBJ);

                $deno->__SET('equivalente', $r->equivalente);			
                
                $result = $deno;

                $this->myCon = parent::desconectar();
                return $result;
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }


}


?>