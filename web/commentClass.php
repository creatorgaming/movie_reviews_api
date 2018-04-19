<?php
    class commentClass{
        public $jwt;
        public $text;
        public $date;

        public function __construct($jwt,$text,$date){
            $this->jwt = $jwt;
            $this->text = $text;
            $this->date = $date;
        }
    }
?>