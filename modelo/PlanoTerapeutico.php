<?php
    include_once(__DIR__ . "/Prontuario.php");  
    
    class PlanoTerapeutico{
        private $id;
        private $objetivos;
        private $abordagem;
        private $hipoteses;
        private $dataP;
        private $prontuario;
                
        public function __construct(){
            $this->prontuario = new Prontuario();
        }

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getObjetivos(){
            return $this->objetivos;
        }

        public function setObjetivos($objetivos){
            $this->objetivos = $objetivos;
        }  
        
        public function getAbordagem(){
            return $this->abordagem;
        }

        public function setAbordagem($abordagem){
            $this->abordagem = $abordagem;
        }  
        
        public function getHipoteses(){
            return $this->hipoteses;
        }

        public function setHipoteses($hipoteses){
            $this->hipoteses = $hipoteses;
        } 
        
        public function getDataP(){
            return $this->dataP;
        }

        public function setDataP($dataP){
            $this->dataP = $dataP;
        }

        public function getProntuario(){
            return $this->prontuario;
        }

        public function setProntuario(Prontuario $prontuario){
            $this->prontuario = $prontuario;
        } 

    }   

?>