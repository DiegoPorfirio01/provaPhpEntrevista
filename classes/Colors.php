<?php
class Colors {
    public $id;
    public $name;

    public function __construct(){}

    //MÉTODOS
    static function listColors() {
        $connection = new Connection();
        $sql =
         "SELECT col.id,
                 col.name,
                 uc.id AS idUserColor
            FROM colors AS col
       LEFT JOIN user_colors AS uc
              ON col.id = uc.color_id
        "
        ;
        $resultSet = $connection->query($sql);
        $resultado = array();
        $i = 0;
        $totalResultados = count($resultSet);
        for ($j=0; $j<$totalResultados; $j++) {
            $objeto = new Users();
            foreach ($resultSet[$j] as $chave=>$valor) {
                if (!is_int($chave)) {
                    $set = "set".ucfirst($chave);
                    $objeto->$set($valor);
                }
            }
            $resultado[$i] = $objeto;
            $i++;
        }
        return $resultado;
    }

    static function listUserColors($id) {
        $connection = new Connection();
        $sql =
            "SELECT
                   col.id, 
                   col.name
              FROM colors AS col
         LEFT JOIN user_colors AS uc 
                ON col.id = uc.color_id        
             WHERE uc.user_id = '$id'
            "
        ;
        $resultSet = $connection->query($sql);
        $resultado = array();
        $i = 0;
        $totalResultados = count($resultSet);
        for ($j=0; $j<$totalResultados; $j++) {
            $objeto = new Users();
            foreach ($resultSet[$j] as $chave=>$valor) {
                if (!is_int($chave)) {
                    $set = "set".ucfirst($chave);
                    $objeto->$set($valor);
                }
            }
            $resultado[$i] = $objeto;
            $i++;
        }
        return $resultado;
    }
    //GETTERS E SETTERS

    //SEM TRATAMENTO DE DADOS'
    function __call($method, $params)
    {
        $var = lcfirst(substr($method, 3));
        if (strncasecmp($method, "get", 3) === 0) {
            return $this->$var;
        }
        if (strncasecmp($method, "set", 3) === 0) {
            $this->$var = $params[0];
        }
    }
}
