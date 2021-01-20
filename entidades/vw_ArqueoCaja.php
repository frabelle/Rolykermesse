<?php

    class vw_ArqueoCaja{

        private $id_ArqueoCaja;
        private $nombre;
        private $fechaArqueo;
        private $granTotal;

        public function __GET($k){return $this->$k;}
        public function __SET($k, $v){return $this->$k = $v;}

    }

?>