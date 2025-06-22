<?php
    include_once(__DIR__ . "/Pessoa.php");
    include_once(__DIR__ . "/PlanoTerapeutico.php");
    include_once(__DIR__ . "/Evolucao.php");

    class Prontuario{
        private $id;
        private $paciente;
        private $estagiario;
        private $supervisor;
        private $historicoFamiliar;
        private $queixaPrincipal;

        public function __construct(){
            $this->paciente = new Pessoa();
            $this->estagiario = new Pessoa();
            $this->supervisor = new Pessoa();
        }

        public function getId(){
            return $this->id;
        }
        
        public function setId($id){
            $this->id = $id;
        }

        public function getPaciente() {
            return $this->paciente;
        }

        public function setPaciente(Pessoa $paciente) {
            $this->paciente = $paciente;
        }

        public function getEstagiario(){
            return $this->estagiario;
        }

        public function setEstagiario(Pessoa $estagiario){
            $this->estagiario = $estagiario;
        }

        public function getSupervisor(){
            return $this->supervisor;
        }

        public function setSupervisor(Pessoa $supervisor){
            $this->supervisor = $supervisor;
        }

        public function getHistoricoFamiliar(){
            return $this->historicoFamiliar;
        }

        public function setHistoricoFamiliar($historicoFamiliar){
            $this->historicoFamiliar = $historicoFamiliar;
        }  
        
        public function getQueixaPrincipal(){
            return $this->queixaPrincipal;
        }

        public function setQueixaPrincipal($queixaPrincipal){
            $this->queixaPrincipal = $queixaPrincipal;
        }  

    }  
    
?>        