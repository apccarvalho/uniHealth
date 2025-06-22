<?php
class Usuario {
    private $id;
    private $nome;
    private $usuario;

    public function getId(){
         return $this->id; 
    }

    public function setId($id){ 
        $this->id = $id; 
    }

    public function getNome(){
         return $this->nome; 
    }
    
    public function setNome($nome){ 
        $this->nome = $nome;
    }

    public function getUsuario(){ 
        return $this->usuario;
    }
    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }
    
}
