<?php
    include_once(__DIR__ . "/Prontuario.php"); 
    
    class Evolucao{
        private $id;
        private $dataE;
        private $resumo;
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

        public function getDataE(){
            return $this->dataE;
        }

        public function setDataE($dataE){
            $this->dataE = $dataE;
        }     
        
        public function getResumo(){
            return $this->resumo;
        }

        public function setResumo($resumo){
            $this->resumo = $resumo;
        }   
        
        public function getProntuario(){
            return $this->prontuario;
        }

        public function setProntuario(Prontuario $prontuario){
            $this->prontuario = $prontuario;
        } 
 
    }
?>