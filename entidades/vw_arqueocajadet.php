<?php

    class vw_arqueocajadet{

        private $id_ArqueoCaja;
        private $nombre;
        private $valor;
        private $cantidad;
        private $subtotal;

        public function __GET($k){return $this->$k;}
        public function __SET($k, $v){return $this->$k = $v;}

    }

?>