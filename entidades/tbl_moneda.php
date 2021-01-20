<?php

    class tbl_moneda{

        private $id_moneda;
        private $nombre;
        private $simbolo;
        private $estado;

        public function __GET($k){return $this->$k;}
        public function __SET($k, $v){return $this->$k = $v;}

    }

?>