<?php

    class vw_denominacion{

        private $id_Denominacion;
        private $nombre;
        private $valor;
        private $valor_letras;
        private $equivalente;

        public function __GET($k){return $this->$k;}
        public function __SET($k, $v){return $this->$k = $v;}

    }

?>
