<?php

    class vw_tasacambio{

        private $id_tasaCambio;
        private $original;
        private $cambio;
        private $mes;
        private $anio;

        public function __GET($k){return $this->$k;}
        public function __SET($k, $v){return $this->$k = $v;}

    }

?>
