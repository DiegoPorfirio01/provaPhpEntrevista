<?php
class Users{
    public $id;
    public $email;
    public $nome;
    public $cor;

    public function __construct(){}

    //MÉTODOS

    
    




    //GETTERS E SETTERS
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id= $id;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function getCor()
    {
        return $this->cor;
    }
    public function setCor($cor)
    {
        $this->cor = $cor;
    }
}
