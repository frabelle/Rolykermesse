<?php

    class tasaCambio_det{

        private $id_tasaCambio_det;
        private $id_tasaCambio;
        private $fecha;
        private $tipoCambio;
        private $estado;

        public function __GET($k){return $this->$k;}
        public function __SET($k, $v){return $this->$k = $v;}

    }


?>