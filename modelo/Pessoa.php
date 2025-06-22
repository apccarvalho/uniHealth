<?php

    class Pessoa{
        private $id;
        private $nome;
        private $dataNascimento;
        private $cpf;
        private $genero;
        private $telefone;
        private $email;
        private $rua;
        private $numero;
        private $bairro;
        private $cidade;
        private $cartaoSus;
        private $crp;

        public function __construct(){

        }

        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getNome(){
            return $this->nome;
        }

        public function setDataNascimento($dataNascimento){
            $this->dataNascimento = $dataNascimento;
        }

        public function getDataNascimento(){
            return $this->dataNascimento;
        }

        public function setCpf($cpf){
            $this->cpf = $cpf;
        }

        public function getCpf(){
            return $this->cpf;
        }

        public function setGenero($genero){
            $this->genero = $genero;
        }

        public function getGenero(){
            return $this->genero;
        }

        public function setTelefone($telefone){
            $this->telefone = $telefone;
        }

        public function getTelefone(){
            return $this->telefone;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setRua($rua){
            $this->rua = $rua;
        }

        public function getRua(){
            return $this->rua;
        }

        public function setNumero($numero){
            $this->numero = $numero;
        }

        public function getNumero(){
            return $this->numero;
        }

        public function setBairro($bairro){
            $this->bairro = $bairro;
        }

        public function getBairro(){
            return $this->bairro;
        }

        public function setCidade($cidade){
            $this->cidade = $cidade;
        }

        public function getCidade(){
            return $this->cidade;
        }

        public function setCartaoSus($cartaoSus){
            $this->cartaoSus = $cartaoSus;
        }

        public function getCartaoSus(){
            return $this->cartaoSus;
        }

        public function setCrp($crp){
            $this->crp = $crp;
        }

        public function getCrp(){
            return $this->crp;
        }
    }

?>