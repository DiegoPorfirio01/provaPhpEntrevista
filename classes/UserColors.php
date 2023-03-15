<?php
class UsuarioCor{
    public $users_id;
    public $colors_id;

    public function __construct(){}

    //MÉTODOS





    //GETTERS E SETTERS
    public function getUsersId()
    {
        return $this->users_id;
    }
    public function setUsersId($users_id)
    {
        $this->users_id= $users_id;
    }
    public function getColorId()
    {
        return $this->colors_id;
    }
    public function setColorsId($colors_id)
    {
        $this->colors_id = $colors_id;
    }
}
