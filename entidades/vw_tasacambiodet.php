<?php

    class vw_tasacambiodet{

        private $tasa;
        private $fecha;
        private $tipoCambio;

        public function __GET($k){return $this->$k;}
        public function __SET($k, $v){return $this->$k = $v;}

    }

?>
