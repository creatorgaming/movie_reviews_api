<?php
    class commentClass{
        public $jwt;
        public $text;

        public function __construct($jwt,$text){
            $this->jwt = $jwt;
            $this->text = $text;
        }
    }
?>