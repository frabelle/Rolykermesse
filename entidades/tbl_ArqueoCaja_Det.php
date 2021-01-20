<?php

    class tbl_ArqueoCaja_Det{

        private $idArqueoCaja_Det;
        private $idArqueoCaja;
        private $idMoneda;
        private $idDenominacion;
        private $cantidad;
        private $subtotal;

        public function __GET($k){return $this->$k;}
        public function __SET($k, $v){return $this->$k = $v;}
        
    }

?>