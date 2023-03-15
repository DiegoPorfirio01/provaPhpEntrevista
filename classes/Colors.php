<?php
class Cores {
    public $id;
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
    public function getCor()
    {
        return $this->cor;
    }
    public function setCor($cor)
    {
        $this->cor = $cor;
    }
}
